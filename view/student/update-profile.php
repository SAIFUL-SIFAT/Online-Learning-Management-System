<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../sign_in.php");
    exit();
}
include('..\..\model\student\db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form</title>
    <link rel="stylesheet" href="..\..\assets\css\student\update_profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="hero">



        <nav>
            <h2>Student Portal</h2>
            <header>
                <input type="text" placeholder="Search courses, quizzes, or certificates...">
            </header>
            <ul>
                <li><a href="dashboard.php" class="active"><i class="fa fa-chart-pie"></i> Dashboard</a></li>
                <li><a href="course.php"><i class="fa fa-book"></i> Courses</a></li>
                <li><a href="quizzes.php"><i class="fa fa-pencil-alt"></i> Quizzes</a></li>
                <li><a href="grades.php"><i class="fa fa-graduation-cap"></i> Grades</a></li>
                <li><a href="certificates.php"><i class="fa fa-certificate"></i> Certificates</a></li>
                <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                <a href="../../control/student/logout_control.php" class="logout-btn">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </ul>
            <img src="image/image.png" class="user-pic">
            <span class="notification"></span>
        </nav>

        <form action="../../control/student/update_profile_control.php" method="POST">

            <fieldset>
                <legend>Update Profile</legend>
                <table>
                    <tr>
                        <td>ID:</td>
                        <td><input type="text" id="id" name="student_id" placeholder=<?php echo $_SESSION['student_id']; ?> readonly></td>
                    </tr>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type="text" id="fullName" name="full_name" placeholder="Full Name"></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" id="lastName" name="last_name" placeholder="Last Name"></td>
                    </tr>


                    <tr>
                        <td>Email Address:</td>
                        <td><input type="email" id="email" name="email" placeholder="example@example.xyz"></td>
                    </tr>


                    <tr>
                        <td>Password:</td>
                        <td><input type="password" id="password" name="password" placeholder="Password"></td>
                    </tr>


                    <tr>
                        <td>Confrom Password:</td>
                        <td><input type="password" id="confromPassword" name="confromPassword" placeholder="Confrom Password"></td>
                    </tr>


                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" id="phone" name="phone" placeholder="Phone Number"></td>
                    </tr>


                    <tr>
                        <td>Date of Birth:</td>
                        <td><input type="date" id="dob" name="dob"></td>
                    </tr>


                    <tr>
                        <td>Country/Region:</td>
                        <td>
                            <select id="country" name="country">
                                <option value="" selected disabled>Select Country/Region</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="India">India</option>
                                <option value="Australia">Australia</option>
                                <option value="BANGLADESH">Bangladesh</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Profile Picture (Optional):</td>
                        <td><input type="file" id="profilePicture" name="profile_picture"  ></td>
                    </tr>
                    <tr>
                        <td>Preferred Medium Language:</td>
                        <td>
                            <input type="checkbox" id="mediumEnglish" name="preferred_language" value="English">
                            <label for="mediumEnglish">English</label>

                            <input type="checkbox" id="mediumBangla" name="preferred_language" value="Bangla">
                            <label for="mediumBangla">Bangla</label>
                            <input type="checkbox" id="mediumspanish" name="preferred_language" value="spanish">
                            <label for="mediumspanish">spanish</label>

                            <input type="checkbox" id="mediumGerman" name="preferred_language" value="German">
                            <label for="mediumGerman">German</label>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <tr>
                    <td>
                        <input type="submit" value="update" class="submit">
                    </td>
                </tr>
            </fieldset>
        </form>
</body>
</html>