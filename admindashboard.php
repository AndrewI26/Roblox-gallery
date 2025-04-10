<!--
Andrew Iammancini
April 9
Made this admin dashboard to allow the admin to navigate to other pages where they can edit their tile. 
-->
<?php
session_start();
$user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_DEFAULT);

// Checks if logged in for first time or is already logged in
if ((password_verify($password, password_hash("1234", PASSWORD_DEFAULT)) && $user == "1234") || $_SESSION["user"] == "Hansan") {
    include "connect.php";

    $_SESSION["user"] = "Hansan";

    $cmd = "SELECT COUNT(*) FROM tiles;";
    $stmt = $dbh->prepare($cmd);
    $success = $stmt->execute();

    if (!$success) {
        $errorMsg = "Query was not successful";
    } else {
        $numTiles = $stmt->fetchColumn();
    }
} else {
    $errorMsg = "Incorrect authentication.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        <?php if ($_SESSION["user"] == "Hansen"): ?>
            <h1><?= $errorMsg ?></h1>
            <h1>Hello, Hansan</h1>
            <p>There is currently <b><?= $numTiles; ?></b> tiles in the database.</p>
            <a href="add.php"><button class="purp-btn">
                    <p class="purp-btn-text">Add tile</p>
                </button></a>
            <a href="update.php"><button class="purp-btn">
                    <p class="purp-btn-text">Update existing tiles</p>
                </button></a>
        <?php else: ?>
            <?php echo $errorMsg ?>
            <p><a class="grey-btn" href="admin.php">Try again</a></p>
        <?php endif ?>
    </div>
</body>

</html>