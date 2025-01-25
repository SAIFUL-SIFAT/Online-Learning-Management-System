<?php
include_once 'db.php';

class Admin {
    static function getAdmins() {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM admin";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
    static function getAdmin(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM admin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    static function deleteAdmin(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "DELETE FROM admin WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $conn->close();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
