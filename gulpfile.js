var gulp = require('gulp');
var babel = require('gulp-babel');
var babelify = require('babelify');
var browserify = require('browserify');
var watchify = require('watchify');
var source = require('vinyl-source-stream');
var notify = require("gulp-notify");
var buffer = require('vinyl-buffer');
var uglify = require('gulp-uglify');
var livereload = require('gulp-livereload');
var rsync = require('gulp-rsync');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var compass = require('gulp-compass');


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

    bundler.transform(babelify.configure({
        ignore: 'parsley.js',
        stage:2,
        optional: [
            "es7.decorators",
            "es7.classProperties"
        ]
    }));
    bundler.on('error', swallowError);
    rebundle = function() {
        var stream = bundler.bundle();
        stream.on('error', swallowError);
        stream = stream.pipe(source('output.js'));
        return stream.pipe(gulp.dest('./public/js'))
            .pipe(notify('Compiled JS'))
            .pipe(livereload());
    }

    bundler.on('update', rebundle);
    return rebundle();
}

gulp.task('livereload', function() {
    livereload.changed('./public/css/main.css');
})

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./resources/assets/css/**/*.css', ['postcss']);
    gulp.watch('./public/css/main.css', ['livereload']);

    gulp.src('./resources/assets/scss/*.scss')
        .pipe(compass({
            config_file: './config.rb',
            css: 'resources/assets/css',
            sass: 'resources/assets/scss',
            task: 'watch'
        }));

    scripts(true, true);
});






gulp.task('scripts', function() {
    return scripts(false, true);
});

gulp.task('watchScripts', function() {
    return scripts(true, true);
});

gulp.task('postcss', function() {
    return gulp.src('resources/assets/css/**/*.css')
        .pipe(postcss([autoprefixer]))
        .pipe(gulp.dest('public/css/'));
});

gulp.task('gladeyestage', function() {
    gulp.src('./')
    .pipe(rsync({
            root: './',
            hostname : 'gladeye.org',
            username: '55ca79962d47f',
            destination: './site',
            recursive: true,
            exclude: ["*scss*", "*node_modules*", "*.sass-cache", "*.git", "*sublime*", "storage/views/*", ".idea/*", "storage/sessions/*", "storage/logs/*", '*/uploads/*', '.env']

        }));
});
