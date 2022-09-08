<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$dotenv = Dotenv\Dotenv::createImmutable([__DIR__, __DIR__ . '/../']);
$dotenv->load();

$app = AppFactory::create();

require __DIR__ . '/../app/routes.php';

$app->run();
