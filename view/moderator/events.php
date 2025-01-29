<?php
    session_start();
    if(!isset($_SESSION['full_name']) ) {
        header("Location: signin.php");
    }
    include '../../model/moderator/db.php';
    $db = new Db();
       // $conn = $db->open();
       
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
        <!-- Sidebar -->
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
                <form action="../../control/logout_control.php" method="POST" >
                    <button class="logout" type="submit">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                
            </div>

            <!-- Event Management -->
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
                        <!-- <button class="view-details">View Details</button> -->
                    </div>
                    <?php
                }
                ?>
                    <!-- <div class="event-card">
                        <h3>Data Science Seminar</h3>
                        <p>Date: 2024-04-20</p>
                        <p>Capacity: 100 seats</p>
                        <button class="view-details">View Details</button>
                    </div>
                    <div class="event-card">
                        <h3>Tech Career Fair</h3>
                        <p>Date: 2024-05-01</p>
                        <p>Capacity: 200 seats</p>
                        <button class="view-details">View Details</button>
                    </div>
                </div> -->
            </div>
            <a href="add_event.php">
            <button class="add-event">Add Events
            </button>
            </a>

        </div>

    </div>
</body>
</html>
