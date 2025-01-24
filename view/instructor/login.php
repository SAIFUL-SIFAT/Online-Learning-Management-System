<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Registration Page</title>
    <link rel="stylesheet" href="../../assets/css/instructor/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="../../control/instructor/login_control.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="full_name">Full Name:</label></td>
                    <td><input type="text" id="full_name" name="full_name" required></td>
                </tr>
                <tr>
                    <td><label for="pass">Password:</label></td>
                    <td><input type="password" id="pass" name="pass" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit" class="submit-btn">
                        <input type="reset" value="Reset" class="reset-btn">
                    </td>
                </tr>
            </table>
        </form>
        <p>Don't have an account? <a href="../instructor/signup.php">Sign up</a></p>
    </div>
</body>
</html>
