<?php
// Andrew Iammancini
// April 22
// Endpoint (POST) which adds a message to the database.

include("../connect.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

if ($name === NULL || $msg === NULL) {
    echo json_encode([
        "ok" => false,
        "msg" => "Failed to provide a name or message!",
    ]);
    exit;
}
if ($name === false || $msg === false) {
    echo json_encode([
        "ok" => false,
        "msg" => "Name or message provided is invalid",
    ]);
    exit;
}

if (strlen($name) > 50) {
    echo json_encode([
        "ok" => false,
        "msg" => "The name you entered is too long!",
    ]);
    exit;
}

try {
    $cmd = "INSERT INTO `messages` (`name`, msg) VALUES (?, ?);";
    $stmt = $dbh->prepare($cmd);
    $args = [$name, $msg];
    $success = $stmt->execute($args);

    if ($success) {
        echo json_encode([
            "ok" => true,
            "msg" => "Message added!"
        ]);
        exit;
    } else {
        echo json_encode([
            "ok" => false,
            "msg" => "Failed to add message to database!",
        ]);
        exit;
    }
} catch (Exception $e) {
    echo json_encode(array(
        "ok" => false,
        "msg" => "Error:" . $e,
    ));
    exit;
}
