var gulp = require('gulp'),
	sass = require('gulp-sass'),
	concat = require('gulp-concat'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	plumber = require('gulp-plumber'),
	notify = require('gulp-notify'),
	livereload = require('gulp-livereload'),
	fs = require('node-fs');
	fse = require('fs-extra'),
	json = require('json-file'),
	nib = require('nib'),
	themeName = json.read('./package.json').get('themeName'),
	themeDir = '../' + themeName,
	plumberErrorHandler = { errorHandler: notify.onError({
		title: 'Gulp',
		message: 'Error: <%= error.message %>'
		})
	};


gulp.task('styles', function() {
	gulp.src('./src/css/*.{sass, scss}')
		.pipe(plumber(plumberErrorHandler))
		.pipe(sass())
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(gulp.dest('../assets/css'))
		.pipe(livereload());
 
});
gulp.task('scripts', function () {
	gulp.src('./src/js/*.js')
		.pipe(plumber(plumberErrorHandler))
		.pipe(concat('theme.js'))
		.pipe(gulp.dest('../assets/js'))
		.pipe(livereload());
});

gulp.task('img', function() {
	gulp.src('./src/img/*.{png,jpg,gif, svg}')
		.pipe(plumber(plumberErrorHandler))
		.pipe(imagemin({
			optimizationLevel: 7,
			progressive: true
		}))
		.pipe(gulp.dest('../assets/img'))
		.pipe(livereload());
});

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('./src/css/**/*.{scss,sass}', ['styles']);
	gulp.watch('./src/js/*.js', ['scripts']);
	gulp.watch('./src/img/*.{png,jpg,gif}', ['img']);
});

gulp.task('init', function() {
  fs.mkdirSync(themeDir, 765, true);
  fse.copySync('theme-boilerplate', themeDir + '/');
});


gulp.task('default', ['styles', 'scripts', 'img', 'watch'])