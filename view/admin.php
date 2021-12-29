<?php
session_start();
require_once('../utilities/security.php');

Security::checkAuthority('admin');

if(isset($_POST['logout'])) {
    Security::logout();
}

if(isset($_POST['tickets'])) {
    header("Location: ../admin_tickets.php");
}
/*
This page is for the "help desk" to view tickets and respond to user tickets. The page will be auto populated 
with a table pulled from the database.
*/
?>

<html>
<head>
    <title>Group 4 Capstone</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h3><?php echo "<span style='color: lime;'>You're logged in as an Administrator</span>" ?></h3>
    <h1>Administrator Options</h1>
    <form method="POST">
        <input type="submit" value="Manage Tickets" name="tickets">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>
