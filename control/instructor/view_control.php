<?php
require '../model/db.php';

$db = new myDB();

$full_name = $_POST['full_name'] ?? null;
$pass = $_POST['pass'] ?? null;

if ($full_name && $pass) {
    $user = $db->getDataByCredentials($full_name, $pass);

    if ($user) {
        echo "<table border='1' >";
        echo "<tr><th>Field</th><th>Details</th></tr>";
        echo "<tr><td>Name</td><td>" . htmlspecialchars($user['full_name']) . "</td></tr>";
        echo "<tr><td>Email</td><td>" . htmlspecialchars($user['email']) . "</td></tr>";
        echo "<tr><td>Phone</td><td>" . htmlspecialchars($user['phone']) . "</td></tr>";
        echo "<tr><td>Qualifications</td><td>" . htmlspecialchars($user['qualifications']) . "</td></tr>";
        echo "<tr><td>Expertise</td><td>" . htmlspecialchars($user['expertise']) . "</td></tr>";
        echo "<tr><td>Profile Picture</td><td>" . ($user['profile_picture'] ?? 'No picture uploaded') . "</td></tr>";
        echo "<tr><td>Experience</td><td>" . htmlspecialchars($user['T_experience']) . " years</td></tr>";
        echo "<tr><td>Gender</td><td>" . htmlspecialchars($user['gender']) . "</td></tr>";
        echo "</table>";
    } else {
        echo "<p>Invalid credentials. No user found.</p>";
    }
} else {
    echo "<p>Please provide both your full name and password.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>

<body>
    <form action="../view/instructor/update.php" method="post">
        <!-- Hidden fields to pass user data to the update page -->
        <input type="hidden" name="id" value="<?= $user['id'] ?? '' ?>">
        <input type="hidden" name="full_name" value="<?= $user['full_name'] ?? '' ?>">
        <input type="hidden" name="email" value="<?= $user['email'] ?? '' ?>">
        <input type="hidden" name="phone" value="<?= $user['phone'] ?? '' ?>">
        <input type="hidden" name="qualifications" value="<?= $user['qualifications'] ?? '' ?>">
        <input type="hidden" name="expertise" value="<?= $user['expertise'] ?? '' ?>">
        <input type="hidden" name="T_experience" value="<?= $user['T_experience'] ?? '' ?>">
        <input type="hidden" name="gender" value="<?= $user['gender'] ?? '' ?>">

        <button type="submit">Update</button>
    </form>
</body>

</html>