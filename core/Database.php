<?php


class Database
{
   private $pdo;

   private static $instance = null;

   

   public function __construct()
   {
       try {
           $config = require_once '../config/database.php';
           $this->pdo = new PDO(
               "mysql:host=" . $config['host'] . ";dbname=" . $config['database'],
               $config['username'],
               $config['password'],
               $config['options']
           );
           $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       } catch (\Throwable $th) {
           die("Database connection failed: " . $th->getMessage());
       }

   } 


   public static function getInstance()
   {
       if (self::$instance === null) {
           self::$instance = new Database();
       }
       return self::$instance->pdo;
   }
}

?>
