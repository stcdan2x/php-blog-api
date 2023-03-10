<?php
class Database {
   // database parameters
   private $host = 'localhost';
   private $db_name = 'testblogdb';
   private $username = 'user';
   private $password = '';
   private $conn;

   // database connection
   public function connect() {
      $this->conn = null;

      try {
         $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
         echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
   }
}
