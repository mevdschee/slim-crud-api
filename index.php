<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use \Tqdev\PhpCrudApi\Config;
use \Tqdev\PhpCrudApi\Api;

require __DIR__ . '/vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add this handler for PHP-CRUD-API:
$app->any('/api[/{params:.*}]', function (Request $request, Response $response) {
    $config = new Config([
        'username' => 'php-crud-api',
        'password' => 'php-crud-api',
        'database' => 'php-crud-api',
        'basePath' => '/api',
    ]);
    $api = new Api($config);
    $response = $api->handle($request);
    return $response;
});

$app->run();
