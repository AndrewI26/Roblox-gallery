<!-- 
    Created by Mekaeel Malik
    April 2nd
    Login page for the website 
-->

<<?php

    include("connect.php");

    $title = $_POST["title-text"];
    $paragraph = $_POST["paragraph-text"];
    $image = $_POST["image-input"];

    $push = $pdo->prepare("INSERT INTO `tiles` title,paragraph,image VALUES (':title, :paragraph, :image')");

    $push->execute(["title"=> $title,"parapgraph"=> $paragraph,"image"=> $image]);

    echo "<h1>Tile Updated!</h1> <a href='gallery.php'></a>";

?>