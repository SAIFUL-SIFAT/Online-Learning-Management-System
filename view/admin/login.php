<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    <link rel='stylesheet' href='../../assets/css/admin/view-login.css'>
</head>
<body>
    <form method="POST" action='../../control/admin/login_control.php'>
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
            <td>
                <input type="submit" value="Login">
            </td>
        </tr>
    </table>
    </form>    
</body>
</html>
