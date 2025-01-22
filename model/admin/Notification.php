<?php
include 'db.php';

class Notification {
    static function getAllNotifications(): array
    {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM notification";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    static function createNotification($instructor_id, $message, $type): bool {
        $db = new Db();
        $conn = $db->open();
        $sql = "INSERT INTO notification (instructor_id, message, type) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "iss",
                $instructor_id,
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

    static function deleteNotification(int $id): bool {
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