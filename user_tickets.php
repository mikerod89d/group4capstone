<?php
session_start();
require_once('./utilities/security.php');
require_once('./controller/user_controller.php');
require_once('./utilities/ticket_utilities.php');

$dir = getcwd() . "/tickets/";
$viewFile = '';
$editFile = '';

Security::checkAuthority('user');

if(isset($_POST['logout'])) {
    unset($_SESSION);
    unset($_POST);
    $_SESSION['logout_msg'] = 'Successfully logged out.';
    header('Location: index.php');
    exit();
}

if(isset($_POST['home'])) {
    header("Location: view/user.php");
}

if(isset($_POST['view'])) {
    $fName = $_POST['fileToView'];
    $viewFile = FileUtilities::GetFileContents($dir . $fName);
    $editFile = '';
}

if(isset($_POST['load'])) {
    $fName = $_POST['fileToUpdate'];
    $editFile = FileUtilities::GetFileContents($dir . $fName);
    $viewFile = '';
}

if(isset($_POST['save'])) {
    $fName = $_POST['fileToUpdate'];
    $content = $_POST['editFile'];
    FileUtilities::WriteFile($dir . $fName, $content);
    $editFile = '';
    $viewFile = '';
}

if(isset($_POST['create'])) {
    $fName = $_POST['newFileName'];
    $content = $_POST['createFile'];
    FileUtilities::WriteFile($dir . $fName, $content);
    $editFile = '';
    $viewFile = '';
}
?>

<html>
<head>
    <title>Ticket Portal</title>
    <link rel="stylesheet" href="view/styles.css" />
</head>
<body>
<div class='headers'><br><br>
    <h1>Tickets Available</h1>
    </div><br>
    <form method='POST'>
    <ul>
        <?php foreach(FileUtilities::GetFileList($dir) as $file) : ?>
            <li><?php echo $file ?></li>
        <?php endforeach; ?>
    </ul>
        <br>
        <div class="editDiv">
        <textarea id="editFile" name="editFile" rows="5" cols="70">
            <?php echo $editFile ?></textarea>
        <br>
        <input id="save" type="submit" value="Save" name="save">
        <input id="load" type="submit" value="Load/Edit Ticket" name="load">
            <select name="fileToUpdate">
            <?php foreach(FileUtilities::GetFileList($dir) as $file) : ?>
                <option value="<?php echo $file; ?>"><?php echo $file; ?>
                </option>
            <?php endforeach; ?></select>
            </div>
        <br>
        <div class="viewDiv">
            <textarea id="viewFile" name="viewFile" rows="5" cols="70"
                disabled placeholder="Ticket View Panel"><?php echo $viewFile ?></textarea>
        <br>
            <input id="view" type="submit" value="View Ticket" name="view">
            <select name="fileToView">
            <?php foreach(FileUtilities::GetFileList($dir) as $file) : ?>
                <option value="<?php echo $file; ?>"><?php echo $file; ?>
                </option>
            <?php endforeach; ?></select>
            </div>
        <br>
        <div class="createDiv">
            <textarea id="createFile" name="createFile" rows="5" cols="70" placeholder="Create Ticket Window"></textarea>
        <br>
            <input id="create" type="submit" value="Create" name="create">
            <input id="text_area" type="text" name="newFileName" placeholder="Save Ticket As...">
        <br>
        </div>
            <input id="home" type="submit" value="Home" name="home">
    </form>
</body>
</html>