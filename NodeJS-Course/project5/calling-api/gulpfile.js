// include gulp
var gulp = require('gulp');
var changed = require('gulp-changed');
var imagemin = require('gulp-imagemin');

// minify new images
gulp.task('imagemin', function() {
  var imgSrc = './public/images/**/*',
      imgDst = './build/images';

  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin())
    .pipe(gulp.dest(imgDst));
});


var uglify = require('gulp-uglify');


gulp.task('compress', function (cb) {

  var jsSrc = './public/js/**/*',
      jsDst = './build/js';


      gulp.src(jsSrc)
        .pipe(changed(jsSrc))
        .pipe(uglify())
        .pipe(gulp.dest(jsDst));
});


var cleanCSS = require('gulp-clean-css');

gulp.task('minify-css', function() {
  var cssSrc = './public/stylesheets/**/*',
      cssDst = './build/styles';


      gulp.src(cssSrc)
        .pipe(changed(cssSrc))
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(gulp.dest(cssDst));
});
