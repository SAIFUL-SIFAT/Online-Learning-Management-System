<?php
session_start();


if (session_status() === PHP_SESSION_ACTIVE) {
    session_destroy();
}

header("Location: ../../view/moderator/signin.php");
exit();
?>
