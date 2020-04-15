<?php


  namespace BatchRecord\Dao;

  use BatchRecord\Constants\Constants;
  use BatchRecord\Dao\Connection;
  use Monolog\Handler\StreamHandler;
  use Monolog\Logger;

  /**
   * Class ProductDao
   * @package BatchRecord\Dao
   * @author Alexis Holguin <MoraHol>
   */
  class ProductDao
  {
    private $logger;

    public function __construct()
    {
      $this->logger = new Logger(self::class);
      $this->logger->pushHandler(new StreamHandler(Constants::LOGS_PATH . 'querys.log', Logger::DEBUG));
    }

    public function findAll()
    {
      $connection = Connection::getInstance()->getConnection();
      $stmt = $connection->prepare("SELECT * FROM producto WHERE ?");
      $stmt->execute(array(1));
      $products = $stmt->fetchAll($connection::FETCH_ASSOC);
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
      return $products;
    }
  }