<?php

class Db {
    private $conn;

    public function openConn() {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "new_project";

        $this->conn = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        if ($this->conn->connect_error) {
            die("Error connecting to the database: " . $this->conn->connect_error);
        }
	return $this->conn;
    }
    // Insert data into the moderator table
    function insertData($full_name, $email, $username, $password, $phone_number, $department, $manager, $work_location) {
        $this->openConn();

        $sql = "INSERT INTO moderator (full_name, email, username, password, phone_number, department,  manager, work_location) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param(
                "ssssssss",
                $full_name,
                $email,
                $username,
                $password,
                $phone_number,
                $department,
                $manager,
                $work_location
            );

            if ($stmt->execute()) {
                echo "Record inserted successfully!";
            } else {
                echo "Error executing statement: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement: " . $this->conn->error;
        }

        $this->closeConn(); 
    }

    // Fetch login data
    function getLoginData($full_name, $password) {
        $this->openConn();
    
        $sql = "SELECT * FROM moderator WHERE full_name = ?";
        $stmt = $this->conn->prepare($sql);
    
        if (!$stmt) {
            echo "Error: Failed to prepare statement - " . $this->conn->error;
            return null;
        }
    
        $stmt->bind_param("s", $full_name);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        $stmt->close();
    
     
        if ($user && $password === $user['password']) {
            return $user;
        } else {
            return null;
        }
    }

    ///add course
    public function addCourse($instructor_id, $title, $description) {
        $this->openConn();
        $sql = "INSERT INTO course (instructor_id, title, description) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iss", $instructor_id, $title, $description);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    //add event
    public function addEvent($title, $description, $moderator_id,$event_date) {
        $this->openConn();
        $sql = "INSERT INTO event (title, description, moderator_id,event_date) VALUES (?, ?, ?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $title, $description, $moderator_id,$event_date);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Add student
    public function addStudent($full_name, $last_name, $email, $phone, $country, $preferred_language) {
        $this->openConn();
        $sql = "INSERT INTO student (full_name, last_name, email, phone, country, preferred_language) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $full_name, $last_name, $email, $phone, $country, $preferred_language);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function getCourses()
    {
        $this->openConn();
        $sql = "SELECT * FROM course ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    
    public function getEvents()
    {
        $this->openConn();
        $sql = "SELECT *  FROM event ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function getAllStudents(){
        $this->openConn();
    
        $sql = "SELECT student_id, full_name, last_name, email, phone, country, preferred_language FROM student";
        $result = $this->conn->query($sql);
    
        if ($result) {
            return $result; 
        } else {
            echo "Error fetching students: " . $this->conn->error;
            return false;
        }
    }
    

    // Close database connection
    function closeConn() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
