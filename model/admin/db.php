<?php

class Db
{
    function open()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'project';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo 'Connection Error: ' . $conn->connect_error;
            return false;
        }
        return $conn;
    }

    function close($conn)
    {
        $conn->close();
    }
}
