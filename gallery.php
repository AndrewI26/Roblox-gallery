<!-- 
Edwin and Andrew Iammancini
April 3
The gallery page to show off the animations 
-->
<?php
include "connect.php";

try {
    $cmd = "SELECT * FROM `tiles`";
    $stmt = $dbh->prepare($cmd);
    $success = $stmt->execute();

    if (!$success) {
        $errMsg = "Query was not successful";
    }
} catch (Exception $e) {
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/gallery.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <script type="module" src="js/index-D7xcEVVU.js"></script>

</head>

<body>
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item"><a href="index.php">Home</a></li>
            <li class="nav-item"><a href="gallery.php">Gallery</a></li>
            <li class="nav-item"><a href="contact.php">Contact</a></li>
            <li class="nav-item"><a href="admin.php">Admin</a></li>
        </ul>
    </nav>

    <div class="subHeader">
        <h2>3D Models</h2>
        <p>I can make intricate 3D models for Roblox or any other game/purpose. Just send me your idea and I will make it come to life.</p>
    </div>
    <h1><?= $errMsg; ?></h1>
    <div id="headerRender">
        <canvas class="view" id="mainRender" data-glb="Mechanical Greenhouse MK2.glb"></canvas>
        <div id="mainHoverText">
            <h3>Mechanical Greenhouse MK2</h3>
            <p>I had to delete like 5 different things to export the glb properly. Half textures didnt load properly. </p>
        </div>
    </div>
    <div class="subHeader">
        <h2>Check out my thumbnails</h2>
        <p>I've made made thumbnails for a variety of Roblox games. Some of these thumbnails have been seen by thousands of players.</p>
    </div>
    <div id="thumbnailGrid">
        <?php
        while ($tile = $stmt->fetch()) {
            echo "<div id=" . $tile['id'] . " class='tile'>";
            echo "<img class='gallery-image' src='data:image/jpg;charset=utf8;base64," . base64_encode($tile['image']) . "'>";
            echo "<h2>" . $tile['title'] . "</h2>";
            echo "<p>" . $tile['paragraph'] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
    </div>
</body>

</html>