const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const clean = require('gulp-clean');
const rename = require('gulp-rename');
const notify = require('gulp-notify');

const jsFiles = [
	'library/js/modernizr.js',
	'library/js/libs/jquery/dist/jquery.js',
	'library/js/libs/bootstrap/dist/js/bootstrap.min.js',
	'library/js/libs/bigtext/dist/bigtext.js',
	'library/js/libs/moment/moment.js',
	'library/js/libs/moment-timezone/moment-timezone.js',
	'library/js/custom.js'
];

gulp.task('default', () => {
	gulp.watch(jsFiles, ['scripts']);
});

gulp.task('scripts', ['cleanJs'], () =>
	gulp.src(jsFiles)
	.pipe(concat('main.js'))
	.pipe(gulp.dest('dist/js'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(uglify())
	.pipe(gulp.dest('dist/js'))
	.pipe(notify({ message: 'Scripts task complete' }))
);

gulp.task('cleanJs', () =>
  gulp.src(['dist/js'], { read: false })
	.pipe(clean())
);