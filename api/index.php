<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use BatchRecord\Dao\Connection;
use BatchRecord\Dao\ProductDao;
require __DIR__ . '/vendor/autoload.php';
include_once __DIR__ . '/AutoloaderSourceCode.php';

/**
 * Instantiate App
 *
 * In order for the factory to work you need to ensure you have installed
 * a supported PSR-7 implementation of your choice e.g.: Slim PSR-7 and a supported
 * ServerRequest creator (included with Slim PSR-7)
 */
//variables
  $productDao = new ProductDao();


$app = AppFactory::create();
$app->setBasePath('/apps/BatchRecord/api');


// Add Routing Middleware
$app->addRoutingMiddleware();



$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define app routes
$app->get('/', function (Request $request, Response $response, $args) {
    $connection = Connection::getInstance()->getConnection();
    $response->getBody()->write("hello world");
    return $response;
});
  $app->get('/products', function (Request $request, Response $response, $args) use ($productDao){
    $products = $productDao->findAll();
    $response->getBody()->write(json_encode($products));
    return $response;
  });

// Run app
$app->run();