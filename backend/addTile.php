<?php
    // Created by Mekaeel Malik, Andrew Iammancini
    // April 2nd
    // Backend endpoint (POST) that adds a new tile entry into the database
  
    include("../connect.php");
    header('Content-Type: application/json');

    $title = filter_input(INPUT_POST, "title-text", FILTER_SANITIZE_SPECIAL_CHARS);
    $paragraph = filter_input(INPUT_POST, "paragraph-text", FILTER_SANITIZE_SPECIAL_CHARS);

    
    if ($_FILES['image-input']['error'] !== UPLOAD_ERR_OK) {
        switch ($_FILES['image-input']['error']) {
            case UPLOAD_ERR_NO_FILE:
                echo json_encode([
                    "ok" => false,
                    "msg" => "No file sent: " . $_FILES['image-input']['error'],
                ]);
            case UPLOAD_ERR_INI_SIZE:
                echo json_encode([
                    "ok" => false,
                    "msg" => "The file you are trying to upload is larger than the max file size: " . $_FILES['image-input']['error'],
                ]);
            case UPLOAD_ERR_FORM_SIZE:
                echo json_encode([
                    "ok" => false,
                    "msg" => "Uploaded file too large: " . $_FILES['image-input']['error'],
                ]);
            default:
                echo json_encode([
                    "ok" => false,
                    "msg" => "File upload error: " . $_FILES['image-input']['error'],
                ]);
            }
    }
    

    if ($title === NULL || $paragraph === NULL) {
        echo json_encode([
            "ok" => false,
            "msg" => "Failed to provide one or more post parameters!",
        ]);
        exit;
    }
    if ($title === false || $paragraph === false) {
        echo json_encode([
            "ok" => false,
            "msg" => "One or more post parameters are invalid!",
        ]);
        exit;
    }

    try {
        $image_data = file_get_contents($_FILES['image-input']['tmp_name']);

        $cmd = "INSERT INTO `tiles` (title, paragraph, `image`) VALUES (?, ?, ?);";
        $stmt = $dbh->prepare($cmd);
        $args = [$title, $paragraph, $image_data];
        $success = $stmt->execute($args);

        
        if ($success) {
            unlink($target_path);
            echo json_encode(array(
                "ok" => true,
                "msg" => "Tile added!",
            ));
            exit;
        } else {
            echo json_encode(array(
                "ok" => false,
                "msg" => "Failed to add tile!",
            ));
            exit;
        }
        
    } catch(Exception $e) {
        echo json_encode(array(
            "ok" => false,
            "msg" => "Error:" . $e,
        ));
        exit;
    }
?>