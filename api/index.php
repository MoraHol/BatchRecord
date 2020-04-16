<?php

  use BatchRecord\dao\AgitadorDao;
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
  use BatchRecord\dao\MarmitaDao;
  use BatchRecord\dao\IntructivoPreparacionDao;

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
  $agitadorDAo = new AgitadorDao();
  $marmitaDao = new MarmitaDao();
  $instructivoPreparacionDao = new IntructivoPreparacionDao();

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
    $response->getBody()->write(json_encode(utf8_string_array_encode($products)), JSON_NUMERIC_CHECK);
    return $response;
  });

  $app->get('/pesajes', function (Request $request, Response $response, $args) use ($pesajeDao) {
    $pesajes = $pesajeDao->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($pesajes), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/batch/{id}', function (Request $request, Response $response, $args) use ($batchDao) {
    $batch = $batchDao->findById($args["id"]);
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/batch', function (Request $request, Response $response, $args) use ($batchDao) {
    $batch = $batchDao->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/questions', function (Request $request, Response $response, $args) use ($preguntaDao) {
    $array = $preguntaDao->findAll();
    $batch = utf8_string_array_encode($array);
    if ($batch == null) {
      $response->getBody()->write('');
    } else {
      $response->getBody()->write(json_encode($batch));

    }
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/desinfectantes', function (Request $request, Response $response, $args) use ($desinfectanteDao) {
    $batch = $desinfectanteDao->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/materiasp/{idProduct}', function (Request $request, Response $response, $args) use ($materiaPrimaDao) {
    $batch = $materiaPrimaDao->findByProduct($args["idProduct"]);
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/cargos', function (Request $request, Response $response, $args) use ($cargoDao) {
    $batch = $cargoDao->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/agitadores', function (Request $request, Response $response, $args) use ($agitadorDAo) {
    $batch = $agitadorDAo->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/marmitas', function (Request $request, Response $response, $args) use ($marmitaDao) {
    $batch = $marmitaDao->findAll();
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });

  $app->get('/instructivos/{idProducto}', function (Request $request, Response $response, $args) use ($instructivoPreparacionDao) {
    $batch = $instructivoPreparacionDao->findByProduct($args["idProducto"]);
    $response->getBody()->write(json_encode(utf8_string_array_encode($batch), JSON_NUMERIC_CHECK));
    return $response->withHeader('Content-Type', 'application/json');
  });
  // Run app
  $app->run();


  function utf8_string_array_encode(array &$array)
  {
    $func = function (&$value, &$key) {
      if (is_string($value)) {
        $value = utf8_encode($value);
      }
      if (is_string($key)) {
        $key = utf8_encode($key);
      }
      if (is_array($value)) {
        utf8_string_array_encode($value);
      }
    };
    array_walk($array, $func);
    return $array;
  }