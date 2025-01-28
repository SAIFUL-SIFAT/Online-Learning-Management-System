<?php session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>Notifications</title>
    <link rel='stylesheet' href='../../assets/css/admin/global.css'>
    <link rel='stylesheet' href='../../assets/css/admin/view-notifications.css'>
</head>
<body>
<div class="container">

<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
<div>

<h2>Manage Notifications</h2>
<a class="link-button" id="create-notification" href="create_notification.php"><img src="../../assets/uploads/admin/add.png">Create Notification</a>

<table>
    <tr>
        <th>ID</th>
        <th>Message</th>
        <th>Type</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    <?php
    include '../../control/admin/notification_control.php';
    $result = getAllNotifications();

    foreach ($result as $row) {
        echo "<tr>
            <td>" . htmlspecialchars($row['notification_id']) . "</td>
            <td>" . htmlspecialchars($row['message']) . "</td>
            <td>" . htmlspecialchars($row['type']) . "</td>
            <td>" . htmlspecialchars($row['created_at']) . "</td>
            <td>
                <a class='link-button' id='delete-notification' href='../../control/admin/delete_notification.php?id=" . urlencode($row['notification_id']) . "'><img src='../../assets/uploads/admin/delete-red.png'>Delete</a>
            </td>
          </tr>";
    }

    ?>


</table>
</div>
</div>

</body>
</html>

