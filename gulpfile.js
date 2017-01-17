const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const clean = require('gulp-clean');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const sass = require('gulp-sass');
const cleanCss = require('gulp-clean-css');
const image = require('gulp-image');




const jsFiles = [
	'library/js/modernizr.js',
	'library/js/libs/bootstrap/dist/js/bootstrap.min.js',
	'library/js/libs/bigtext/dist/bigtext.js',
	'library/js/libs/moment/moment.js',
	'library/js/libs/moment-timezone/builds/moment-timezone-with-data.min.js',
	'library/js/custom.js'
];

const cssFiles = [
	'library/scss/style.scss',
	'library/scss/login.scss',
	'library/scss/ie.scss',
	'library/scss/editor-style.scss',
	'library/scss/admin.scss'
];

const imageFiles = [ 'library/images/*' ]


gulp.task('default', () => {
	gulp.watch(jsFiles, ['js']);
	gulp.watch('library/scss/**/*.scss', ['css']);
	gulp.watch(imageFiles, ['images']);
});




gulp.task('js', ['cleanJs'], () =>
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



gulp.task('css', ['cleanCss'], () =>
	gulp.src(cssFiles)
	.pipe(sass().on('error', sass.logError))
	.pipe(gulp.dest('dist/css'))
	.pipe(rename({ suffix: '.min' }))
	.pipe(cleanCss({ debug: true }, (details) => {
		console.log(`${details.name}: ${details.stats.originalSize}`);
		console.log(`${details.name}: ${details.stats.minifiedSize}`);
	}))
	.pipe(gulp.dest('dist/css'))
	.pipe(notify({ message: 'CSS task complete' }))
);

gulp.task('cleanCss', () =>
	gulp.src(['dist/css'], { read: false })
	.pipe(clean())
);



gulp.task('images', ['cleanImages'], () =>
	gulp.src(imageFiles)
	.pipe(image())
	.pipe(gulp.dest('dist/img'))
	.pipe(notify({ message: 'Images task complete' }))
);

gulp.task('cleanImages', () =>
  gulp.src(['dist/img'], { read: false })
	.pipe(clean())
);



