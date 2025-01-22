<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Registration Page</title>
    <link rel="stylesheet" href="../../assets/css/instructor/signup.css">
</head>
<body>
    <div class="registration-container">
        <h2>Instructor Login</h2>
        <form method="POST" action="../../control/instructor/reg_control.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="full_name">Full Name:</label></td>
                    <td><input type="text" id="full_name" name="full_name" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email Address:</label></td>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
                <tr>
                    <td><label for="pass">Password:</label></td>
                    <td><input type="password" id="pass" name="pass" required></td>
                </tr>
                <tr>
                    <td><label for="con_pass">Confirm Password:</label></td>
                    <td><input type="password" id="con_pass" name="con_pass" required></td>
                </tr>
                <tr>
                    <td><label for="phone">Phone Number:</label></td>
                    <td><input type="tel" id="phone" name="phone" required></td>
                </tr>
                <tr>
                    <td><label for="qualifications">Qualifications:</label></td>
                    <td><textarea id="qualifications" name="qualifications" required></textarea></td>
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
                    <td><label for="T_experience">Teaching Experience (Years):</label></td>
                    <td><input type="number" id="T_experience" name="T_experience" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <input type="radio" id="gender" name="gender" value="Male"> Male
                        <input type="radio" id="gender" name="gender" value="Female"> Female
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="btn-container">
                        <input type="submit" value="Submit" class="submit-btn">
                        <input type="reset" value="Reset" class="reset-btn">
                    </td>
                </tr>
            </table>
        </form>
        <p>Already have an account? <a href="../instructor/login.php">Sign up</a></p>
    </div>
</body>
</html>
