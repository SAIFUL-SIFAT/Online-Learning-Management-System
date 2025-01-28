
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../model/student/db.php';

$errors = array();

if (empty($_POST['full_name'])) {
    $errors[] = "Full Name is required.";
} else {
    $full_name = $_POST['full_name'];
    if (!preg_match("/^[a-zA-Z]+$/", $full_name)) {
        $errors[] = "Full Name must contain only alphabets.";
    }
    if (!preg_match("/[A-Z]/", $full_name)) {
        $errors[] = "Full Name must contain at least one uppercase letter.";
    }
}
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';

if (empty($last_name)) {
    echo "Last name cannot be empty.";
} elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
    echo "Last name must contain only alphabets.";
} elseif (!preg_match("/[A-Z]/", $last_name)) {
    echo "Last name must contain at least one uppercase letter.";
} 


if (empty($_POST['email'])) {
    $errors[] = "Email Address is required.";
} else {
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (strpos($email, "@") === false || strpos($email, ".xyz") === false) {
        $errors[] = "Email must contain '@' and end with '.xyz' domain.";
    }
}

if (empty($_POST['password'])) {
    $errors[] = "Password is required.";
} else {
    $password = $_POST['password'];
    if (!preg_match("/\d/", $password)) {
        $errors[] = "Password must contain at least one numeric character.";
    }
}
// Validate Student ID
if (empty($_POST['student_id'])) {
    $errors[] = "Student ID is required.";
} else {
    $student_id = $_POST['student_id'];
    // Check that the Student ID contains only numbers and is between 6 and 12 characters long
    if (!preg_match("/^[0-9]{1,2}$/", $student_id)) {
        $errors[] = "Student ID must be between 1 and 2 numeric characters.";
    }
}

if (empty($_POST['preferred_language'])) {
    $errors[] = "You must select at least one Preferred Medium Language.";
} else {
    $preferred_language = $_POST['preferred_language'];  
}
$confromPassword = isset($_POST['confromPassword']) ? $_POST['confromPassword'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$dob = isset($_POST['dob']) ? $_POST['dob'] : '';
$country = isset($_POST['country']) ? $_POST['country'] : '';


if (empty($confromPassword)) {
    echo "Confromm password cannot be empty.";
}
if (empty($phone)) {
    echo "Phone number cannot be empty.";
}
if (empty($dob)) {
    echo "Date of birth cannot be empty.";
}
if (empty($country)) {
    echo "Country cannot be empty.";
}


if (empty($errors)) {
    
    $userData = array(
        'student_id'=>$student_id,   //store student id 
        'full_name' => $full_name,
        'email' => $email,
        'password' => $password,
        'preferred_language' => $preferred_language,
        'last_name'=> $last_name,
        'confromPassword'=>$confromPassword,
        'phone'=>$phone,
        'dob'=>$dob,
        'country'=>$country
        
        
    );
    $db = new myDB();
    $db->insertData($full_name, $student_id, $password, $email, $preferred_language, $last_name, $phone, $dob, $country,$profile_picture);
    header('location:..\..\view\student\sign_in.php');

$filePath = '..\..\data\userdata.json';


    file_put_contents($filePath, json_encode($userData,JSON_PRETTY_PRINT));
    echo "Form submitted successfully and data saved!";
} else {
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
}

?>
