<?php

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;

$app = new Application();

if (in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
    $app['debug'] = true;
}

$app->get('/', function () {
    return file_get_contents('index.html');
});
$app->get('/{name}', function (Application $app, $name) {
    return $app->redirect('http://qiita.com/users/'.$name);
});
$app->run();