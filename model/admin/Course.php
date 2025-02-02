<?php
require 'db.php';

class Course {
    private $instructor_id;
    private $title;
    private $description;

    public function __construct($data) {
        $this->instructor_id = $data['instructor_id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
    }

    public static function getCourses() {
        $db = new Db();
        $conn = $db->open();
        $sql = "SELECT * FROM course";

        return $conn->query($sql);
    }

    public function save() {
        $db = new Db();
        $conn = $db->open();
        $sql = "INSERT INTO course (instructor_id, title, description) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "iss",
                $this->instructor_id,
                $this->title,
                $this->description
            );

            if ($stmt->execute()) {
                header('Location: ' . '../../view/admin/courses.php');
            } else {
                echo $stmt->error;
            }

            $stmt->close();
        } else {
            echo $conn->error;
        }
        $conn->close();
    }

    public static function delete($id) {
        $db = new Db();
        $conn = $db->open();
        $sql = "DELETE FROM course WHERE course_id = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "i",
                $id,
            );

            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();

                return true;
            }
        }

        $stmt->close();
        $conn->close();

        return false;
    }
}