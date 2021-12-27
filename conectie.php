<?php
    class database
    {
        private $hostname = "127.0.0.1"; 
        private $dbUser = "root";
        private $dbPassword = "root";
        private $dbName = "shanging_hat";
        private $dbPort = 3306;
        private $conn;       

        function __construct() 
        {
            $this->conn = $this->createConnection();
        }

        function createConnection()
        {
            $conn = mysqli_connect($this->hostname, $this->dbUser, $this->dbPassword, $this->dbName, $this->dbPort);
            if ($conn == false )
            {
                echo"Try again";
                die();
            }
            return $conn;
        }

        function getQuery($query) {
            return mysqli_query($this->conn, $query)->fetch_all(MYSQLI_ASSOC);
        }
    
        function InsertQuery($query) {
            mysqli_query($this->conn,$query);
        }
    
        function closeConnection() {
            $this->conn->close();
        }
    }   
?>