<?php
// Andrew Iammancini
// April 7
// Script to get an image from the database.
// Returns an html img element with the correct image as the source.

include "../connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === NULL) {
    echo "Not id given";
}
if ($id === false) {
    echo "Invalid id";
}

$cmd = "SELECT `image` FROM `tiles` WHERE `id`=?;";
$stmt = $dbh->prepare($cmd);
$args = [$id];
$success = $stmt->execute($args);

if (!$success) {
    echo "Not successful!";
}

if ($stmt->rowCount() == 1) {
    echo "<img class='update-image' src='data:image/jpg;charset=utf8;base64," . base64_encode($stmt->fetch()["image"]) . "'>";
} else {
    http_response_code(404);
    echo "Image not found.";
}
