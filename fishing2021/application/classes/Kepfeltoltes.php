<?php defined('SYSPATH') or die('No direct access allowed.');

class Kepfeltoltes {

	private $rules;
	private $result;

	public function __construct() {
		$this->rules = $this->get_rules();
	}


	/**
	 * Képfeltöltő általános metódusa
	 * (Egyenlőre egyszerre csak egy kép feltöltésére alkalmas)
	 *
	 * @param string $model Meghatározza, hogy mely modellhez kerül feltöltésre a kép
	 * @param string $mappa Meghatározza hova kerüljön feltöltésre a kép 'userfiles/kepek/' A végére kell a '/'!
	 * @param string $hash Meghatározza hogy az adott modell mely mezője tárolja a képet
	 * @param string $id Meghatározza, hogy adott modell mely eleméhez történik a képfeltöltés
	 * @param array $rules Méret szabályokat meghatározó asszociatív tömb. get_rules() -al lekérhető a forma
	 */
	public function feltolt($model,$mappa,$hash,$id,array $rules = array()) {
		// Inicializálás
		$rules = array_merge($this->rules,$rules);
		require_once(APPPATH.'/vendor/phpThumb/ThumbLib.inc.php');
		require_once(APPPATH."/vendor/qqFileUploader.php");
		$allowed_extensions = Kohana::$config->load('kepfeltoltes.kiterjesztesek');
		$size_limit = Kohana::$config->load('kepfeltoltes.meret_korlat');
		$error = array('hiba'=>'');

		$orm = ORM::Factory($model);

		if ( ! $rules['multiple']) {
			$orm = $orm->where('id','=',$id)->find();

			// Paraméter hibakezelés
			if ( ! $orm->loaded()){
				$error['hiba'] = 'Nem töltődött be az adott model elem';
				echo json_encode($error);
				throw new KepException($error['hiba']);
				return false;
			}
		}

		// Paraméter hibakezelés
		if ( ! array_key_exists($hash, $orm->list_columns())){
			$error['hiba'] = 'A hash mezőnek nem ez a neve';
			echo json_encode($error);
			throw new KepException($error['hiba']);
			return false;
		}
		if ($rules['multiple'] && $rules['values'] == null) {
			$error['hiba'] = 'Ha több képet akarsz feltölteni, be kell állítani a $rules values értékét!';
			echo json_encode($error);
			throw new KepException($error['hiba']);
			return false;
		}

		// Mappa hibakezelés
		if ( ! is_dir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa)) {
			mkdir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa,0777,true);
		}
		else {
			if ( ! is_writable($_SERVER['DOCUMENT_ROOT'].'/'.$mappa)){
				$error['hiba'] = 'A megadott mappa nem írható';
				echo json_encode($error);
				throw new KepException($error['hiba']);
				return false;
			}
		}
		if ($rules['thumb']) {
			if ( ! is_dir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'th/')) {
			mkdir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'th/',0777,true);
			}
			else {
				if ( ! is_writable($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'th/')){
					$error['hiba'] = 'A megadott mappa nem írható';
					echo json_encode($error);
					throw new KepException($error['hiba']);
					return false;
				}
			}
		}
		if (isset($rules['mini'])) {
			if ( ! is_dir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'mini/')) {
			mkdir($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'mini/',0777,true);
			}
			else {
				if ( ! is_writable($_SERVER['DOCUMENT_ROOT'].'/'.$mappa.'mini/')){
					$error['hiba'] = 'A megadott mappa nem írható';
					echo json_encode($error);
					throw new KepException($error['hiba']);
					return false;
				}
			}
		}


		// File feltöltése
		$uploader = new qqFileUploader($allowed_extensions, $size_limit);
		$result = $uploader->handleUpload($mappa);

		if ( ! isset($result['success'])){
			$error['hiba'] = 'A kép mérete nem haladhatja meg a '.($size_limit / 1024 / 1024).'Mb-ot';
			// echo json_encode($error);
			throw new KepException($error['hiba']);
			return false;
		}

		// Kép létrehozása, mentése
		$image = Image::factory($mappa.$result['filename']);
		if ($rules['fixsize'] && ($image->width != $rules['width'] || $image->height != $rules['height'])) {
			$error['hiba'] = 'A feltöltött kép mérete nem megfelelő! Várt méret: '
							.$rules['width'].'px * '.$rules['height'].'px';
			throw new KepException($error['hiba']);
			return false;
		}
		if ($rules['resize']) {
			if ($rules['ifbigger']) {
				if ($rules['height'] == null) {
					$rules['height'] = 10000;
				}
				if ($image->width > $rules['width'] || $image->height > $rules['height']) {
					$image->resize(Arr::get($rules,'width'),Arr::get($rules,'height'));
				}
			}
			else {
				$image->resize(Arr::get($rules,'width'),Arr::get($rules,'height'),Image::INVERSE);
			}

		}


		// Az előző kép törlése
		if ($result && ! $rules['multiple']){
			$torlendo = $mappa.$orm->$hash;
			if (is_file($torlendo)){
				@unlink($torlendo);
			}
			if ($rules['thumb']) {
				$torlendo = $mappa.'th/'.$orm->$hash;
				if (is_file($torlendo)){
					@unlink($torlendo);
				}
			}
			if (isset($rules['mini'])) {
				$torlendo = $mappa.'mini/'.$orm->$hash;
				if (is_file($torlendo)){
					@unlink($torlendo);
				}
			}
		}
		$image->save($mappa.$result['filename'], $rules['quality']);
		chmod($mappa.$result['filename'], 0777);

		if ($rules['thumb']) {
			if($model=="Sajtofoto") {
				$image
					->resize($rules['thumbwidth'], null)
					->save($mappa . 'th/' . $result['filename']);
			} else {
				$thumb = PhpThumbFactory::create($mappa . $result['filename']);
				if (Arr::get($rules, 'adaptiveresize')) {
					$thumb->adaptiveResize($rules['thumbwidth'], $rules['thumbheight']);
				} else {
					$thumb->resize($rules['thumbwidth'], $rules['thumbheight']);
				}
				$thumb->save($mappa . 'th/' . $result['filename']);
			}
			chmod($mappa.'th/'.$result['filename'], 0777);
		}

		if (isset($rules['mini'])) {
			$thumb = PhpThumbFactory::create($mappa.$result['filename']);
			if (Arr::get($rules, 'adaptiveresize')){
				$thumb->adaptiveResize($rules['mini'][0], $rules['mini'][1]);
			} else {
				$thumb->resize($rules['mini'][0], $rules['mini'][1]);
			}

			$thumb->save($mappa.'mini/'.$result['filename']);
			chmod($mappa.'th/'.$result['filename'], 0777);
		}

		$result['path']= Kohana::$base_url.$mappa;
		$result['hiba']= '';
		$result['width']= $image->width;
		$result['height']= $image->height;

		// Kép hash rögzítése az adatbázisba
		$orm->$hash = $result['filename'];
		if ($rules['multiple']) {
			$orm->values($rules['values']);
		}
		try{
			if ( ! $rules['crop']){
				$orm->save();
			}
			// to pass data through iframe you will need to encode all html tags
			echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		}
		catch(ORM_Validation_Exception $e){
			echo json_encode($e->errors('kepfeltoltes'));
		}
		$this->result = $result;
	}


	/**
	 *	A képfeltöltés szabályai
	 *
	 *	Alapértelmezett:
	 *
	 *		'multiple' => false,
	 *		'values' => null,
	 *		'width' => null,
	 *		'height' => null,
	 *		'resize' => false,
	 *		'ifbigger' => false,
	 *		'fixsize' => false,
	 *		'thumb' => false,
	 *		'thumbwidth' => 100,
	 *		'thumbheight' => 100,
	 *		'quality' => 100,
	 *		'adaptiveresize' => true
	 *
	 * @return array
	 */
	public function get_rules() {
		return array(
			'multiple' => false,
			'values' => null,
			'width' => null,
			'height' => null,
			'resize' => false,
			'ifbigger' => false,
			'fixsize' => false,
			'crop' => false,
			'thumb' => false,
			'thumbwidth' => 100,
			'thumbheight' => 100,
			'quality' => 100,
			'adaptiveresize' => true
		);
	}

	public function get_result() {
		return $this->result;
	}

} // Kepfeltoltes

class KepException extends Exception {

	protected $message;

	public function __construct($msg) {

		$this->message = $msg;
	}

	public function get_message() {
		return $this->message;
	}


}
