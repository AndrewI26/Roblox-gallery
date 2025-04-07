

<?php
//     Name; Mekaeel Malik
//     Student Number: 400583070
//     MacID: malikm98
try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=iammanca_db",
        "iammanca_local",
        "lCnm23!T"
    );
} catch (Exception $e) {
    echo $e;
}
?>