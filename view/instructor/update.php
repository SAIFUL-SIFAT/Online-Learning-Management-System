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
    <title>Update Page</title>
    <link rel="stylesheet" href="../../assets/css/instructor/update.css">

</head>

<body>
            <div class="sidebar">
                        <h2>Instructor Portal</h2>
                        <nav>
                            <ul>
                                <li><a href="dashboard.php"><span><img src="../../assets/uploads/dashboard.svg" alt="Profile Picture"  width="18" height="12"></span>Dashboard</a></li>
                                <li><a href="courses.php"><span><img src="../../assets/uploads/course.svg" alt="Profile Picture"  width="18" height="12"></span>Courses</a></li>
                                <li><a href="Student_management.php"><span><img src="../../assets/uploads/grade.svg" alt="Profile Picture"  width="15" height="14"></span>Student Management</a></li>
                                <li><a href="certificates.php"><span><img src="../../assets/uploads/certificate.svg" alt="Profile Picture"  width="20" height="15"></span>Certificates</a></li>
                                <li><a href="profile.php"  class="active"><span><img src="../../assets/uploads/profile.svg" alt="Profile Picture"  width="18" height="12"></span>Profile</a></li> 
                            </ul>
                        </nav>
                        <form action="../../control/instructor/logout_control.php">
                            <input type="submit" value="logout" class="logout">
                        </form>
                    </div>

                    <!-- Main Content -->
                    <div class="main-content">
                        <!-- Header -->
                        <div class="header">
                        <h2>Welcome to Update Profile Page</h2>
                        <div class="user-info">
                                <span>
                                    <?php echo $_SESSION['full_name'] ?? '' ?>
                                </span>
                                <a href="mailto:">
                                    <?php echo $_SESSION['email'] ?? ''?>
                                </a>
                            </div>
            </div>
        <div class="update-container">
            <h2>Update data</h2>
            <form method="POST" action="../../control/instructor/update_control.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="full_name">Full Name:</label></td>
                        <td><input type="text" id="full_name" name="full_name" placeholder="<?php echo $_SESSION['full_name'] ?? ''?>"required></td>
                    </tr>

                    <tr>
                        <td><label for="Email">Email Address:</label></td>
                        <td><input type="text" id="email" name="email" placeholder="<?php echo $_SESSION['email'] ?? ''?>" required></td>
                    </tr>

                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" id="pass" name="pass" required></td>
                    </tr>

                    <tr>
                        <td><label for="confirm_pass">Confirm Password:</label></td>
                        <td><input type="password" id="con_pass" required></td>
                    </tr>

                    <tr>
                        <td><label for="phone">Phone Number:</label></td>
                        <td><input type="tel" id="phone" name="phone" placeholder="<?php echo $_SESSION['phone'] ?? ''?>"required></td>
                    </tr>

                    <tr>
                        <td><label for="qualifications">Qualifications:</label></td>
                        <td><textarea id="qualifications" name="qualifications" placeholder="<?php echo $_SESSION['qualifications'] ?? ''?>"required></textarea></td>
                    </tr>

                    <tr>
                        <td><label for="expertise">Area of Expertise:</label></td>
                        <td>
                            <select id="expertise" name="expertise" required>
                                <option value="Math">Mathematics</option>
                                <option value="Science">Science</option>
                                <option value="Programming">Programming</option>
                                <option value="Literature">Literature</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="profile_picture">Profile Picture:</label></td>
                        <td><input type="file" id="profile_picture" name="profile_picture" accept="image/*"></td>
                    </tr>

                    <tr>
                        <td><label for=" experience">Teaching experience(Years):</label></td>
                        <td><input type="number" id="T_experience" name="teaching_experience" placeholder="<?php echo $_SESSION['teaching_experience'] ?? ''?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="institution">Institution:</label></td>
                        <td><input type="text" id="institution" name="institution" placeholder="<?php echo $_SESSION['institution'] ?? ''?>" required></td>
                    </tr>
                    <!-- <tr>
                        <td><label for="gender">Gender:</label></td>
                        <td><input type="radio" id="gender" name="gender" value="Male">Male</td>
                        <td><input type="radio" id="gender" name="gender" value="Female">Female</td>

                    </tr> -->


                    <tr>
                    <td colspan="2" class="btn-container">
                        <input type="submit" value="Submit" class="submit-btn">
                        <input type="reset" value="Reset" class="reset-btn">
                    </td>
                </tr>

                </table>

            </form>
        </div>
</body>

</html>