<?php session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form </title>
    <link rel="stylesheet" href="..\..\assets\css\student\profile.css">
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

        <div class="profile-container">
            <div class="profile-picture">
                <img src="<?php echo $_SESSION['profile_picture']; ?>" alt="Profile Picture">
            </div>
            <table class="profile-table">
                <tr>
                    <td class="label">Name:</td>
                    <td class="value"><?php echo $_SESSION['full_name']; ?></td>
                </tr>
                <tr>
                    <td class="label">Email:</td>
                    <td class="value"><?php echo $_SESSION['email']; ?></td>
                </tr>
                <tr>
                    <td class="label">Phone:</td>
                    <td class="value"><?php echo $_SESSION['phone']; ?></td>
                </tr>
                <tr>
                    <td class="label">DOB:</td>
                    <td class="value"><?php echo $_SESSION['dob']; ?></td>
                </tr>
                <tr>
                    <td class="label">Country:</td>
                    <td class="value"><?php echo $_SESSION['country']; ?></td>
                </tr>
                <tr>
                    <td class="label">Preferred Language:</td>
                    <td class="value"><?php echo $_SESSION['preferred_language']; ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>