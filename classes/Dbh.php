<?php
class Dbh{
    private $con ="mysql:host=localhost;dbname=naira4goods";
    private $dbusername = "root";
    private $dbpwd = "";
    protected function connect(){
        try {
            $pdo = new PDO($this->con, $this->dbusername, $this->dbpwd);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo "connectionn failed". $e->getMessage();
            die();
        }
    }
        public function getConnection() {
        return $this->connect();
    }
}