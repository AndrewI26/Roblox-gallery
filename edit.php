<!-- 
Created by Mekaeel Malik, Andrew Iammancini
April 2nd
Login page for the website 
-->
<?php
$user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

if (password_verify($password, password_hash("1234", PASSWORD_DEFAULT)) && $user == "1234") {
    session_start();
    $_SESSION["user"] = "Hansan";
} else {
    $errorMsg = "Incorrect authentication.";
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
            <form action="addTile.php" method="POST">
                <label for="title-text">Title Text: </label>
                <input name="title-text" id="title-text" type="text">
                <label for="paragraph-text">Paragraph Text: </label>
                <input name="paragraph-text" id="paragraph-text" type="text">
                <label for="image-input" id="image-input">Image: </label>
                <input accept="image/*" name="image-input" id="image-input" type="file">
                <input type="submit" id="sub" />
            </form>
        <?php else: ?>
            <?php echo $errorMsg ?>
            <h1>You are not authorized to be here!</h1>
            <a id="login-again" href="admin.php">Login</a>
        <?php endif ?>
    </div>
</body>

</html>