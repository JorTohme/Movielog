<?php 

  class DB {

    private $host;
    private $database;
    private $user;
    private $password;
    private $charset;

    public function __construct()
    {
      $this -> host      = 'localhost';
      $this -> database  = 'movielog';
      $this -> user      = 'root';
      $this -> password  = "";
      $this -> charset   = 'utf8mb4';
    }

    public function connect() 
    {
      try 
      {

        $connection = "mysql:host" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset;
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false];
        $pdo = new PDO($connection, $this->user, $this->password, $options);

      }
      catch(PDOException $e)
      {

        print_r("Error connection: " . $e->getMessage());

      }

    }
    
  }

?>