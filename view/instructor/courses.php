<?php 
include '../../control/instructor/course_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/courses.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"class="active"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="grades.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Grades</a></li>
                    <li><a href="certificates.php"><span><img src="../../assets/uploads/certificate.svg" alt="Profile Picture"  width="20" height="15"></span>Certificates</a></li>
                    <li><a href="profile.php"><span><img src="../../assets/uploads/profile.svg" alt="Profile Picture"  width="18" height="12"></span>Profile</a></li>
                </ul>
            </nav>
            <form action="../../control/instructor/logout_control.php">
                <input type="submit" value="logout" class="logout">
            </form>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
        <header class="header">
            <input type="text" placeholder="Search..." class="search-bar">
            <div class="user-info">
                <span>
                    <?php
                    session_start();
                    if (isset($_SESSION['full_name'])) {
                        echo htmlspecialchars($_SESSION['full_name']);
                    } else {
                        echo 'Guest';
                    }
                    ?>
                </span>
                <a href="mailto:
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo htmlspecialchars($_SESSION['email']);
                    } else {
                        echo 'instructor@example.com';
                    }
                    ?>">
                    <?php
                    if (isset($_SESSION['email'])) {
                        echo htmlspecialchars($_SESSION['email']);
                    } else {
                        echo 'instructor@example.com';
                    }
                    ?>
                </a>
            </div>
        </header>


            <!-- Dashboard Content -->
            <section class="courses">
                <h2>Courses</h2>
                <!-- <div class="course">
                    <h3>Web Development Fundamentals</h3>
                    <p>Learn the basics of web development</p>
                    
                    <span>25 students</span>
                </div>
                <div class="course">
                    <h3>Advanced React Patterns</h3>
                    <p>Master advanced React concepts</p>
                    
                    <span>18 students</span>
                </div> -->
                <div class="course">
                    <a href="https://www.youtube.com/embed/gBi8Obib0tw" target="_blank" class="course-link">
                        <h3>Web Development Fundamentals</h3>
                    </a>
                    <p>Learn the basics of web development</p>
                    <span>25 students</span>
                </div>

                <div class="course">
                    <a href="https://www.youtube.com/embed/YaZg8wg39QQ" target="_blank" class="course-link">
                        <h3>Advanced React Patterns</h3>
                    </a>
                    <p>Master advanced React concepts</p>
                    <span>18 students</span>
                </div>




                <button class="add-course">+ Add Course</button>


                <div class="course-modal hidden">
                    <h3>Create New Course</h3>
                    <form>
                    <label for="course-title">Course Title:</label>
                    <input type="text" id="course-title" name="course-title" required>

                    <label for="course-description">Description:</label>
                    <textarea id="course-description" name="course-description" required></textarea>

                    <button type="submit">Create Course</button>
                    <button type="button" class="close-modal">Cancel</button>
                    </form>
                </div>
               
            </section>
        </main>
    </div>
    <!-- <script type="javascript" src="../../js/myjs.js"></script> -->
    </body>
</html>
