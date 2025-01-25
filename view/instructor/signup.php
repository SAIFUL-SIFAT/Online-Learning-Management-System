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
        <h2>Instructor signup</h2>
        <form method="POST" action="../../control/instructor/reg_control.php" enctype="multipart/form-data" id="registrationForm">
    <table>
        <tr>
            <td><label for="full_name">Full Name:</label></td>
            <td>
                <input type="text" id="full_name" name="full_name" required>
                <div id="full_name_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="email">Email Address:</label></td>
            <td>
                <input type="email" id="email" name="email" required>
                <div id="email_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="pass">Password:</label></td>
            <td>
                <input type="password" id="pass" name="pass" required>
                <div id="pass_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="con_pass">Confirm Password:</label></td>
            <td>
                <input type="password" id="con_pass" name="con_pass" required>
                <div id="con_pass_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="phone">Phone Number:</label></td>
            <td>
                <input type="tel" id="phone" name="phone" required>
                <div id="phone_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="qualifications">Qualifications:</label></td>
            <td>
                <textarea id="qualifications" name="qualifications" required></textarea>
                <div id="qualifications_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="expertise">Area of Expertise:</label></td>
            <td>
                <select id="expertise" name="expertise" required>
                    <option value="">Select...</option>
                    <option value="Math">Mathematics</option>
                    <option value="Science">Science</option>
                    <option value="Programming">Programming</option>
                    <option value="Literature">Literature</option>
                </select>
                <div id="expertise_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="profile_picture">Profile Picture:</label></td>
            <td>
                <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                <div id="profile_picture_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="T_experience">Teaching Experience (Years):</label></td>
            <td>
                <input type="number" id="T_experience" name="teaching_experience" required>
                <div id="T_experience_error" class="error"></div>
            </td>
        </tr>
        <tr>
            <td><label for="institution">Institution:</label></td>
            <td>
                <input type="text" id="institution" name="institution" required>
                <div id="institution_error" class="error"></div>
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
    <script type="text/javascript" src="../../assets/js/instructor/myjs.js"></script>
    </body>
</html>
