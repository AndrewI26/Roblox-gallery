<?php
// Kaihang Hao
// April 6
//
/*  Sending mail via Gmail SMTP using PHPMailer. After submission, hansenheng635@gmail will receive an email from kaihanghao7788@gmail.com. 
The reply person will automatically become the email address submitted by the user.*/
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$success = "";
$error = "";

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_SPECIAL_CHARS);
//Gmail SMTP using PHPMailer
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($name && $email && $message) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kaihanghao7788@gmail.com';
            $mail->Password = 'shkzngnxadhlgxuv'; 
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('kaihanghao7788@gmail.com', 'Website Contact Form');
            $mail->addAddress('hansencheng635@gmail.com');
            $mail->addReplyTo($email, $name);

            $mail->Subject = "New contact form message from $name";
            $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";

            $mail->send();
            $success = "The message has been sent successfully.";
        } catch (Exception $e) {
            $error = "Sending failed. Mailer Error: " . $mail->ErrorInfo;
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
