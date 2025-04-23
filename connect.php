<?php
// Mekaeel Malik
// April 2
// This is the script to connect to the PHP server.
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=iammanca_db",
        "iammanca_local",
        "lCnm23!T"
    );
} catch (Exception $e) {
    echo $e;
}
