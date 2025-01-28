<?php
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: sign_in.php");
    exit();
}
include "../../model/student/db.php";
$student_id = $_SESSION['student_id']; // Fetch student ID from session
$db= new myDB();
$courses=$db->fetchEnrolledCoursesName($student_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Registration Form</title>
    <link rel="stylesheet" href="..\..\assets\css\student\quizzes.css">
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
        <div class="upcoming-quizzes">
            <h2>Upcoming Quizzes</h2>
        <div class="quiz">
        <div class="quiz-info">
                <?php foreach ($courses as $course): ?>
                    <div class="quiz">
                        <div class="course">
                            <p><strong><?php echo htmlspecialchars($course['title']); ?></strong></p>
                            <p><?php echo htmlspecialchars($course['description']); ?></p>
                        </div>
                        <div class="quiz-actions">
                            <a href="https://www.w3schools.com/quiztest/">
                                <button class="start-quiz">Start Quiz</button>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
           
        </div>
        <!-- <div class="completed-quizzes">
            <h2>Completed Quizzes</h2>
            <div class="quiz">
                <div class="quiz-info">
                    <p><strong>Mathematics</strong></p>
                    <p>Differential Calculus</p>
                </div>
                <div class="quiz-actions">
                    <p class="score">Score: <span class="score-value">90%</span></p>
                    <button class="review-quiz">Review</button>
                </div>
            </div>
            <div class="quiz">
                <div class="quiz-info">
                    <p><strong>Mathematics</strong></p>
                    <p>Integral Calculus</p>
                </div>
                <div class="quiz-actions">
                    <p class="score">Score: <span class="score-value">80%</span></p>
                    <button class="review-quiz">Review</button>
                </div>
            </div>
        </div> -->
    </div>
    </div>
</body>

</html>