<?php
$currentFile = basename($_SERVER['PHP_SELF']);
$pagename = pathinfo($currentFile, PATHINFO_FILENAME);
?>

<nav>
    <ul>
        <li><a href="profile.php" <?php if ($pagename === 'profile') echo 'class="nav-ul-li-a-selected"'; ?>><img src="../../assets/uploads/admin/admin.png">Profile</a></li>
        <li><a href="courses.php"  <?php if ($pagename === 'courses') echo 'class="nav-ul-li-a-selected"'; ?>><img src="../../assets/uploads/admin/courses.png">Manage Courses</a></li>
        <li><a href="instructors.php"  <?php if ($pagename === 'instructors') echo 'class="nav-ul-li-a-selected"'; ?>><img src="../../assets/uploads/admin/instructors.png">Approve Instructors</a></li>
        <li><a href="notifications.php"  <?php if ($pagename === 'notifications') echo 'class="nav-ul-li-a-selected"'; ?>><img src="../../assets/uploads/admin/notification1.png">Manage Notifications</a></li>
        <li><a href="users.php"  <?php if ($pagename === 'users') echo 'class="nav-ul-li-a-selected"'; ?>><img src="../../assets/uploads/admin/users.png">Manage Users</a></li>
        <li>
            <form action="../../control/admin/logout_control.php">
                <input type="submit" value="logout">
            </form>
        </li>
    </ul>
</nav>