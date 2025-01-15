<?php
class MyDB {
    function openConn() {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "sectionj";
    
        try {
            $conn = new PDO("mysql:host=$DBHost;dbname=$DBName", $DBUser, $DBPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
            exit;
        }
    }
    

     function fetchAllInstructors() {
        $sql = "SELECT * FROM instructors";
        $result = $this->conn->query($sql);
        return $result;
    }
}
