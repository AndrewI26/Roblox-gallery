<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="styles/globals.css">
    <link rel="stylesheet" href="styles/gallery.css">
    <link rel="preconnect" href="https://rsms.me/">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    
    <script type="module" src="scripts/index-CimHIg6K.js"></script>

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


    <div id="header">
        <h1>Gallery</h1>
    </div>
    <div id="headerRender">
        <canvas class="view" id="mainRender" data-fbx="Hip Hop Dancing.fbx"></canvas>
        <div id="mainHoverText">
            <h3>Awesome Dance</h3>
            <p>This is an awesome dance. Filler text goes here Filler text goes here Filler text goes here Filler text goes here Filler text goes here </p>
        </div>
    </div>
    
    
    <div id="renderGrid">
        <div class="tile">
            <canvas class="view tileRender tileRenderHover"  data-fbx="Double Dagger Stab.fbx"></canvas>
            <div class="tileHoverText">
                    <h3>Double dagger</h3>
                    <p>Awesome double dagger</p>
            </div>
        </div>
        
        <div class="tile">
            <canvas class="view tileRender" data-fbx="Praying.fbx"></canvas>
            <div class="tileWords">
                <h3>thing</h3>
                <p>description</p>
            </div>
        </div>
    </div>

    <div id="thumbnailGrid">

        <div class="tile">
                <img src="images\gallery\thumbnail1.png">
        </div>
        <div class="tile">
            <img src="images\gallery\thumbnail2.png">
        </div>
        <div class="tile">
                <img src="images\gallery\thumbnail3.png">
        </div>
        <div class="tile">
            <img src="images\gallery\thumbnail4.png">
        </div>
    </div>
    </div>



    



</body>

</html>