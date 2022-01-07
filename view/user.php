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
/* This page will also populate a table that lists open and closed tickets that the user has, and 
it will give them the option to open the ticket if the help desk has responded. This is just the shell for the user page.
*/
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
