<?php


  namespace BatchRecord\dao;


  use BatchRecord\Constants\Constants;
  use Monolog\Handler\StreamHandler;
  use Monolog\Logger;

  /**
   *
   * Class BatchDao
   * @package BatchRecord\dao
   * @author Alexis Holguin <MoraHol>
   */
  class BatchDao
  {
    private $logger;

    public function __construct()
    {
      $this->logger = new Logger(self::class);
      $this->logger->pushHandler(new StreamHandler(Constants::LOGS_PATH . 'querys.log', Logger::DEBUG));
    }

    /**
     * @return array
     */
    public function findAll()
    {
      $connection = Connection::getInstance()->getConnection();
      $stmt = $connection->prepare("SELECT * FROM producto INNER JOIN batch ON batch.id_producto = producto.referencia INNER JOIN linea ON producto.id_linea = linea.id INNER JOIN propietario ON producto.id_propietario = propietario.id INNER JOIN presentacion_comercial ON producto.id_presentacion_comercial = presentacion_comercial.id WHERE batch.estado = 1 OR batch.estado = 2 AND batch.fecha_programacion = CURRENT_DATE()");
      $stmt->execute();
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
      $pesajes = $stmt->fetchAll($connection::FETCH_ASSOC);
      $this->logger->notice("Batch Obtenidos", array('batch' => $pesajes));
      return $pesajes;

    }

    /**
     * Encuentra un batch por id
     * @param $id integer id a buscar
     * @return mixed
     */
    public function findById($id)
    {
      $connection = Connection::getInstance()->getConnection();
      $stmt = $connection->prepare("SELECT * FROM producto INNER JOIN batch ON batch.id_producto = producto.referencia  INNER JOIN linea ON linea.id = producto.id_linea WHERE id_batch= :idBatch");
      $stmt->execute(array('idBatch' => $id));
      $this->logger->info(__FUNCTION__, array('query' => $stmt->queryString, 'errors' => $stmt->errorInfo()));
      $batch = $stmt->fetch($connection::FETCH_ASSOC);
      $this->logger->notice("batch consultado", array('batch' => $batch));
      return $batch;
    }

  }