<?php


  namespace BatchRecord\dao;


  use BatchRecord\Constants\Constants;
  use Monolog\Handler\StreamHandler;
  use Monolog\Logger;

  class PreguntaDao
  {
    private $logger;

    public function __construct()
    {
      $this->logger = new Logger(self::class);
      $this->logger->pushHandler(new StreamHandler(Constants::LOGS_PATH . 'querys.log', Logger::DEBUG));
    }

    public function findAll(){
      $connection = Connection::getInstance()->getConnection();
      $stmt = $connection->prepare("SELECT * FROM preguntas ORDER BY RAND()");
      $stmt->execute();
      $preguntas =$stmt->fetchAll($connection::FETCH_ASSOC);
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
      return $preguntas;
    }
  }