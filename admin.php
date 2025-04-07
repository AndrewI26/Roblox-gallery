<!-- 
Created by Andrew Iammancini, Mekaeel Malik
April 2nd
Login page for the website 
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/admin.css">
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
    <main class="login-container">
        <form class="login" action="add.php" method="POST">
            <p class="login-title">Admin Login Page</p>
            <p>Username</p>
            <input class="user" name="username" type="text" />
            <p>Password</p>
            <input class="pass" name="password" type="password" />
            <input id="sub" type="submit" class="login-btn" />
        </form>
    </main>
</body>

</html>