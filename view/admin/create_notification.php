<?php session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Notification</title>
</head>

<body>
    <?php include 'navigation.php'; ?>
    <h2>Create Notification</h2>

    <form action="../../control/admin/create_notification_control.php" method="post">
        <table>
            <tr>
                <td>Message:</td>
                <td><input type="text" name="message" required></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td><input name="type"></td>
            </tr>
            <tr>
                <td>Instructor ID:</td>
                <td><input type="number" name="instructor_id" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Create Notification"></td>
            </tr>
        </table>
    </form>

    <a href="notifications.php">Back to Notifications</a>
</body>

</html>