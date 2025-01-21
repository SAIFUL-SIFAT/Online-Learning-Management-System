<!-- signup.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Registration Page</title>
    
</head>
<body>
    <h2>Instructor Registration</h2>
    <form method="POST" action="../../control/view_control.php" enctype="multipart/form-data">
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
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
