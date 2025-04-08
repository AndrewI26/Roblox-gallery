<?php

// Created by Mekaeel Malik, Andrew Iammancini
// April 2nd
// Login page for the website 

session_start();

$user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

$canEdit;
if (password_verify($password, password_hash("1234", PASSWORD_DEFAULT)) && $user == "1234") {
    $canEdit = true;
} else {
    $errorMsg = "Incorrect authentication.";
    $canEdit = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Animations</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/admin.css">
    <?php if ($_SESSION["user"] == "Hansan"): ?>
        <script src="js/add.js"></script>
    <?php endif ?>
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body>
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item"><a href="index.php">Home</a></li>
            <li class="nav-item"><a href="gallery.php">Gallery</a></li>
            <li class="nav-item"><a href="contact.php">Contact</a></li>
            <li class="nav-item"><a href="admin.php">Admin</a></li>
            <?php if ($_SESSION["user"] == "Hansan"): ?>
                <li class="nav-item"><a href="logout.php">Logout</a></li>
            <?php endif ?>
        </ul>
    </nav>
    <div class="edit-container">
        <?php if ($_SESSION["user"] == "Hansan"): ?>
            <form id="edit-form" action="backend/addTile.php" enctype="multipart/form-data" method="POST">
                <label for="title-text">Title Text: </label>
                <input name="title-text" id="title-text" type="text">
                <label for="paragraph-text">Paragraph Text: </label>
                <input name="paragraph-text" id="paragraph-text" type="text">
                <label for="image-input" id="image-input">Image: </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                <input name="image-input" id="image-input" type="file">
                <input type="submit" id="sub" />
            </form>
            <p id="msg"></p>
        <?php else: ?>
            <?php echo $errorMsg ?>
            <p><a href="admin.php">Try again</a></p>
        <?php endif ?>
    </div>
</body>

</html>