var elixir = require('laravel-elixir'),
    liveReload = require('gulp-livereload'),
    clean = require('gulp-clean'),
    gulp = require('gulp');

//Para executar essa tarefa, digitar o seguinte no console:
//  gulp teste
/*gulp.task('teste', function () {
    console.log('está funcionando')
});
*/


var config = {
    assets_path:'.resources/assets',
    build_path:'.public/build'
};

config.bower_path = config.assets_path + '/../bower_components';


config.build_path_js = config.build_path +'/js';
config.build_vendor_path_js = config.build_path_js +'/vendor';// arquivos JS de terceiros
config.vendor_path_js = [
    config.bower_path + '/jquery/dist/jquery.min.js',
    config.bower_path + '/bootstrap/dist/js/bootstrap.min.js',
    config.bower_path + '/angular/angular.min.js',
    config.bower_path + '/angular-route/angular-route.min.js',
    config.bower_path + '/angular-resource/angular-resource.min.js',
    config.bower_path + '/angular-animate/angular-animate.min.js',
    config.bower_path + '/angular-messages/angular-messages.min.js',
    config.bower_path + '/angular-bootstrap/ui-bootstrap.min.js',
    config.bower_path + '/angular-strap/modules/navbar.min.js',
];

config.build_path_css = config.build_path +'/css';
config.build_vendor_path_css = config.build_path_css +'/vendor';// arquivos CSS de terceiros
config.vendor_path_css = [
    config.bower_path + 'bootstrap/dist/css/bootstrap.min.css',
    config.bower_path + 'bootstrap/dist/css/bootstrap-theme.min.css',
];

gulp.task('copy-styles', function () {
    gulp.src([
        config.assets_path + '/css/**/*.css'
    ]).pipe(gulp.dest(config.build_path_css)).pipe(liveReload());

    // Aqui está copiando o CSS de terceiro para a pasta public
    gulp.src(config.vendor_path_css).pipe(gulp.dest(config.build_vendor_path_css)).pipe(liveReload());

});


gulp.task('copy-scripts', function () {
    gulp.src([
        config.assets_path + '/js/**/*.js'
    ]).pipe(gulp.dest(config.build_path_js)).pipe(liveReload());

    // Aqui está copiando o JS de terceiro para a pasta public
    gulp.src(config.vendor_path_js).pipe(gulp.dest(config.build_vendor_path_js)).pipe(liveReload());
});


gulp.task('watch-dev', function () {

    console.log('watch-dev será executado');

    liveReload().listen();
    gulp.start('copy-styles', 'copy-scripts');
    gulp.watch(config.assets_path + '/**', ['copy-styles', 'copy-scripts']);
});


/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});
