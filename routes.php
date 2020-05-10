<?php

  require 'Router.php';
  require 'Route.php';


  $router = new Router($_SERVER['REQUEST_URI']);

  $router->setRequestUri($_SERVER['REQUEST_URI']);

  $router->setBasePath('');
  $router->add('/', function () {
    return file_get_contents('index.html');
  });

  $router->add('/pesaje', function () {
    return Router::getRenderedHTML('html/pesaje.php');
  });
  $router->add('/pesajeinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/pesajeinfo.php');
  });
  
  $router->add('/preparacion', function () {
    return Router::getRenderedHTML('html/preparacion.html');
  });
  $router->add('/preparacioninfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/preparacioninfo.php');
  });

  $router->add('/aprobacion', function () {
    return Router::getRenderedHTML('html/aprobacion.html');
  });
  $router->add('/aprobacioninfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/aprobacioninfo.html');
  });
  
  $router->add('/envasado', function () {
    return Router::getRenderedHTML('html/envasado.html');
  });
  $router->add('/envasadoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/envasadoinfo.html');
  });

  $router->add('/loteado', function () {
    return Router::getRenderedHTML('html/loteado.html');
  });
  $router->add('/loteadoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/loteadoinfo.html');
  });

  $router->add('/acondicionamiento', function () {
    return Router::getRenderedHTML('html/acondicionamiento.html');
  });
  $router->add('/acondicionamientoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/acondicionamientoinfo.html');
  });

  $router->add('/despachos', function () {
    return Router::getRenderedHTML('html/despachos.html');
  });
  $router->add('/despachoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/despachosinfo.html');
  });

  $router->add('/liberacionproducto', function () {
    return Router::getRenderedHTML('html/liberacionproducto.html');
  });
  $router->add('/liberacionproductoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/liberacionproductoinfo.html');
  });

  $router->add('/controlfisico', function () {
    return Router::getRenderedHTML('html/controlfisico.html');
  });
  $router->add('/controlfisicoinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/controlfisicoinfo.html');
  });
  
  $router->add('/liberacionlote', function () {
    return Router::getRenderedHTML('html/liberacionlote.html');
  });
  $router->add('/liberacionloteinfo/:idBatch/:referencia', function ($idBatch, $referencia) {
    return Router::getRenderedHTML('html/liberacionloteinfo.html');
  });

  $router->run();
