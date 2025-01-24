<?php
class myDB {
    function openConn() {
        $DBHost = "localhost";
        $DBUser = "root";
        $DBPassword = "";
        $DBName = "project";

        $conn = mysqli_connect($DBHost, $DBUser, $DBPassword, $DBName);

        if (!$conn) {
            die("Error connecting to the database: " . mysqli_connect_error());
        }

        return $conn;
    }

    function createTableIfNotExists($conn) {
        $createTableQuery = "CREATE TABLE IF NOT EXISTS instructor (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(40) NOT NULL,
            email VARCHAR(50) NOT NULL,
            phone VARCHAR(15) NOT NULL,
            pass VARCHAR(255) NOT NULL,
            qualifications TEXT NOT NULL,
            expertise VARCHAR(50) NOT NULL,
            T_experience INT NOT NULL,
            gender ENUM('Male', 'Female') NOT NULL
        )";

        if (!mysqli_query($conn, $createTableQuery)) {
            die("Error creating table: " . mysqli_error($conn));
        }
    }

    function insertData($full_name, $email, $phone, $pass, $qualifications, $expertise, $T_experience, $gender) {
        $conn = $this->openConn();
        $this->createTableIfNotExists($conn);

        $insertQuery = "INSERT INTO instructor (full_name, email, phone, pass, qualifications, expertise, T_experience, gender) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $insertQuery);
        if (!$stmt) {
            die("SQL Prepare Error: (" . mysqli_errno($conn) . ") " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param(
            $stmt,
            "ssssssis", 
            $full_name,
            $email,
            $phone,
            $pass,
            $qualifications,
            $expertise,
            $T_experience,
            $gender
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Data inserted successfully.<br>";
        } else {
            echo "Error inserting data: (" . mysqli_stmt_errno($stmt) . ") " . mysqli_stmt_error($stmt) . "<br>";
        }

        mysqli_stmt_close($stmt);
        $this->closeConn($conn);
    }

    function getDataByCredentials($full_name, $pass) {
        $conn = $this->openConn();
        $sql = "SELECT * FROM instructor WHERE full_name = ?";

        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            echo "Prepare failed: (" . mysqli_errno($conn) . ") " . mysqli_error($conn);
            return null;
        }

        mysqli_stmt_bind_param($stmt, "s", $full_name);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
        $this->closeConn($conn);

        if ($user && $pass == $user['pass']) {
            return $user;
        } else {
            return null;
        }
    }

    // courses database
    function addCourse($instructor_id, $title, $description) {
        $conn = $this->openConn();
        $sql = "INSERT INTO courses(instructor_id, title, description) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $instructor_id, $title, $description); // Bind instructor_id as an integer
        $stmt->execute();
        $stmt->close();
    }
    
    // Function to get all courses
    function getAllCourses() {
        $conn = $this->openConn();
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    
    

    function updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture,$expertise, $T_experience, $gender)
    {
        $conn = $this->openConn();
        $sql = "UPDATE instructor 
                SET full_name = ?, email = ?, phone = ?, pass = ?, qualifications = ?, expertise = ?, T_experience = ?, profile_picture = ?, gender = ? 
                WHERE full_name = ? ";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            return;
        }

        $stmt->bind_param("ssssssisss", $full_name, $email, $phone, $pass, $qualifications, $expertise, $T_experience,$profile_picture, $gender, $full_name, );

        if ($stmt->execute()) {
            echo "Data updated successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $this->closeConn();
    }

    function createCourse($conn, $instructor_id, $title, $description) {
        $sql = "INSERT INTO course (instructor_id, title, description) VALUES (?, ?, ?)";
    
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param(
                "iss",
                $instructor_id,
                $title,
                $description
            );
    
            if ($stmt->execute()) {
                
                return true;
            } else {
                echo $stmt->error;
                return false;
            }
    
            $stmt->close();
        } else {
            echo $conn->error;
            return false;
        }
    }
    


    function closeConn($conn) {
        mysqli_close($conn);
    }
}
// function updateData($full_name, $email, $phone, $pass, $qualifications, $profile_picture, $expertise, $T_experience, $gender) {
    //     $conn = $this->openConn();
    
    //     $updateQuery = "UPDATE instructor 
    //                     SET full_name = ?, 
    //                         email = ?, 
    //                         phone = ?, 
    //                         pass = ?, 
    //                         qualifications = ?, 
    //                         profile_picture = ?, 
    //                         expertise = ?, 
    //                         T_experience = ?, 
    //                         gender = ? 
    //                     WHERE full_name = ?"; 
    //     $stmt = $conn->prepare($updateQuery);
    //     if (!$stmt) {
    //         die("SQL Prepare Error: (" . $conn->errno . ") " . $conn->error);
    //     }
    
    //     $stmt->bind_param(
    //         "ssssssssss", 
    //         $full_name,
    //         $email,
    //         $phone,
    //         $pass,
    //         $qualifications,
    //         $profile_picture,
    //         $expertise,
    //         $T_experience,
    //         $gender,
    //         $full_name
    //     );
    
    //     if ($stmt->execute()) {
    //         echo "Data updated successfully.<br>";
    //     } else {
    //         echo "Error updating data: (" . $stmt->errno . ") " . $stmt->error . "<br>";
    //     }
    
    //     $stmt->close();
    //     $this->closeConn($conn);
    // }


    //----------------------------------------------------------------------------------------------------------------
    // function fetchAllInstructors() {
    //     $conn = $this->openConn();

    //     $selectQuery = "SELECT * FROM instructor";
    //     $result = mysqli_query($conn, $selectQuery);

    //     if (!$result) {
    //         echo "Error fetching data: " . mysqli_error($conn) . "<br>";
    //         return;
    //     }

    //     if (mysqli_num_rows($result) > 0) {
    //         $counter = 1;
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             echo $counter . ". Name: " . $row["full_name"] . " | Email: " . $row["email"] . "<br>";
    //             $counter++;
    //         }
    //     } else {
    //         echo "No records found.<br>";
    //     }

    //     mysqli_free_result($result);
    //     $this->closeConn($conn);
    // }
?>
