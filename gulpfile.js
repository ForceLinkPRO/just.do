var gulp         = require('gulp'), 				// Подключаем Gulp
    browserSync  = require('browser-sync');         // Подключаем browser-sync пакет

gulp.task('browser-sync', function() {
    //watch files
    var files = [
    '**/*.css',
    '**/*.php'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "http://just.do/",
    notify: false
    });
});

gulp.task('default', ['browser-sync'], function () {
});