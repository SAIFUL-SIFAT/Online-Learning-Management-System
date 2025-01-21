<?php 
session_start();

if (!isset($_SESSION['full_name'])) {
    header("Location: ../../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Portal</title>
    <link rel="stylesheet" href="../../assets/css/instructor/profile.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Instructor Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="grades.php">Grades</a></li>
                    <li><a href="certificates.php">Certificates</a></li>
                    <li><a href="profile.php" class="active">Profile</a></li>
                </ul>
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
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


           
             <!-- Profile Content -->
              <h2>Profile</h2>
            <div class="profile-container">
                <div class="profile-content">
                    <div class="profile-info">
                        <img src="../../assets/image.png" alt="Profile Picture">
                        <div class="info">
                        <h2><?php if (isset($_SESSION['full_name'])) { echo $_SESSION['full_name']; } ?></h2>
                        <p>Instructor</p>
                        <div class="details">
                            <div>
                            <span>Email:</span>
                            <p><?php if (isset($_SESSION['email'])) { echo $_SESSION['email']; } ?></p>
                            </div>
                            <div>
                            <span>Qualifications:</span>
                            <p><?php if (isset($_SESSION['qualifications'])) { echo $_SESSION['qualifications']; } ?></p>
                            </div>
                            <div>
                            <span>Contact:</span>
                            <p>01758761248</p>
                            </div>
                            <div>
                            <span>Expertise:</span>
                            <p><?php if (isset($_SESSION['expertise'])) { echo $_SESSION['expertise']; } ?></p>
                            </div>
                            <div>
                            <span>Experience:</span>
                            <p><?php if (isset($_SESSION['T_experience'])) { echo $_SESSION['T_experience']; } ?> Years</p>
                            </div>
                            <div>
                            <span>Sex:</span>
                            <p><?php if (isset($_SESSION['gender'])) { echo $_SESSION['gender']; } ?></p>
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
                    <!-- <div class="academic-info">
                        <h3>Academic Information</h3>
                        <div class="info-item">
                        <span>Current CGPA:</span>
                        <p>3.65</p>
                        </div>
                        <div class="info-item">
                        <span>Credits Completed:</span>
                        <p>104</p>
                        </div>
                    </div> -->
                    <!-- <div class="contact-info">
                        <h3>Contact Information</h3>
                        <div class="info-item">
                        <span>Email:</span>
                        <p>sifat.sai3@gmail.com</p>
                        </div>
                        <div class="info-item">
                        <span>Phone:</span>
                        <p>01758761248</p>
                        </div>
                        <div class="info-item">
                        <span>Address:</span>
                        <p>Apartment:B-3, House:208, Area:Fokirapool, PostOffice:GPO, PostCode:1000, PoliceStation: Motijheel, District: Dhaka, Country:Bangladesh</p>
                        </div>
                    </div> -->
                    <div class="actions">
                        <button class="edit-profile">Edit Profile</button>
                        <button class="change-password">Change Password</button>
                    </div>
                    </div>

            
        </main>
    </div>
</body>
</html>
