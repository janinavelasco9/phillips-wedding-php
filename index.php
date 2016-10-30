<?php

require('vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/web/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/our-wedding', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('our-wedding.twig');
});

$app->get('/details', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('details.twig');
});

$app->get('/photographs', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('photographs.twig');
});

$app->get('/rsvp', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('rsvp.twig');
});

$app->get('/thank-you', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('thank-you.twig');
});

$app->run();
