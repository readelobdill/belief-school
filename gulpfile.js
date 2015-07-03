var gulp = require('gulp');
var babel = require('gulp-babel');
var babelify = require('babelify');
var browserify = require('browserify');
var watchify = require('watchify');
var source = require('vinyl-source-stream');
var notify = require("gulp-notify");
var buffer = require('vinyl-buffer');
var uglify = require('gulp-uglify');


function swallowError(error) {
    console.log(error.toString());
    notify(error.toString());
    this.emit('end');
}




function scripts(watch, production) {
    var bundler, rebundle;

    bundler = browserify({
        entries: './resources/assets/js/main.js',
        debug: !production,
        paths: ['./node_modules', './resources/assets/js'],
        cache: {},
        packageCache: {},
        fullPaths: watch
    });

    if(watch) {
        bundler = watchify(bundler);
    }

    bundler.transform(babelify);

    rebundle = function() {
        var stream = bundler.bundle();
        stream.on('error', swallowError);
        stream = stream.pipe(source('output.js'));
        return stream.pipe(gulp.dest('./public/js')).pipe(notify('Compiled JS'));;
    }

    bundler.on('update', rebundle);
    return rebundle();
}



gulp.task('watch', function() {
    gulp.watch('./resources/assets/js/**/*.js', ['modules']);
});

gulp.task('scripts', function() {
    return scripts(false, false);
});

gulp.task('watchScripts', function() {
    return scripts(true, false);
});
