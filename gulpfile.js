var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */



elixir(function(mix) {
    mix.less('app.less');
    mix.less('admin-lte/AdminLTE.less');
    mix.less('bootstrap/bootstrap.less');
    mix.browserify('main.js');
    mix.browserify('my-videos.js');
    mix.browserify('analytics-likes-dislikes.js');
    mix.browserify('events.js');
    mix.scripts(['profile.js']);
    mix.scripts('upload-video.js');
    mix.styles(['upload-video.css','my-videos.css']);
});
