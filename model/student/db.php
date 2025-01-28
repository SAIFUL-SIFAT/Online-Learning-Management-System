<?php

class myDB
{

    function openCon()
    {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $dbname = "new_project";
        $conn = mysqli_connect($DBHost, $DBUser, $DBPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // echo 'Connection successful to database <br>';
        return $conn;
    }

    function insertData($full_name, $student_id, $password, $email, $preferred_language, $last_name, $phone, $dob, $country, $profile_picture)
    {
        $conn = $this->openCon();

        try {
            $stmt = $conn->prepare("INSERT INTO student (full_name,student_id, email, phone, last_name, password, preferred_language, dob, country,profile_picture) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("sissssssss", $full_name, $student_id, $email, $phone, $last_name, $password, $preferred_language, $dob, $country, $profile_picture);
            $stmt->execute();
            echo "Data inserted successfully<br>";
            $stmt->close();
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->closeConn($conn);
    }
    function updateData($student_id, $full_name, $last_name, $email, $phone, $preferred_language, $dob, $country, $profile_picture){
    $conn = $this->openCon();

    try {
        $stmt = $conn->prepare("UPDATE student 
                                SET full_name = ?, last_name = ?, email = ?, phone = ?, preferred_language = ?, dob = ?, country = ?, profile_picture = ? 
                                WHERE student_id = ?");
        $stmt->bind_param("ssssssssi", $full_name, $last_name, $email, $phone, $preferred_language, $dob, $country, $profile_picture, $student_id);
        
        if ($stmt->execute()) {
            echo "Data updated successfully<br>";
        } else {
            echo "Error updating data: " . $stmt->error;
        }

        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $this->closeConn($conn);
}

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


    function showAllData()
    {
        $conn = $this->openCon();

        $sql = "SELECT * FROM student"; // Adjust the table name as needed
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Last Name</th>
                        <th>Medium Language</th>
                        <th>Date of Birth</th>
                        <th>Country</th>
                        
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['fullName'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phone'] . "</td>
                        <td>" . $row['lastName'] . "</td>
                        <td>" . $row['mediumLanguage'] . "</td>
                        <td>" . $row['dob'] . "</td>
                        <td>" . $row['country'] . "</td>
                        
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        $this->closeConn($conn);
    }
    // function deleteData($id)
    // {
    //     $conn = $this->openCon();
    //     $id = mysqli_real_escape_string($conn, $id);

    //     try {
    //         $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    //         $stmt->bind_param("s", $id); // Use "i" if the ID is an integer
    //         $stmt->execute();

    //         if ($stmt->affected_rows > 0) {
    //             echo "Record with ID $id deleted successfully.<br>";
    //         } else {
    //             echo "No record found with ID $id.<br>";
    //         }

    //         $stmt->close();
    //     } catch (mysqli_sql_exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }

    //     $this->closeConn($conn);
    // }
    // function deleteCourse($course_id)
    // {
    //     $conn = $this->openCon();

    //     // Use prepared statement to avoid SQL injection
    //     try {
    //         // Update the `status` or `is_deleted` column instead of deleting the row
    //         $stmt = $conn->prepare("UPDATE course SET is_deleted = 1 WHERE course_id = ?");
    //         $stmt->bind_param("i", $course_id); // "i" for integer type
    //         $stmt->execute();

    //         // Check if rows were affected
    //         if ($stmt->affected_rows > 0) {
    //             $result = true; // Marked as deleted successfully
    //         } else {
    //             $result = false; // No rows found to update
    //         }

    //         $stmt->close();
    //     } catch (mysqli_sql_exception $e) {
    //         echo "Error: " . $e->getMessage();
    //         $result = false; // Indicate error
    //     }

    //     $this->closeConn($conn);
    //     return $result;
    // }
    function addCourseToEnrollment($course_id, $student_id)
{
    $conn = $this->openCon(); // Open database connection

    // Corrected SQL statement
    $stmt = $conn->prepare("INSERT INTO enrollment (course_id, student_id, enrollment_date) VALUES (?, ?, NOW())");
    
    if ($stmt === false) {
        die("Error in SQL statement: " . $conn->error);
    }

    // Bind parameters properly
    $stmt->bind_param("ii", $course_id, $student_id);
    
    // Execute the query
    if ($stmt->execute()) {
        echo "Enrollment successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close database connection
    $conn->close();
}


    function removeCourseFromEnrollment($course_id)
    {
        $conn = $this->openCon();
        $stmt = $conn->prepare("UPDATE courses SET status = 'available' WHERE course_id = ?");
        // $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $course_id);
        $stmt->execute();
        $stmt->close();
    }
    function fetchAvailableCourses()
    {
        $conn = $this->openCon(); // Open the database connection
        $result = $conn->query("SELECT * FROM courses WHERE status = 'available'"); // Perform the query

        if (!$result) {
            die("Query failed: " . $conn->error); // Add error handling for the query
        }

        $data = $result->fetch_all(MYSQLI_ASSOC); // Fetch data as an associative array
        $result->close(); // Close the result set
        $conn->close(); // Close the database connection
        return $data; // Return the fetched data
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


    function fetchEnrolledCourses($student_id){
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
