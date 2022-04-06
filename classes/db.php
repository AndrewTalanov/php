<?php

  class DB 
  {
    private static $instance = [];
    private function __construct() {
      $this->connect();
    }
    private function __clone() {}
    public function __wakeup() {}

    public static function getInstance(): DB
    {
        $cls = static::class;
        if (!isset(self::$instance[$cls])) {
            self::$instance[$cls] = new static();
        }

        return self::$instance[$cls];
    }

    private $db_connect;

    private function connect() {

      $config = require_once './configs/db.php';
      $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];

      if ($this->db_connect === Null) {
        $this->db_connect = new PDO($dsn, $config['username'], $config['password']);
      } else {
        return $this->db_connect;  
      }
      return $this;

    }

    public function create_table($name_table) {

      $sql = "CREATE TABLE IF NOT EXISTS $name_table(
        id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        description VARCHAR(100) NOT NULL,
        cost DECIMAL(8,2),
        date_wr TIMESTAMP)
        ENGINE InnoDB CHARACTER SET utf8;
      )"; 

      $this->execute($sql);
    }

    public function execute($sql) {
      $sth = $this->db_connect->prepare($sql);
      return $sth->execute();
    }

    public function query($sql) {

      $sth = $this->db_connect->prepare($sql);

      $sth->execute();

      $result = $sth->fetchAll(PDO::FETCH_ASSOC);

      if($result === false) {
        return [];
      } 
      return $result;
    }
  }
?>