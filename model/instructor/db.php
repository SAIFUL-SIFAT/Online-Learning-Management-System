<?php
class MyDB {
    private $conn;

    // Open connection to the database
    public function openConn() {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "new_project";

        $this->conn = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        if ($this->conn->connect_error) {
            die("Error connecting to the database: " . $this->conn->connect_error);
        }
    }

    // Create the instructor table if it doesn't exist
    public function createTableIfNotExists() {
        $createTableQuery = "
            CREATE TABLE IF NOT EXISTS instructor (
                id INT AUTO_INCREMENT PRIMARY KEY,
                full_name VARCHAR(40) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phone VARCHAR(15) NOT NULL,
                pass VARCHAR(255) NOT NULL,
                qualifications TEXT NOT NULL,
                profile_picture VARCHAR(255),
                expertise VARCHAR(50) NOT NULL,
                teaching_experience INT NOT NULL,
                gender ENUM('Male', 'Female') NOT NULL
            )";

        if (!$this->conn->query($createTableQuery)) {
            die("Error creating table: " . $this->conn->error);
        }
    }

    // Insert data into the instructor table
    public function insertData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $teaching_experience, $institution) {
        // $this->createTableIfNotExists();
        $this->openConn();

        $sql = "INSERT INTO instructor (full_name, email, phone, pass, qualifications, profile_picture, expertise, teaching_experience, institution) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            die("SQL Prepare Error: " . $this->conn->error);
        }

        $stmt->bind_param(
            "sssssssis",
            $full_name,
            $email,
            $phone,
            $pass,
            $qualifications,
            $profile_picture,
            $expertise,
            $teaching_experience,
            $institution
        );

        if ($stmt->execute()) {
            echo "Data inserted successfully.<br>";
        } else {
            echo "Error inserting data: " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    // Fetch data by credentials
    public function getDataByCredentials($full_name, $pass) {
        $this->openConn();
        $sql = "SELECT * FROM instructor WHERE full_name = ?";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: " . $this->conn->error;
            return null;
        }

        $stmt->bind_param("s", $full_name);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();

        if ($user && $pass === $user['pass']) {
            return $user;
        } else {
            return null;
        }
    }

    // Update data in the instructor table
    public function updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $teaching_experience, $gender) {
        $sql = "
            UPDATE instructor 
            SET full_name = ?, email = ?, phone = ?, pass = ?, qualifications = ?, profile_picture = ?, expertise = ?, teaching_experience = ?, gender = ? 
            WHERE full_name = ?";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: " . $this->conn->error;
            return;
        }

        $stmt->bind_param(
            "sssssssiss",
            $full_name,
            $email,
            $phone,
            $pass,
            $qualifications,
            $profile_picture,
            $expertise,
            $T_experience,
            $gender,
            $full_name
        );

        if ($stmt->execute()) {
            echo "Data updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Add a course to the courses table
    public function addCourse($instructor_id, $title, $description) {
        $sql = "INSERT INTO courses (instructor_id, title, description) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: " . $this->conn->error;
            return;
        }

        $stmt->bind_param("iss", $instructor_id, $title, $description);

        if ($stmt->execute()) {
            echo "Course added successfully.";
        } else {
            echo "Error adding course: " . $stmt->error;
        }

        $stmt->close();
    }
    public function getStudents($conn) {
        $this->openConn();
        $sql = "SELECT * FROM student";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error fetching students: " . $this->conn->error;
            return [];
        }
    }

    // Get all courses
    public function getAllCourses() {
        $sql = "SELECT * FROM courses";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "Error fetching courses: " . $this->conn->error;
            return [];
        }
    }

    // Close the database connection
    public function closeConn() {
        $this->conn->close();
    }
}
?>
