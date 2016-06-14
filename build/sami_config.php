<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
	->files()
	->name('*.php')
	->name('*.js')
	->in(__DIR__.'/../src')
;

return new Sami($iterator, array(
	'title'                => 'Calendar Documentation',
	'build_dir'            => __DIR__.'/docs',
	'cache_dir'            => __DIR__.'/cache',
	'default_opened_level' => 2,
));
