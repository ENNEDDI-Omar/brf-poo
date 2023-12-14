<?php

require __DIR__ .'/../vendor/autoload.php';

$dotenv=\Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


// class DbConx {

//     private $serverName;
//     private $userName;
//     private $password;
//     private $dbName;
//     private static $conx;
  
//     public function __construct(){

//       $this->serverName = $_ENV['DB_SERVERNAME'];
//       $this->userName = $_ENV['DB_USERNAME'];
//       $this->password = $_ENV['DB_PASSWORD'];
//       $this->dbName = $_ENV['DB_NAME'];

//       self::$conx = mysqli_connect($this->serverName, $this->userName, $this->password, $this->dbName);
     
//     //   if (self::$conx->connect_error) {
//     //     die('Erreur de Connexion:'.self::$conx->connect_error);
//     //   }else {
//     //     echo'connected';
//     //   }
//     }

// }

// $con= new DbConx();


 class DbConx{

    public static function connexion(){

        $conx = mysqli_connect($_ENV['DB_SERVERNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);

        if ($conx->connect_error) {
            die('erreur de connexion');
            
        }
        return $conx;
    }

 }




?>