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
</head>
<body>
<div class="container">

<?php include 'navigation.php'; ?>
<div>

<h2>Manage Notifications</h2>
<a href="create_notification.php">Create Notification</a>

<table>
    <tr>
        <th>ID</th>
        <th>Instructor ID</th>
        <th>Message</th>
        <th>Type</th>
        <th>Created At</th>
    </tr>
    <?php
    include '../../control/admin/notification_control.php';
    $result = getAllNotifications();

    foreach ($result as $row) {
        echo "<tr>
            <td>" . htmlspecialchars($row['notification_id']) . "</td>
            <td>" . htmlspecialchars($row['instructor_id']) . "</td>
            <td>" . htmlspecialchars($row['message']) . "</td>
            <td>" . htmlspecialchars($row['type']) . "</td>
            <td>" . htmlspecialchars($row['created_at']) . "</td>
            <td>
                <a href='../../control/admin/delete_notification.php?id=" . urlencode($row['notification_id']) . "'>Delete</a>
            </td>
          </tr>";
    }

    ?>


</table>
</div>
</div>

</body>
</html>

