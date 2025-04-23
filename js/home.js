// Andrew Iammancini
// April 2
// Basic javascript for frontend homepage. Cycles through gallery when the arrow is clicked.
window.addEventListener("load", () => {
    // Updates the image if it has changed within the backend page
    const updateImage = id => {
        fetch(`backend/getImage.php?id=${id}`)
        .then(response => response.text())
        .then(text => {
            document.getElementById("gall-img").innerHTML = text
            document.getElementById("link-to-img").href = `gallery.php#${id}`
        })
    }

    // Gets the elements and changes the text
    let galleryPanelCount = 0;
    document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
    document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].paragraph;
    updateImage(galleryInformation[galleryPanelCount].id);

    // Changes the image depending on if the home-arrow is clicked
    document.getElementById("home-arrow").addEventListener("click", () => {
        galleryPanelCount = galleryPanelCount >= galleryInformation.length - 1 ? 0 : galleryPanelCount + 1;
        document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
        document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].paragraph;
        updateImage(galleryInformation[galleryPanelCount].id)
    })

    // Changes the site if the contat me button is clicked
    document.getElementById("contact-me").addEventListener("click", () => {
        location.replace("contact.php")
    })
})