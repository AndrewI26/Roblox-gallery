<?php 
// Andrew Iammancini
// April 6
// Backend endpoint (POST) that edits a tile in the database.

$id = filter_input(INPUT_POST, "tile-id", FILTER_VALIDATE_INT);

$title = filter_input(INPUT_POST, "title-text", FILTER_SANITIZE_SPECIAL_CHARS);
$paragraph = filter_input(INPUT_POST, "paragraph-text", FILTER_SANITIZE_SPECIAL_CHARS);
$image = filter_input(INPUT_POST, "image-input", FILTER_DEFAULT);

if ($id === NULL) {
    echo json_encode([
        "ok" => false,
        "msg" => "Failed to provide an id!",
    ]);
    exit;
}
if ($id === false) {
    echo json_encode([
        "ok" => false,
        "msg" => "Provided id is not a number!",
    ]);
    exit;
}

try {
    $cmd = "UPDATE tiles SET title=?, paragraph=?, `image`=? WHERE `id`=?";
    $stmt = $dbh->prepare($cmd);
    $args = [$title, $paragraph, $image, $id];
    $success = $stmt->execute($args);

    if ($success) {
        echo json_encode(array(
            "ok" => true,
            "msg" => "Tile updated successfully!",
        ));
        exit;
    } else {
        echo json_encode(array(
            "ok" => false,
            "msg" => "Failed to update tile!",
        ));
        exit;
    }
} catch(Exception $e) {
    echo json_encode(array(
        "ok" => false,
        "msg" => $e,
    ));
    exit;
}
echo json_encode(array(
    "ok" => false,
    "msg" => "somehow made it",
));
?>