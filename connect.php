<!--
    Name; Mekaeel Malik
    Student Number: 400583070
    MacID: malikm98
-->

<?php
    date_default_timezone_set("America/Toronto");
    try {
        $pdo = new PDO(
            "mysql:host=localhost;dbname=malikm98_db",
            "malikm98_local",
            "1,b:q0(F"
        );
    } catch (Exception $e) {
        die("ERROR: Couldn't connect. {$e->getMessage()}");
    }
?>