# LaravelTube
[![Latest Stable Version](https://poser.pugx.org/deltcod/laraveltube/v/stable)](https://packagist.org/packages/deltcod/laraveltube)
[![License](https://poser.pugx.org/deltcod/laraveltube/license)](https://packagist.org/packages/deltcod/laraveltube)
[![Build Status](https://travis-ci.org/deltcod/LaravelTube.svg?branch=master)](https://travis-ci.org/deltcod/LaravelTube)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/deltcod/LaravelTube/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/deltcod/LaravelTube/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/deltcod/LaravelTube/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/deltcod/LaravelTube/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/deltcod/LaravelTube/badges/build.png?b=master)](https://scrutinizer-ci.com/g/deltcod/LaravelTube/build-status/master)
[![StyleCI](https://styleci.io/repos/56526883/shield)](https://styleci.io/repos/56526883)
[![Coverage Status](https://coveralls.io/repos/github/deltcod/LaravelTube/badge.svg?branch=master)](https://coveralls.io/github/deltcod/LaravelTube?branch=master)

Open source project about sharing videos platform built on Laravel

# Installation & use

```bash
git clone https://github.com/deltcod/LaravelTube.git
cd LaravelTube/
composer install
npm install
mv .env.example .env
# Now, configure your file .env with your DATABASE
php artisan migrate:refresh --seed
php artisan key:generate
gulp
php artisan serve
```
## Notes
If you want convert videos to other formats, you need install 'FFMpeg' in your server and configure file config/ffmpeg.php
```bash
sudo apt-get install ffmpeg
```
If you want to upload files with more weight you have to change the settings of your php.ini

If you want execute broadcasting events, you need install Redis in your server
```bash
curl -O http://download.redis.io/redis-stable.tar.gz
tar xzvf redis-stable.tar.gz
cd redis-stable
make
```
and run 
```bash
node broadcast_server/socket.js
```

# Requirements
This packages use (no need to install):

* [Composer](https://getcomposer.org/)
* [Laravel](http://laravel.com/)
* [Laravel Socialite](https://github.com/laravel/socialite)
* [AdminLTE](https://github.com/almasaeed2010/AdminLTE). You can see and AdminLTE theme preview at: http://almsaeedstudio.com/preview/
* [ApiGuard](https://github.com/chrisbjr/api-guard)
* [Vue.js](https://vuejs.org/)
* [Ajax and jQuery](http://api.jquery.com/jquery.ajax/)
* [Video.js](http://videojs.com/)
* [FFMpeg](https://github.com/linkthrow/ffmpeg)
* [Chartjs](http://www.chartjs.org/)
* [Redis.io](http://redis.io/)
* [Socket.io](http://socket.io/)

# Docs
http://deltcod.github.io/LaravelTube/api/master/

http://deltcod.github.io/LaravelTube/docs/EERDiagram.mwb

# Packagist
https://packagist.org/packages/deltcod/laraveltube

# Tests

Execute:

```
vendor/bin/phpunit
```

# Social Login
If you want use Social login, you need configure in your file .env:

FACEBOOK_ID=*----*

FACEBOOK_SECRET=*----*

FACEBOOK_URL=http:*----*

TWITTER_ID=*----*

TWITTER_SECRET=*----*

TWITTER_URL=http:*----*

GOOGLE_ID=*----*

GOOGLE_SECRET=*----*

GOOGLE_URL=http:*----*

*----* Is your configuration in:
* https://developers.facebook.com/apps/
* https://apps.twitter.com/
* https://console.developers.google.com

# Versioning

I use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags in this repository](https://github.com/deltcod/LaravelTube/tags).

# Author

**Adam Alvarado Bertomeu** [deltcod](https://github.com/deltcod)

See also the list of [contributors](https://github.com/deltcod/LaravelTube/graphs/contributors) who participated in this project.

# License
This LaravelTube is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
