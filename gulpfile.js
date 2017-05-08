var gulp = require('gulp');
var watch = require('gulp-watch');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var htmlmin = require('gulp-htmlmin');
var pump = require('pump');

gulp.task('minify-js', function (cb)
{
    pump([
            gulp.src('./raw/**/*.js', {base: './raw/'}).pipe(rename({
                suffix: ".min",
                extname: ".js"
            })),
            uglify(),
            gulp.dest('./assets/')
        ],
        cb
    );
});

gulp.task('minify-css', function ()
{
    return gulp.src('./raw/**/*.css', {base: './raw/'})
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(rename({
            suffix: ".min",
            extname: ".css"
        }))
        .pipe(gulp.dest('./assets/'));
});

gulp.task('minify-html', function ()
{
    return gulp.src('./raw/views/**/*.php', {base: './raw/views/'})
        .pipe(htmlmin({collapseWhitespace: true}))
        .pipe(gulp.dest('./application/views/'));
});

gulp.task('watch-minify-js', function ()
{
    // Callback mode, useful if any plugin in the pipeline depends on the `end`/`flush` event
    return watch('./raw/**/*.js', function (cb)
    {
        pump([
                gulp.src('./raw/**/*.js', {base: './raw/'}).pipe(rename({
                    suffix: ".min",
                    extname: ".js"
                })),
                uglify(),
                gulp.dest('./assets/')
            ],
            cb
        );
    });
});

gulp.task('watch-minify-css', function ()
{
    // Callback mode, useful if any plugin in the pipeline depends on the `end`/`flush` event
    return watch('./raw/**/*.css', function ()
    {
        return gulp.src('./raw/**/*.css', {base: './raw/'})
            .pipe(cleanCSS({compatibility: 'ie8'}))
            .pipe(rename({
                suffix: ".min",
                extname: ".css"
            }))
            .pipe(gulp.dest('./assets/'));
    });
});

gulp.task('watch-minify-html', function ()
{
    // Callback mode, useful if any plugin in the pipeline depends on the `end`/`flush` event
    return watch('./raw/views/**/*.php', function ()
    {
        return gulp.src('./raw/views/**/*.php', {base: './raw/views/'})
            .pipe(htmlmin({collapseWhitespace: true}))
            .pipe(gulp.dest('./application/views/'));
    });
});