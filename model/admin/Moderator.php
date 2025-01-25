<?php
include_once 'db.php';
class Moderator {
    static function getModerators() {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM moderator";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    static function getModerator(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM moderator WHERE id=$id";
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    static function deleteModerator(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "DELETE FROM moderator WHERE id=$id";
        $conn->query($sql);
        $conn->close();
    }
}
