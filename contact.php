<?php

/*try {
    $pdo = new PDO(
        "mysql:host=127.0.0.1;dbname=malikm98_db",
        "malikm98_local",
        "1,b:q0(F"
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect.");
}*/
$success = "";
$error = "";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);

/*
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($name && $email && $message) {
        try {
            $sql = "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([$name, $email, $message]);
            if ($result) {
                $success = "The message has been submitted successfully";
            } else {
                $error = "Submission failed, please try again later.";
            }
        } catch (Exception $e) {
            $error = "Database error:  ;
        }
    } else {
        $error = "Please fill in all fields and make sure the email address is correct.";
    }
}
*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($name && $email && $message) {
        $to = "hansencheng635@gmail.com";
        $subject = "New contact form message from $name";
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            $success = "The message has been sent successfully.";
        } else {
            $error = "Sending failed. Please try again later.";
        }
    } else {
        $error = "Please fill in all fields and make sure the email address is correct.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/contact.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body>
    <nav class="nav">
        <ul class="nav-list">
            <li class="nav-item"><a href="index.php">Home</a></li>
            <li class="nav-item"><a href="gallery.php">Gallery</a></li>
            <li class="nav-item"><a href="contact.php">Contact</a></li>
            <li class="nav-item"><a href="admin.php">Admin</a></li>
        </ul>
    </nav>
    <main class="contact-container">
        <h1>Contact Us</h1>
        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php elseif ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if (!$success): ?>
            <form method="POST" action="contact.php">
                <label>Name:</label>
                <input type="text" name="name" required>

                <label>Email:</label>
                <input type="email" name="email" required>

                <label>Message:</label>
                <textarea name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
