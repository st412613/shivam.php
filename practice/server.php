<?php

class Database {
    private static ?Database $instance = null;
    private mysqli $connection;

    private function __construct() {
        $this->connection = new mysqli(
            'localhost',
            'root',      
            'password', 
            'test'  
        );

        if ($this->connection->connect_error) {
            throw new Exception("DB Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): mysqli {
        return $this->connection;
    }
}

try {
    Database::getInstance()->getConnection();
    echo "connection successful";
} catch (Exception $e) {
    echo $e->getMessage();
}
