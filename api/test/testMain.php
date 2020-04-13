<?php

use BatchRecord\Dao\Connection;

require __DIR__ . "/../AutoloaderSourceCode.php";


$connection = Connection::getInstance()->getConnection();
$connection->prepare("SELECT * FROM producto");
$connection->

