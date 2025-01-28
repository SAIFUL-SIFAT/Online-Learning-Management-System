<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form</title>
    <link rel="stylesheet" href="..\..\assets\css\student\grades.css">
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

        <div class="course-grades">
            <h2>Course Grades</h2>
            <table>
                <thead>
                    <tr>
                        <th>Course</th>
                        <th>Assignments</th>
                        <th>Quizzes</th>
                        <th>Overall</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Differential Calculus</td>
                        <td>88%</td>
                        <td>92%</td>
                        <td class="overall">90%</td>
                    </tr>
                    <tr>
                        <td>Integral Calculus</td>
                        <td>85%</td>
                        <td>88%</td>
                        <td class="overall">86%</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>