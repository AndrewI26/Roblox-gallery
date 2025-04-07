<?php
// Andrew Iammancini
// April 7
// Script to delete an image from the database

include "../connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === NULL) {
    echo "No id given.";
}
if ($id === false) {
    echo "Invalid id.";
}

$cmd = "DELETE FROM `tiles` WHERE `id`=?;";
$stmt = $dbh->prepare($cmd);
$args = [$id];
$success = $stmt->execute($args);

if (!$success) {
    echo json_encode([
        "ok" => false,
        "msg" => "SQL query not successful!",
    ]);
    exit;
}

if ($stmt->rowCount() == 1 && $success) {
    echo json_encode([
        "ok" => true,
        "msg" => "Deleted tile!",
        "id" => $id,
    ]);
    exit;
} else {
    echo json_encode([
        "ok" => false,
        "msg" => "Tile not found!",
    ]);
    exit;
}
