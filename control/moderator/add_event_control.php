<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include '../../model/moderator/db.php';
$db = new Db();

if(isset($_POST['title'], $_POST['description'], $_POST['moderator_id'], $_POST['event_date'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $moderator_id = $_POST['moderator_id'];
    $event_date = $_POST['event_date'];

    $result = $db->addEvent($title, $description, $moderator_id, $event_date);

    if($result) {
        header("Location: ../../view/moderator/events.php");
    } else {
        echo "Failed to add event";
    }
} else {
    echo "All fields are required.";
}
?>
