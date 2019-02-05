var gulp = require('gulp');
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var browserSync = require('browser-sync').create();
 
sass.compiler = require('node-sass');

gulp.task('sass', function () {
    return gulp.src('./assets/sass/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('cssmin', function() {
    return gulp.src('./assets/css/style.css')
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./assets/css/'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', function () {
    browserSync.init({
        proxy: "localhost/www/appcz/lang-app"
    });

    gulp.watch(['./assets/**/*.scss'], gulp.series('sass'));
    gulp.watch(['./assets/css/style.css'], gulp.series('cssmin'));
    gulp.watch("./**/*.php").on('change', browserSync.reload);
});



