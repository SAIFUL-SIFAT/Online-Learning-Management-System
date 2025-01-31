
<!DOCTYPE html>
<html lang="en">

<head>

    <title>SIGN IN Page</title>
    <link rel="stylesheet" href="../../assets/css/student/sign_in.css">
</head>

<body>

    <h1>Sign in</h1>
    <form action="..\..\control\student\sign_in_control.php" method="POST">
        <fieldset>

            <legend>Sign In</legend>
            <table>

                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" id="username" name="full_name" placeholder="Enter your username" ></td>
                </tr>
                <tr>
                    <td>PASSWORD:</td>
                    <td><input type="password" id="password" name="password" placeholder="Enter your password" class="password"></td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Log In" class="login">
                    </td>
                </tr>
                
            </table>

        </fieldset>
    </form>
    <p>Don't have an account? <a href="..\..\view\student\sign_up.php">Sign Up</a></p>


</body>

</html>
