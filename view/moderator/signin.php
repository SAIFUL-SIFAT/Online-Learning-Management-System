
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Moderator Registration</title>
   <link rel="stylesheet"  href="../../assets/css/moderator/signin.css">

</head>
<body>

<h1>Moderator Registration</h1>

<form method="POST" action="../../control/moderator/signin_control.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td><label for="full_name">Full Name:</label></td>
            <td><input type="text" id="full_name" name="full_name"></td>
        </tr>
        <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" id="password" name="password"></td>
        </tr>
        
        <tr>
            <td><input type="submit" value="Sign In"></td>
        </tr>
    </table>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>

</form>
</body>
</html>