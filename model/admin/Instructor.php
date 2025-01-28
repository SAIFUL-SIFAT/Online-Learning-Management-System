<?php
include_once 'db.php';

class Instructor {
    static function searchInstructor($search_text, $limit = 10) {
        $db = new Db();
        $conn = $db->open();
        if ($limit) {
            $sql = "SELECT * FROM instructor WHERE full_name LIKE '%$search_text%' OR email LIKE '%$search_text%' LIMIT $limit";
        } else {
            $sql = "SELECT * FROM instructor WHERE full_name LIKE '%$search_text%' OR email LIKE '%$search_text%'";
        }
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }
}