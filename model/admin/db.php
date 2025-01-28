<?php

const PROFILE_PICTURE_UPLOAD_PATH = '../uploads/admin/profile/';

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

    function insertData($data)
    {
        $conn = $this->open();

        $sql = "INSERT INTO admin (first_name, last_name, email, username, password, phone, profile_photo, admin_auth_code, sec_question, sec_question_ans) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "ssssssssss",
                $data['first_name'],
                $data['last_name'],
                $data['email'],
                $data['username'],
                $data['password'],
                $data['phone'],
                $data['profile_photo'],
                $data['admin_auth_code'],
                $data['sec_question'],
                $data['sec_question_ans']
            );

            if ($stmt->execute()) {
                echo "Record inserted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }

        $conn->close();
    }

    function getLoginData($username, $password)
    {
        $conn = $this->open();

        $statement = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
        $statement->bind_param("ss", $username, $password);
        $statement->execute();
        $result = $statement->get_result();
        $statement->close();
        $conn->close();

        return $result->fetch_assoc();
    }

    function updateData($data)
    {
        $conn = $this->open();

        $admin_id = $data['admin_id'];
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $phone = $data['phone'];
        $profile_photo = $data['profile_photo'] ?? '';
        $sec_question = $data['sec_question'];
        $sec_question_ans = $data['sec_question_ans'];

        $sql = "
        UPDATE admin SET 
            first_name = ?, 
            last_name = ?, 
            email = ?, 
            username = ?, 
            password = ?, 
            phone = ?, 
            profile_photo = ?, 
            sec_question = ?, 
            sec_question_ans = ?
        WHERE admin_id = ?
        ";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("error: " . $conn->error);
        }

        $stmt->bind_param(
            "sssssssssi",
            $first_name,
            $last_name,
            $email,
            $username,
            $password,
            $phone,
            $profile_photo,
            $sec_question,
            $sec_question_ans,
            $admin_id
        );

        if ($stmt->execute()) {
            $_SESSION = $_POST;
            if (isset($_SESSION['password']))
                unset($_SESSION['password']);
        }

        $stmt->close();
        $conn->close();
    }

    function close($conn)
    {
        $conn->close();
    }
}
