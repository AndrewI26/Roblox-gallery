<?php
// Andrew Iammancini
// April 22
// Displays all messages in the database and allows admin to update them

include "connect.php";

session_start();

try {
    $cmd = "SELECT * FROM `messages`";
    $stmt = $dbh->prepare($cmd);
    $success = $stmt->execute();
} catch (Exception $e) {
    echo $e;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View messages</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styles/admin.css">
    <script src="js/messages.js"></script>
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>

<body>
    <nav class="nav">
        <ul class="nav-list">
            <?php if ($_SESSION["user"] == "Hansan"): ?>
                <li class="nav-item"><a href="update.php">Update Tiles</a></li>
                <li class="nav-item"><a href="add.php">Add Tile</a></li>
                <li class="nav-item"><a href="messages.php">View Messages</a></li>
                <li class="nav-item"><a href="logout.php">Logout</a></li>
            <?php endif ?>
        </ul>
    </nav>
    <div class="update-container">
        <h1 id="msg"></h1>
        <?php if ($_SESSION["user"] == "Hansan"): ?>
            <a href="admindashboard.php"><button class="purp-btn">
                    <p class="purp-btn-text">Go to admin dashboard</p>
                </button></a>
            <table id="update-table" class="table-bottom-margin" cellpadding="8" cellspacing="2">
                <colgroup>
                    <col style="width: 50px;">
                    <col style="width: 150px;">
                    <col style="width: 600px;">
                    <col style="width: 150px;">
                    <col style="width: 75px;">
                    <col style="width: 75px;">
                </colgroup>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="update-table-body">
                    <?php
                    while ($tile = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td class='center'>" . $tile["id"] . "</td>";
                        echo "<td>" . $tile["name"] . "</td>";
                        echo "<td>" . $tile["msg"] . "</td>";
                        echo "<td>" . $tile["date"] . "</td>";
                        echo "<td class='center'><button class='del-btn' data-id=" . $tile["id"] . "><i class='fa-solid fa-trash' style='color: #e32400;'></i></button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php else: ?>
            <h1>You are not authorized to be here!</h1>
            <a id="login-again" href="admin.php">Login</a>
        <?php endif ?>
    </div>
</body>

</html>