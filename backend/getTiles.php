<?php
// Andrew Iammancini
// April 7
// Backend endpoint that returns a list of all tiles in the database in json

include "../connect.php";

header('Content-Type: application/json');

try {
    $cmd = "SELECT * FROM `tiles`";
    $stmt = $dbh->prepare($cmd);
    $success = $stmt->execute();

} catch (Exception $e) {
    echo json_encode($e);
}
if (!$success) {
    echo json_encode([
        "ok" => false,
        "msg" => "SQL query not successful!",
    ]);
    exit;
}
$rows = [];
while ($row = $stmt->fetch()) {
    array_push($rows, [
        "id" => $row['id'],
        "title" => $row['title'],
        "paragraph" => $row['paragraph'],
    ]);
}
echo json_encode([
    "ok" => true,
    "msg" => "Query success!",
    "rows" => $rows,
]);
?>

