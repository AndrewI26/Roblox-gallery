<?php
// Andrew and Kaihang
// April 23
// Added contact page which adds messages to the database.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/contact.css">
    <script src="js/contact.js"></script>
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

        <div id="msg-box"></div>

        <form id="contact-form" method="POST" action="contact.php">
            <label>Name:</label>
            <input type="text" name="name" max="50" required>

            <label>Message:</label>
            <textarea name="msg" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>

    </main>
</body>

</html>