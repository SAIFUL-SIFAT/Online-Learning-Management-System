<?php
session_start();

if (isset($_SESSION)) session_destroy();

header("location: ../view/admin/login.php");
exit();
