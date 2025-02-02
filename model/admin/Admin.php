<?php
include_once 'db.php';

class Admin{
    private $first_name;
    private $last_name;
    private $email;
    private $username;
    private $password;
    private $phone;
    private $profile_photo;
    private $admin_auth_code;
    private $sec_question;
    private $sec_question_ans;

    public function __construct($data){
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->username = $data['username'];
        $this->password = $data['password'];
        $this->phone = $data['phone'];
        $this->profile_photo = $data['profile_photo'];
        $this->admin_auth_code = $data['admin_auth_code'];
        $this->sec_question = $data['sec_question'];
        $this->sec_question_ans = $data['sec_question_ans'];
    }

    public static function getAdmin($username, $password)
    {
        $db = new db();
        $conn = $db->open();
        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
        $conn->close();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC)[0];
        }

        return null;
    }

    public function save()
    {
        $db = new Db();
        $conn = $db->open();

        $sql = "INSERT INTO admin (first_name, last_name, email, username, password, phone, profile_photo, admin_auth_code, sec_question, sec_question_ans) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "ssssssssss",
                $this->first_name,
                $this->last_name,
                $this->email,
                $this->username,
                $this->password,
                $this->phone,
                $this->profile_photo,
                $this->admin_auth_code,
                $this->sec_question,
                $this->sec_question_ans
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

    public static function update($data)
    {
        $db = new Db();
        $conn = $db->open();

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
}
