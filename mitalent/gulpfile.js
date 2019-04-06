var gulp        = require('gulp');
var sass        = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS     = require('gulp-clean-css');

gulp.task('sass', function () {
	return gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
		.pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('.'))
		.pipe(gulp.dest(''))
});
gulp.task("watch", ['sass'], function () {
    gulp.watch('sass/**/*.scss', ["sass"]);
});