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
                    <li><a href="dashboard.php"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                    <li><a href="courses.php"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                    <li><a href="grades.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Grades</a></li>
                    <li><a href="certificates.php"><span><img src="../../assets/uploads/certificate.svg" alt="Profile Picture"  width="20" height="15"></span>Certificates</a></li>
                    <li><a href="profile.php" class="active"><span><img src="../../assets/uploads/profile.svg" alt="Profile Picture"  width="18" height="12"></span>Profile</a></li>
                </ul>
            </nav>
            <form action="../../control/instructor/logout_control.php">
                <input type="submit" value="logout" class="logout">
            </form>
        </aside>


        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <input type="text" placeholder="Search..." class="search-bar">
                <div class="user-info">
                    <span>
                        <?php echo $_SESSION['full_name'] ?? '' ?>
                    </span>
                    <a href="mailto:">
                        <?php echo $_SESSION['email'] ?? ''?>
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
                        <h2><?php echo $_SESSION['full_name'] ?? '' ?></h2>
                        <p>Instructor</p>
                        <div class="details">
                            <div>
                             <span>Email:</span>
                              <p><?php echo $_SESSION['email'] ?? '' ?></p>
                            </div>
                            <div>
                             <span>Qualifications:</span>
                              <p><?php echo $_SESSION['qualifications'] ?? '' ?></p>
                            </div>
                            <div>
                             <span>Contact:</span>
                              <p><?php echo $_SESSION['phone'] ?? '' ?></p>
                            </div>
                            <div>
                             <span>Expertise:</span>
                              <p><?php echo $_SESSION['expertise'] ?? '' ?></p>
                            </div>
                            <div>
                             <span>Experience:</span>
                              <p><?php echo $_SESSION['T_experience'] ?? '' ?> Years</p>
                            </div>
                            <div>
                             <span>Sex:</span>
                              <p><?php echo $_SESSION['gender'] ?? '' ?></p>
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
