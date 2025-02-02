<?php
include_once 'db.php';

class Instructor {
    public static function searchInstructor($search_text, $limit = 10) {
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

    static function getUnapproved($offset = 0, $limit = 10) {
        $db = new db();
        $conn = $db->open();
        $unapproved_flag = 0;
        if ($limit) {
            $sql = "SELECT * FROM instructor WHERE status = $unapproved_flag LIMIT $offset, $limit";
        } else if ($offset) {
            $sql = "SELECT * FROM instructor WHERE status = $unapproved_flag OFFSET $offset";
        } else {
            $sql = "SELECT * FROM instructor WHERE status = $unapproved_flag";
        }
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return null;
    }

    public static function approve($id) {
        $db = new Db();
        $conn = $db->open();

        $sql = "UPDATE instructor SET status = 1 WHERE instructor_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;
        }

        $stmt->close();
        $conn->close();
        return false;
    }

    public static function reject($id) {
        $db = new Db();
        $conn = $db->open();

        $sql = "DELETE FROM instructor WHERE instructor_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);


        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;
        }

        $stmt->close();
        $conn->close();
        return false;
    }
}