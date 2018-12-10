<?php

class Database
{
    private $host = "localhost";
    private $db_name = "maindb";
    private $username = "root";
    private $password = "1234";
    public $conn;

	//Returns a connection to the database
    public function getConnection()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }
        catch(PDOException $exception)
        {
            echo "Error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
