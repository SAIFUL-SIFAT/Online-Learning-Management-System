
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Moderator Registration</title>
   <link rel="stylesheet"  href="../../assets/css/moderator/signup.css">
</head>
<body>

<h1>Moderator Registration</h1>

<form method="POST" action="../../control/moderator/reg_control.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="full_name">Full Name:</label></td>
            <td><input type="text" id="full_name" name="full_name"></td>
        </tr>
        <tr>
            <td><label for="email">Email Address:</label></td>
            <td><input type="email" id="email" name="email"></td>
        </tr>
        <tr>
            <td><label for="username">Username:</label></td>
            <td><input type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        <tr>
            <td><label for="confirm_password">Confirm Password:</label></td>
            <td><input type="password" id="confirm_password" name="confirm_password"></td>
        </tr>
        <tr>
            <td><label for="phone_number">Phone Number:</label></td>
            <td><input type="text" id="phone_number" name="phone_number"></td>
        </tr>
        <tr>
            <td><label for="department">Department/Team:</label></td>
            <td>
                <select id="department" name="department">
                    <option value="Support">Support</option>
                    <option value="Moderation">Moderation</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><label for="manager">Manager/Supervisor Name (if applicable):</label></td>
            <td><input type="text" id="manager" name="manager"></td>
        </tr>
        <tr>
            <td><label for="work_location">Work Location:</label></td>
            <td>
                <select id="work_location" name="work_location">
                    <option value="Office">Office</option>
                    <option value="Remote">Remote</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Register"></td>
        </tr>
    </table>
    <p>Already have an account? <a href="signin.php">Sign in</a></p>

</form>
<script type="text/javascript" src="../../assets/js/moderator/validation.js"></script>

</body>
</html>