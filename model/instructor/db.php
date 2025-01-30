<?php
class MyDB {
    private $conn;

    // Open connection to the database
    public function openConn() {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "project";

        $this->conn = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);

        if ($this->conn->connect_error) {
            die("Error connecting to the database: " . $this->conn->connect_error);
        }
	return $this->conn;
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
    public function updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $teaching_experience, $institution) {
        $this->openConn();

        if ($this->conn === null) {
            die("Database connection is not initialized.");
        }
    
        $sql = "
            UPDATE instructor 
            SET full_name = ?, email = ?, phone = ?, pass = ?, qualifications = ?, profile_picture = ?, expertise = ?, teaching_experience = ?, institution = ? 
            WHERE full_name = ?";
        $stmt = $this->conn->prepare($sql);
    
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
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
            $teaching_experience, 
            $institution,
            $full_name
        );
    
        if (!$stmt->execute()) {
            die("Error: " . $stmt->error);
        } else {
            echo "Data updated successfully.";
        }
    
        $stmt->close();
    }
    

    // Add a course to the courses table
    public function addCourse($instructor_id, $title, $description) {
        $this->openConn();

        $sql = "INSERT INTO course (instructor_id, title, description) VALUES (?, ?, ?)";
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

    //Get all students
    public function getStudents(){
    $this->openConn();

    $sql = "SELECT student_id, full_name, last_name, email, phone, country, preferred_language FROM student";
    $result = $this->conn->query($sql);

    if ($result) {
        return $result; // Return the raw result object
    } else {
        echo "Error fetching students: " . $this->conn->error;
        return false;
    }
}


    // Get all courses
    public function getCoursesByInstructorId($instructor_id)
    {
        $this->openConn();
        $sql = "SELECT * FROM course WHERE instructor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $instructor_id);
        $stmt->execute();
        return $stmt->get_result();
    }
    //Total courses
    public function getTotalCourses($instructorId)
    {
        $sql = "SELECT COUNT(*) AS total_courses FROM course WHERE instructor_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $instructorId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total_courses'];
    }
    //Total students
    public function getTotalStudents()
    {
        $sql = "SELECT COUNT(*) AS total_students FROM student";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc()['total_students'];
    }

    public function close()
    {
        $this->conn->close();
    }
}

    // Close the database connection
    // public function closeConn() {
    //     $this->conn->close();
    // }

?>