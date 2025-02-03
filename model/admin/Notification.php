<?php
include 'db.php';

class Notification {
    static function getAllNotifications(): array
    {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM notification ORDER BY created_at DESC";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    static function create($message, $type) {
        $db = new Db();
        $conn = $db->open();
        $sql = "INSERT INTO notification (message, type) VALUES (?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "ss",
                $message,
                $type,
            );

            if ($stmt->execute()) {
                header('Location: ' . '../../view/admin/notifications.php');
            } else {
                echo $stmt->error;
            }

            $stmt->close();
        } else {
            echo $conn->error;
        }
    }

    static function delete(int $id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "DELETE FROM notification WHERE notification_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "i",
                $_GET['id'],
            );

            if ($stmt->execute()) {
                header('Location: ' . '../../view/admin/notifications.php');
            } else {
                echo $stmt->error;
            }

            $stmt->close();
        } else {
            echo $conn->error;
        }
        $conn->close();
    }
}