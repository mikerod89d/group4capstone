<?php
    require_once('./controller/user.php');
    require_once('./controller/user_controller.php');
    require_once('./controller/level.php');
    require_once('./controller/level_controller.php');


    $user = new User('', '', '', '', '', '');
    $user->setUserNo(-1);
    $msg='';

    if (isset($_GET['userNo'])) {
        $user =
            UserController::getUserByNo($_GET['userNo']);
        $pageTitle = "Update an Existing User";
    }

    if (isset($_POST['save'])) {
        $user = new User(
            $_POST['userId'], 
            $_POST['password'],
            $_POST['fName'], 
            $_POST['lName'], 
            $_POST['email'], 
            $_POST['level']);
        $user->setUserNo($_POST['userNo']);
        
        if ($user->getUserNo() === '-1') {
            UserController::addUser($user);
        }
        else {
            UserController::updateUser($user);
        }

        header('Location: index.php');
    }

    if (isset($_POST['cancel'])) {
        header('Location: index.php');
    }
?>

<html>
<head>
    <title>Group 4 Capstone</title>
</head>

<body>
    <h1>Add / Update User</h1>

    <form method='POST'>
        <input type='text' name='userId' required placeholder="User ID"
            value="<?php echo $user->getUserId(); ?>"><br>
        <input type='text' name='password' required placeholder="Password"
            value="<?php echo $user->getPassword(); ?>"><br>
        <input type='text' name='fName' required placeholder="First Name"
            value="<?php echo $user->getFirstName(); ?>"><br>
        <input type='text' name='lName' required placeholder="Last Name"
            value="<?php echo $user->getLastName(); ?>"><br>
        <input type='text' name='email' required placeholder="E-Mail"
            value="<?php echo $user->getEmail(); ?>"><br>
        <div class="tooltip">
            <span class="tooltiptext">1-Administrator  2-User</span>
            <input type='text' name='level' required placeholder="User Level"
                value="<?php echo $user->getUserLevel(); ?>">
            <span name='msg'><?php echo $msg; ?></span>
        </div>
        <input type="hidden"
            value="<?php echo $user->getUserNo(); ?>" name="userNo"><br><br>
        <input id="save" type="submit" value="Save" name="save"><br><br>
        <input id="cancel" type="submit" value="Cancel" name="cancel">
    </form>
</body>
</html>

