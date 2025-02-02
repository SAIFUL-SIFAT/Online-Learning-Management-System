<?php
    session_start();
    if(!isset($_SESSION['full_name']) ) {
        header("Location: signin.php");
    }
    include '../../model/moderator/db.php';
    $db = new Db();
       
$result = $db->getEvents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moderator Portal - Event Management</title>
    <link rel="stylesheet" href="../../assets/css/moderator/events.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Moderator Portal</h2>
            <nav>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="content_moderation.php">Content Moderation</a></li>
                    <li><a href="course_management.php">Course Management</a></li>
                    <li><a href="student_management.php">Student Management</a></li>
                    <li><a href="events.php" class="active">Events</a></li>
                </ul>
            </nav>
            <div class="sidebar-footer">
                <form action="../../control/moderator/logout_control.php" method="POST" >
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </div>

        <div class="main-content">
            <div class="header">
                
            </div>

            <div class="event-management">
                <h2>Event Management</h2>
                <div class="event-list">
                    <?php
                        while($event = $result->fetch_assoc()) {
                            ?>
                    <div class="event-card">
                        <h3>Event Title:<?php echo $event['title'] ?></h3>
                        <p>Description:<?php echo $event['description'] ?></p>
                        <p>Moderator ID:<?php echo $event['moderator_id'] ?></p>
                    </div>
                    <?php
                }
                ?>
                   
            </div>
            <a href="add_event.php">
            <button class="add-event">Add Events
            </button>
            </a>

        </div>

    </div>
</body>
</html>
