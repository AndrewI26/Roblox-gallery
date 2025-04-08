<?php
// Andrew Iammancini
// April 6
// Page which allows admin to edit a specific tile in the database.

include "connect.php";
session_start();

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === NULL || $id === false) {
    $msg = "Invalid input parameters (GET)";
}

try {
    $cmd = "SELECT * FROM `tiles` WHERE `id`=?";
    $stmt = $dbh->prepare($cmd);
    $args = [$id];
    $success = $stmt->execute($args);

    if (!$success) {
        $msg = "Query was not successful";
    }
} catch (Exception $e) {
    $msg = $e;
}

$tile = $stmt->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Edit tile</title>
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
    <h1><?php echo $msg; ?></h1>
    <?php if ($_SESSION["user"] == "Hansan"): ?>
        <form id="edit-form" action="backend/addTile.php" method="POST">
            <label for="title-text">Title Text: </label>
            <input name="title-text" id="title-text" type="text" value="<?php echo $tile["title"]; ?>">
            <label for="paragraph-text">Paragraph Text: </label>
            <input name="paragraph-text" id="paragraph-text" value="<?php echo $tile["paragraph"]; ?>" type="text">
            <label for="image-input" id="image-input">Image: </label>
            <input accept="image/*" name="image-input" id="image-input" type="file">
            <img src="data:image/jpg;charset=utf8;base64,<?= base64_encode($tile['image']); ?>">
            <input type="submit" id="sub" />
        </form>
    <?php else: ?>
        <h1>You are not authorized to be here!</h1>
        <a id="login-again" href="admin.php">Login</a>
    <?php endif ?>
</body>

</html>