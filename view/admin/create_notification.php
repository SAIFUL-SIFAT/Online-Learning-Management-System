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
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-notifications.css'>
</head>

<body>
    <div class="container">
    <?php include 'header.php'; ?>
    <?php include 'navigation.php'; ?>
    <div>
    <h2>Create Notification</h2>

    <form action="../../control/admin/create_notification_control.php" method="post">
        <table id="create-notification-table">
            <tr>
                <td>Message:</td>
                <td><input type="text" name="message"></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td><input name="type"></td>
            </tr>
            <tr>
                <td><input class="link-button" id="create-notification" type="submit" value="Create Notification"></td>
            </tr>
        </table>
    </form>

    <a class="link-button" id="back-button" href="notifications.php">Back to Notifications</a>
    </div>
    </div>
</body>

</html>