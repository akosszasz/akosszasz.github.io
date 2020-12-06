var gulp = require('gulp'),
		plumber = require('gulp-plumber'),
		rename = require('gulp-rename');
var concat = require('gulp-concat');
//var uglify = require('gulp-uglify');
var minifycss = require('gulp-minify-css');
var sass = require('gulp-sass');
var rev = require('gulp-rev');
var revDel = require('rev-del');

var src = {
	vendor: 'media/vendor/',
	sass: 'media/src/sass/',
	js: 'media/src/js/'
}

var dest = {
	css: 'media/css/',
	js: 'media/js/'
};

gulp.task('styles', function(){
	gulp.src([src.sass + '**/*.scss'])
			.pipe(plumber({
				errorHandler: function (error) {
					console.log(error.message);
					this.emit('end');
				}}))
			.pipe(sass())
			.pipe(gulp.dest(dest.css))
			.pipe(rename({suffix: '.min'}))
			.pipe(minifycss())
			.pipe(gulp.dest(dest.css))
			.pipe(rev())
			.pipe(gulp.dest(dest.css))
			.pipe(rev.manifest())
			.pipe(revDel({dest: dest.css}))
			.pipe(gulp.dest(dest.css));
});

gulp.task('scripts', function(){
	return gulp.src([
				'media/vendor/jquery/dist/jquery.min.js',
				'media/vendor/bootstrap/dist/js/bootstrap.min.js',
				'media/vendor/owl.carousel/dist/owl.carousel.min.js',
				'media/vendor/parallaxie/parallaxie.js',
				'media/vendor/wow/dist/wow.min.js',
				'media/vendor/tableheadfixer/tableHeadFixer.js',
				'media/vendor/imagesloaded/imagesloaded.pkgd.min.js',
				'media/vendor/photoswipe/photoswipe.min.js',
				'media/vendor/photoswipe/photoswipe-ui-default.min.js',
				src.js + 'app.js'
			])
			.pipe(plumber({
				errorHandler: function (error) {
					console.log(error.message);
					this.emit('end');
				}}))
			.pipe(concat('all.js'))
			.pipe(gulp.dest(dest.js))
			.pipe(rename({suffix: '.min'}))
			//		.pipe(uglify())
			.pipe(gulp.dest(dest.js))
			.pipe(rev())
			.pipe(gulp.dest(dest.js))
			.pipe(rev.manifest())
			.pipe(revDel({dest: dest.js}))
			.pipe(gulp.dest(dest.js));
});

gulp.task('default', function(){
	gulp.watch(src.sass + "**/*.scss", gulp.series('styles'));
	gulp.watch(src.js + "**/*.js", gulp.series('scripts'));
});
