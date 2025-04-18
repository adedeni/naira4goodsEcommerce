<?php
class Dbh {
    private $host = "localhost";
    private $dbname = "naira4goods";
    private $username = "root";
    private $password = "root";
    private $charset = "utf8mb4";
    private $socket = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock";

    protected function connect() {
        try {
            $dsn = "mysql:unix_socket=" . $this->socket . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
            // Test the connection
            $pdo->query("SELECT 1");
            
            return $pdo;
        } catch (PDOException $e) {
            error_log("Database Connection Error: " . $e->getMessage());
            error_log("Connection Details: " . $dsn);
            error_log("Error Code: " . $e->getCode());
            error_log("Stack Trace: " . $e->getTraceAsString());
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connect();
    }
}