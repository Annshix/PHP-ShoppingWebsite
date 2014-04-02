<?php
class Database {

    protected static $instance = null;
    protected $dbh;

    public static function getInstance() {
        $username = 'root';
        $password = '';
        $host = 'localhost';
        $dbname = 'smith_php11';

        if (self::$instance == null) {
            self::$instance = new self($username, $password, $host, $dbname);
        }

        return self::$instance;
    }

    private function __construct($username, $password, $host, $database) {
        $this->dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }

    public function getDbh() {
        return $this->dbh;
    }
    
    public function __destruct() {
        $this->dbh = null;
    }
}

?>
