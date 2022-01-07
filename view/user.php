<?php
session_start();
require_once('../utilities/security.php');

Security::checkAuthority('user');

if(isset($_POST['logout'])) {
    Security::logout();
}

if(isset($_POST['userTickets'])) {
    header("Location: ../user_tickets.php");
}
if (isset($_POST['update'])){
        header('Location: ../add_update_user.php');
    }

?>

<html>
<head>
    <title>Group 4 Capstone</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h3><?php echo "<span style='color: lime;'>You're logged in as a User</span>" ?></h3>
    <h1>User Portal</h1>
    <form method="POST">
        <input type="submit" value="New Ticket" name="userTickets">
        <input type="submit" value="Logout" name="logout">
        <input type="submit" value="Update Account Information" name="update">
    </form>
</body>
</html>
