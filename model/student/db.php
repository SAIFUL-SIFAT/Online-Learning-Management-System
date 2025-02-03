<?php

class myDB
{    //Database Connection 
    function openCon()
    {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $dbname = "project";
        $conn = mysqli_connect($DBHost, $DBUser, $DBPassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    //Data Insertion
    function insertData($full_name, $student_id, $password, $email, $preferred_language, $last_name, $phone, $dob, $country, $profile_picture)
    {
        $conn = $this->openCon();
        try {
            $stmt = $conn->prepare("INSERT INTO student (full_name,student_id,password, email, phone, preferred_language,last_name, dob, country,profile_picture) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("sissssssss", $full_name, $student_id,$password, $email, $phone, $preferred_language, $last_name,$dob, $country, $profile_picture);
            $stmt->execute();
            echo "Data inserted successfully<br>";
            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->closeConn($conn);
    }

    // Data Update
    function updateData($full_name, $student_id, $password, $email, $preferred_language, $last_name, $phone, $dob, $country, $profile_picture)
    {
        $conn = $this->openCon();
        try {
            $stmt = $conn->prepare("UPDATE student 
                                SET full_name = ?,student_id = ?,password = ?, email = ?, phone = ?, preferred_language = ?, last_name = ?,dob = ?, country = ?, profile_picture = ? 
                                WHERE student_id = ?");
           $stmt->bind_param("sissssssssi", $full_name, $student_id,$password, $email, $phone, $preferred_language, $last_name,$dob, $country, $profile_picture,$student_id);
            if ($stmt->execute()) 
                echo "Data updated successfully<br>";
            
            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
        $this->closeConn($conn);
    }
    //Data Retrieval -sign_in
    function getData($full_name, $password)
    {
        $conn = $this->openCon();
        $sql = "SELECT * FROM student WHERE full_name = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: " . $conn->error;
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
          //course-sh
    function fetchAllCourses()
    {
        $conn = $this->openCon();

        $sql = "SELECT course_id, instructor_id, title, description FROM course"; // Adjust table name if needed
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            echo "Prepare failed: " . $conn->error;
            return [];
        }

        $stmt->execute();
        $result = $stmt->get_result();

        $courses = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }
        $stmt->close();
        return $courses;
    }



    function addCourseToEnrollment($course_id, $student_id)
    {
        $conn = $this->openCon();
        // Check if the student is already enrolled in the course
        $stmt = $conn->prepare("SELECT * FROM enrollment WHERE course_id = ? AND student_id = ?");
        if (!$stmt) {
            $this->closeConn($conn);
            return false;
        }
        $stmt->bind_param("ii", $course_id, $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Student is already enrolled in the course
            $stmt->close();
            $this->closeConn($conn);
            return false;
        }

        // Prepare the SQL statement to insert the new enrollment
        $stmt = $conn->prepare("INSERT INTO enrollment (course_id, student_id, enrollment_date) VALUES (?, ?, NOW())");
        if (!$stmt) {
            $this->closeConn($conn);
            return false;
        }
        // Bind parameters properly
        if (!$stmt->bind_param("ii", $course_id, $student_id)) {
            $stmt->close();
            $this->closeConn($conn);
            return false;
        }

        // Execute the query
        if ($stmt->execute()) {
            // Enrollment successful
            $stmt->close();
            $this->closeConn($conn);
            return true;
        } else {
            // Error occurred during execution
            $stmt->close();
            $this->closeConn($conn);
            return false;
        }
    }



    function removeCourseFromEnrollment($course_id, $student_id)
    {
        $conn = $this->openCon();

        // Use prepared statement to avoid SQL injection
        $stmt = $conn->prepare("DELETE FROM enrollment WHERE course_id = ? AND student_id = ?");

        if (!$stmt) {
            // Check if the statement preparation was successful
            $error_message = "Error in SQL statement preparation: " . $conn->error;
            $this->closeConn($conn);
            return false;
        }

        // Bind parameters
        if (!$stmt->bind_param("ii", $course_id, $student_id)) {
            // Check if the parameter binding was successful
            $error_message = "Error in parameter binding: " . $stmt->error;
            $stmt->close();
            $this->closeConn($conn);
            return false;
        }

        // Execute the query
        if ($stmt->execute()) {
            // Course dropped successfully
            $stmt->close();
            $this->closeConn($conn);
            return true;
        } else {
            // Error occurred during execution
            $error_message = "Error: " . $stmt->error;
            $stmt->close();
            $this->closeConn($conn);
            return false;
        }
    }


    function fetchEnrolledCoursesName($student_id)
    {
        $conn = $this->openCon(); // Open database connection

        // SQL query to join courses and enrollment tables
        $stmt = $conn->prepare("
        SELECT course.title, course.description
        FROM course
        JOIN enrollment ON course.course_id = enrollment.course_id
        WHERE enrollment.student_id = ?
    ");

        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }

        // Bind the student ID
        $stmt->bind_param("i", $student_id);

        // Execute the query
        if (!$stmt->execute()) {
            die("Error executing query: " . $stmt->error);
        }

        // Get results
        $result = $stmt->get_result();

        // Fetch data as an associative array
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Close statement and connection
        $stmt->close();
        $conn->close();

        return $data; // Return enrolled course titles & descriptions
    }


    function fetchEnrolledCourses($student_id)
    {
        $conn = $this->openCon(); // Open database connection
        $stmt = $conn->prepare("SELECT * FROM enrollment WHERE student_id = ?");

        if (!$stmt) {
            die("Error preparing statement: " . $conn->error);
        }
        $stmt->bind_param("i", $student_id);

        if (!$stmt->execute()) {
            die("Error executing query: " . $stmt->error);
        }
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $conn->close();
        return $data; // Return the fetched data
    }
    function closeConn($conn)
    {
        mysqli_close($conn);
    }
}
