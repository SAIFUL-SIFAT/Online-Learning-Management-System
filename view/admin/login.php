<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-login.css'>
</head>
<body>
    <form method="POST" action='../../control/admin/login_control.php'>
    <h1>Admin Login</h1>
    <table>
        
        <tr>
            <td>Username</td>
            <td><input type="text" name='username' id='username'></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name='password' id='password'></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Login">
            </td>
        </tr>
    </table>
        <div id='invalid-credentials'>Invalid credentials!</div>
        <div id="need-account-container">
            <span>Need an account?</span> <a id='need-account-link' href="signup.php">Signup</a>
        </div>
    </form>

<script src="../../assets/js/admin/login.js"></script>
</body>
</html>
