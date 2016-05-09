<?php

require __DIR__.'/../../../../.composer/vendor/autoload.php';

use Sami\Sami;
use Symfony\Component\Finder\Finder;
use Sami\Version\GitVersionCollection;
use Sami\RemoteRepository\GitHubRemoteRepository;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->in($dir = __DIR__.'/LaravelTube/app');

$versions = GitVersionCollection::create($dir)
    ->add('master', 'LaravelTube Dev');

return new Sami($iterator, array(
    'title' => 'LaravelTube API',
    'versions' => $versions,
    'build_dir' => __DIR__.'/build/%version%',
    'cache_dir' => __DIR__.'/cache/%version%',
    'default_opened_level' => 2,
    'remote_repository' => new GitHubRemoteRepository('AlvaradoAdam15/LaravelTube', dirname($dir)),
));