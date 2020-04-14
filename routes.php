<?php

  require 'Router.php';
  require 'Route.php';


  $router = new Router($_SERVER['REQUEST_URI']);

  $router->setRequestUri($_SERVER['REQUEST_URI']);

  $router->setBasePath('/apps/BatchRecord');
  $router->add('/', function () {
    return file_get_contents('index.html');
  });

  $router->add('/pesaje',function(){
  return Router::getRenderedHTML('html/pesaje.html');
});

  $router->add('/pesajeinfo/:idBatch/:referencia',function($idBatch,$referencia){
    return Router::getRenderedHTML('html/pesajeinfo.html');
  });


  $router->run();
