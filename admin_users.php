<?php
session_start();
require_once('./controller/user_controller.php');
require_once('./controller/user.php');
require_once('./utilities/security.php');

Security::checkAuthority('admin');


if(isset($_POST['logout'])) {
    unset($_SESSION);
    unset($_POST);
    $_SESSION['logout_msg'] = 'Successfully logged out.';
    header('Location: index.php');
    exit();
}

if(isset($_POST['home'])) {
    header("Location: view/admin.php");
}

if(isset($_POST['add'])) {
    header("Location: add_update_user.php");
}

if (isset($_POST['update'])){
    if(isset($_POST['userUpdate'])){
        header('Location: ./add_update_user.php?userNo=' . $_POST['userUpdate']);
    }
    unset($_POST['update']);
    unset($_POST['userUpdate']);
}

if (isset($_POST['delete'])){
    if(isset($_POST['userDelete'])){
        UserController::deleteUser($_POST['userDelete']);
    }
    unset($_POST['delete']);
    unset($_POST['userDelete']);
}

?>

<html>
<head>
    <title>
        Group 4 Capstone
    </title>
    <link rel="stylesheet" href="view/styles.css" />
<body>
    <h1>User Accounts</h1>
    <table>
        <tr>
            <th>User No</th>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>User Level</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    <?php foreach(UserController::getAllUsers() as $user) : ?>
        <tr>
            <td><?php echo $user->getUserNo(); ?></td>
            <td><?php echo $user->getUserId(); ?></td>
            <td><?php echo $user->getFirstName(); ?></td>
            <td><?php echo $user->getLastName(); ?></td>
            <td><?php echo $user->getEMail(); ?></td>
            <td><?php echo $user->getUserLevel(); ?></td>
            <td><form method="POST">
                <input type="hidden" name="userUpdate"
                    value="<?php echo $user->getUserNo(); ?>" />
                <input type="submit" value="Update" name="update" />
            </form></td>
            <td><form method="POST">
                <input type="hidden" name="userDelete"
                    value="<?php echo $user->getUserNo(); ?>" />
                <input type="submit" value="Delete" name="delete" />
            </form></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <br>
    <form method="POST">
        <input type="submit" value="Add User" name="add">
        <input type="submit" value="Home" name="home">
        <input type="submit" value="Logout" name="logout">
    </form>
</body>
</head>
</html>
