const gulp = require("gulp")
const minify = require("gulp-minify")
const less = require("gulp-less")
const concat = require("gulp-concat")
const plumber = require("gulp-plumber")
var watchLess = require("gulp-watch-less")
var postcss = require('gulp-postcss')
var autoprefixer = require('autoprefixer')



gulp.task("watch", () => gulp.src(["less/app.less"])
    .pipe(watchLess("less/app.less"))
    .pipe(plumber())
    .pipe(concat("style.css"))
    .pipe(less())
    .pipe(postcss([ autoprefixer({
        browsers: ['last 6 versions', 'safari 7', 'ie 9', 'ios 8']
    }) ]))
    .pipe(minify())
    .pipe(gulp.dest("./")))

gulp.task("less", () => gulp.src([
        "less/app.less"
    ])
    .pipe(plumber())
    .pipe(concat("style.css"))
    .pipe(less())
    .pipe(postcss([ autoprefixer({
        browsers: ['last 6 versions', 'safari 7', 'ie 9', 'ios 8']
    }) ]))
    .pipe(minify())
    .pipe(gulp.dest("./")))

gulp.task('move', function () {
    gulp.src([
        './node_modules/bootstrap/**/*',
        './node_modules/list.js/dist/*'
    ], { base: './node_modules' })
        .pipe(gulp.dest('./vendor'));
});

gulp.task("default", ["less"])