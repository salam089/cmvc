<?php
// framework/index.php

// example.com/web/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Jenssegers\Blade\Blade;

$views = __DIR__ . '/../src/views';
$cache = __DIR__ . '/cache';

$blade = new Blade($views, 'cache');

//echo $blade->make('src/example', ['name' => 'John Doe'])->render();
echo $blade->render('/example', ['name' => 'John Doe']);

