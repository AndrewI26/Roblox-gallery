<?php
// Andrew Iammancini
// April 22
// Script to delete an message from the database

include "../connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === NULL) {
    echo "No id given.";
}
if ($id === false) {
    echo "Invalid id.";
}

$cmd = "DELETE FROM `messages` WHERE `id`=?;";
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
        "msg" => "Deleted message!",
        "id" => $id,
    ]);
    exit;
} else {
    echo json_encode([
        "ok" => false,
        "msg" => "Message not found!",
    ]);
    exit;
}
