<?php

  use BatchRecord\dao\BatchDao;
  use BatchRecord\dao\CargoDao;
  use BatchRecord\Dao\Connection;
  use BatchRecord\dao\DesinfectanteDao;
  use BatchRecord\dao\MateriaPrimaDao;
  use BatchRecord\Dao\PesajeDao;
  use BatchRecord\dao\PreguntaDao;
  use BatchRecord\Dao\ProductDao;
  use Psr\Http\Message\ResponseInterface as Response;
  use Psr\Http\Message\ServerRequestInterface as Request;
  use Slim\Factory\AppFactory;

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
  $pesajeDao = new PesajeDao();
  $batchDao = new BatchDao();
  $preguntaDao = new PreguntaDao();
  $desinfectanteDao = new DesinfectanteDao();
  $materiaPrimaDao = new MateriaPrimaDao();
  $cargoDao = new CargoDao();

  $app = AppFactory::create();
  $app->setBasePath('/api');


// Add Routing Middleware
  $app->addRoutingMiddleware();


  $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Define app routes
  $app->get('/', function (Request $request, Response $response, $args) {
    $connection = Connection::getInstance()->getConnection();
    $response->getBody()->write("hello world");
    return $response;
  });
  $app->get('/products', function (Request $request, Response $response, $args) use ($productDao) {
    $products = $productDao->findAll();
    $response->getBody()->write(json_encode($products));
    return $response;
  });

  $app->get('/pesajes', function (Request $request, Response $response, $args) use ($pesajeDao) {
    $pesajes = $pesajeDao->findAll();
    $response->getBody()->write(json_encode($pesajes, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/batch/{id}', function (Request $request, Response $response, $args) use ($batchDao) {
    $batch = $batchDao->findById($args["id"]);
    $response->getBody()->write(json_encode($batch, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/questions', function (Request $request, Response $response, $args) use ($preguntaDao) {
    $batch = $preguntaDao->findAll();
    $response->getBody()->write(json_encode($batch, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/desinfectantes', function (Request $request, Response $response, $args) use ($desinfectanteDao) {
    $batch = $desinfectanteDao->findAll();
    $response->getBody()->write(json_encode($batch, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/materiasp/{idProduct}', function (Request $request, Response $response, $args) use ($materiaPrimaDao) {
    $batch = $materiaPrimaDao->findByProduct($args["idProduct"]);
    $response->getBody()->write(json_encode($batch, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/cargos', function (Request $request, Response $response, $args) use ($cargoDao) {
    $batch = $cargoDao->findAll();
    $response->getBody()->write(json_encode($batch, JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });
// Run app
  $app->run();