var gulp = require('gulp');						// https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md
var less = require('gulp-less');				// https://github.com/plus3network/gulp-less
var rev = require('gulp-rev');					// https://www.npmjs.com/package/gulp-rev
var revDel = require('rev-del');				// https://github.com/callumacrae/rev-del
var minifyCss = require('gulp-minify-css');		// https://github.com/jonathanepollack/gulp-minify-css
var sourcemaps = require('gulp-sourcemaps');	// https://www.npmjs.com/package/gulp-sourcemaps
var uglify = require('gulp-uglify');			// https://www.npmjs.com/package/gulp-uglify
var concat = require('gulp-concat');			// https://www.npmjs.com/package/gulp-concat

var dir = {
    js: "media/js",
    css: "media/css",
    less: "media/less",
	build: "media/build"
};

/**
 * gulp css
 *
 * bootstrap.less és master.less compile + minify + sourcemaps
 */
gulp.task('css', function() {
    return gulp.src([/*dir.less + '/app-programfooldal.less',*/ dir.less + '/app.less'])
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(minifyCss())
        .pipe(gulp.dest(dir.css))		// css mentés
        .pipe(sourcemaps.write('.'))
        .pipe(rev())                    // revisioning
        .pipe(gulp.dest(dir.css))       // revision mentés
        .pipe(rev.manifest())           // rev-manifest generálás
        .pipe(revDel({ dest: dir.css }))  // korábbi revision törlés
        .pipe(gulp.dest(dir.css));      // rev-manifest mentés
});

gulp.task('uglify-js', function() {
	return gulp.src([dir.js + '/init.js'])
		.pipe(uglify())
		.pipe(gulp.dest(dir.build));
});

gulp.task('js', function() {
	return gulp.src([
			'media/vendor/modernizr/modernizr-2.6.1-full.js',
			'media/vendor/jquery/dist/jquery.min.js',
			'media/vendor/bootstrap/dist/js/bootstrap.min.js',
			'media/vendor/wow/dist/wow.min.js',
			dir.build+'/init.js'
		])
		.pipe(sourcemaps.init())
		.pipe(concat('all.js'))
		.pipe(gulp.dest(dir.build))
		.pipe(sourcemaps.write('.'))
		.pipe(rev())                    	// revisioning
		.pipe(gulp.dest(dir.build))       	// revision mentés
		.pipe(rev.manifest())           	// rev-manifest generálás
		.pipe(revDel({ dest: dir.build })) 	// korábbi revision törlés
		.pipe(gulp.dest(dir.build));
});


/**
 * gulp watch
 *
 * összes bootstrap és egyedi less fájl figyelése, css task futtatása
 * gulp.watch és gulp.src első paramétere lehet string is, ha csak egy útvonalat kell figyelni
 */
gulp.task('watch', function () {
    gulp.watch([dir.less + '/**/*.less'], ['css']);
    gulp.watch([dir.js + '/*.js'], ['uglify-js','js']);
});

/**
 * gulp
 *
 * default task ami indításkor lefut a css task és rögtön indítja a watchot ami a css-t futtatja
 */
gulp.task('default', ['css', 'uglify-js', 'js', 'watch']);
