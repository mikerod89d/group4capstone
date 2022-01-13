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
if(isset($_POST['users'])) {
    header("Location: ../admin_users.php");
}

if(isset($_POST['search'])) {
    $eMail = $_POST['eMail'];
    header("Location: ../user_search.php");
}


?>

<html>
<head>
    <title>Group 4 Capstone</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <h3><?php echo "<span style='color: lime;'>You're logged in as an Administrator</span>" ?></h3>
    <h1>Administrator Portal</h1>
    <form method="POST">
        <input type="submit" value="Find User" name="search">
        <input type="text" name="eMail" placeholder="User Email Address">
    </form>
    <br><br>
    <form method="POST">
        <input type="submit" value="Manage Users" name="users">
        <input type="submit" value="Manage Tickets" name="tickets">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</html>
