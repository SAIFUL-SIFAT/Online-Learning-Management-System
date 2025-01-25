<?php
include_once 'db.php';

class Student {
    static function getStudents() {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
    static function getStudent(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM student WHERE id = $id";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    static function deleteStudent(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "DELETE FROM student WHERE id = $id";
        $conn->query($sql);
        $conn->close();
    }
}
