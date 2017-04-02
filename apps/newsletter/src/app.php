<?php

use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->get('/newsletter/ping', function() use($app) {
    return '[Newsletter] Pong!';
});

$app->get('/newsletter/box', function() use($app) {
    return $app['twig']->render('box.html.twig', []);
});

$app->get('/newsletter/bootstrap', function() use($app) {
    return $app['twig']->render('bootstrap.html.twig', []);
});

$app->post('/newsletter', function() use($app) {

    // do some persistence logic here ...

    return $app['twig']->render('thankyou.html.twig', []);
});

return $app;
