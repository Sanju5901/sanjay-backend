<?php

/**
 * @var \Slim\App $app
 */

use App\Controller\LogsController;
use App\Controller\RedirectController;

$app->get('/logs', [LogsController::class, 'list']);
$app->get('/location', [RedirectController::class, 'googleMaps'])
    ->setName('maps');

$app->post('/logs', [LogsController::class, 'store']);
