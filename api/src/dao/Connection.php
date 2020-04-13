<?php

namespace BatchRecord\Dao;

use BatchRecord\Constants\Constants;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use Symfony\Component\Dotenv\Dotenv;

class Connection
{
    protected $dbh;
    private static $_instance;
    private $logger;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this->logger = new Logger(self::class);
        $this->logger->pushHandler(new StreamHandler(Constants::LOGS_PATH . 'app.log', Logger::DEBUG));
        $dotenv = new Dotenv();
        $dotenv->load(__DIR__ . '/../../environment.env');
        try {
            $host = $_ENV["DB_HOST"];
            $dbname = $_ENV["DB_NAME"];
            $dbport = $_ENV["DB_PORT"];
            $dsn = "mysql:host=$host;port=$dbport;dbname=$dbname";
            $this->dbh = new \PDO($dsn, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
            $this->logger->info("Connection SuccesFully DB",array("pdo"=> $this->dbh));
        } catch (PDOException $e) {
            $this->logger->error($e->getMessage());
        }
    }

    /*
	Get an instance of the Database
	@return Instance
	*/
    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Magic method clone is empty to prevent duplication of connection
    private function __clone()
    {
    }

    // Get mysqli connection
    public function getConnection()
    {
        return $this->dbh;
    }

}