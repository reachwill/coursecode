// include gulp
var gulp = require('gulp');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');
var nodemon = require('gulp-nodemon');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');

// Task
gulp.task('default', function() {
    // listen for changes
    livereload.listen();
    // configure nodemon
    nodemon({
        // the script to run the app
        script: 'index.js',
        ext: 'js,pug,css',
				tasks: ['minify-css','compress'],
				ignore: ['/build/*']
    }).on('restart', function() {
        // when the app has restarted, run livereload.
        gulp.src('index.js')
            .pipe(livereload())
            .pipe(notify('Reloading page, please wait...'));
    })
})

//following works but stops index.js changes
// watch: [
// 		"views/",
// 		"public/",
// 		"./index.js"
// ]

// minify new images
gulp.task('imagemin', function() {
    var imgSrc = './public/images/**/*',
        imgDst = './build/images';

    return gulp.src(imgSrc)
        .pipe(changed(imgDst))
        .pipe(imagemin())
        .pipe(gulp.dest(imgDst));
});


var uglify = require('gulp-uglify');


gulp.task('compress', function(cb) {

    var jsSrc = './public/js/**/*',
        jsDst = './build/js';


    return gulp.src(jsSrc)
        .pipe(changed(jsSrc))
        .pipe(uglify())
        .pipe(gulp.dest(jsDst));
});


var cleanCSS = require('gulp-clean-css');

gulp.task('minify-css', function() {
    var cssSrc = './public/stylesheets/**/*',
        cssDst = './build/styles';


    return gulp.src(cssSrc)
        .pipe(changed(cssSrc))
        .pipe(cleanCSS({
            compatibility: 'ie8'
        }))
        .pipe(gulp.dest(cssDst));
});
