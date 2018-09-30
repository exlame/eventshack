var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

// Static Server + watching scss/html files
gulp.task('serve', ['css'], function() {

    browserSync.init({
        proxy: "http://eventshack.test/"
    });

    gulp.watch("**/*.php").on('change', browserSync.reload);
    gulp.watch("assets/**/*.scss", ['css']);
    gulp.watch("assets/**/*.js").on('change', browserSync.reload);
});
gulp.task('css', function() {
    return gulp.src("assets/scss/styles.scss")
        .pipe(sass())
        .pipe(gulp.dest("assets"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);