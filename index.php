<?php
session_start();
require_once('./controller/user_controller.php');
require_once('./utilities/security.php');


Security::checkHTTPS();

$login_msg = isset($_SESSION['logout_msg']) ?
  $_SESSION['logout_msg'] : '';

if(isset($_POST['email']) & isset($_POST['pw'])){
    $user_level = UserController::validUser(
        $_POST['email'], $_POST['pw']);
    if($user_level === '1') {
        $_SESSION['admin'] = true;
        $_SESSION['user'] = false;
        header('Location: view/admin.php');
    }
    else if($user_level === '2') {
        $_SESSION['admin'] = false;
        $_SESSION['user'] = true;
        header('Location: view/user.php');
    }
    else {
        $login_msg = 'Failed Authentication - Try Again.';
    }
}
?>

<html>
<head>
    <title>Group 4 Capstone</title>
    <link rel="stylesheet" href="view/styles.css" />
</head>

<body>
<div class='headers'>
    <h2>Help Desk Portal - Home Page</h2>
    <h3><?php echo "<span style='color: crimson;'>{$login_msg}</span>" ?></h3>
</div>
    <form method="POST" >
        <input id="email" type="text" name="email" placeholder="Login(e-mail)">
        <input id="pw" type="password" name="pw" placeholder="Password">
        <input id="login" type="submit" value="Login" name="login">
    </form>
</body>
</html>