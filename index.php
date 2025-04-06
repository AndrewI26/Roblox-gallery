<!-- 
Created by Andrew Iammancini
March 27
Main home page for the website 
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hansans Portfolio</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="js/home.js"></script>
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
    <main>
        <div class="hero">
            <img class="hero-img" src="images/backdrop.svg" />
            <h1 class="hero-title">You dream it. <br> I'll <span class="hero-grad-text">design</span> it!</h1>
            <p class="hero-subtitle">I specialize in designing Roblox animations and graphics. Let's get in touch so I can make your ideas come to life.</p>
            <button id="contact-me" class="contact-me">Contact me</button>
        </div>
        <div class="about-me">
            <p class="about-me-subtitle">ABOUT ME</p>
            <p class="about-me-title">Hi, I'm Hansan</p>
            <p class="about-me-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
        <div class="quote-container">
            <p class="quote">“Hasan made me an amazing animation in no time. A pleasure to work with!”</p>
            <img src="images/4stars.png" class="quote-stars" />
            <p class="quote-speaker">- Andrew</p>
        </div>
        <div class="skills">
            <div class="skill">
                <img src="images/dollar.svg" class="skills-img" />
                <p class="skills-title">Affordable</p>
                <p class="skills-desc">I work with the customer to come up with a reasonable price specfic to the commision.</p>
            </div>
            <div class="skill">
                <img src="images/eye.svg" class="skills-img" />
                <p class="skills-title">Eyecatching</p>
                <p class="skills-desc">My designs are eyecatching and sure to wow your friends in Roblox!</p>
            </div>
            <div class="skill">
                <img src="images/sand-clock.svg" class="skills-img" />
                <p class="skills-title">Quick</p>
                <p class="skills-desc">The average project is finished in under two weeks. I am fast!</p>
            </div>
        </div>
        <div class="work">
            <p class="section-heading">PAST PROJECTS</p>
            <h1 class="section-title">Check out my work</h1>
            <div class="work-flex">
                <div class="work-info">
                    <div class="work-info-container">
                        <p id="gall-title" class="work-item-title">Sample name</p>
                        <p id="gall-desc" class="work-item-desc">Sample description kndjfsg dkfs jnkdf gd ksfg kbdfsg kvgb injn.</p>
                        <p id="gall-link" class="work-item-link"><a>Check it out in the gallery</a></p>
                        <i id="home-arrow" class="arrow right"></i>
                    </div>
                </div>
                <div class="work-img">
                </div>
            </div>
        </div>
    </main>
</body>

</html>