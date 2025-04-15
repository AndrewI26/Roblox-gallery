// Andrew Iammancini
// April 2
// Basic javascript for frontend homepage. Cycles through gallery when the arrow is clicked.
window.addEventListener("load", () => {
    const updateImage = id => {
        fetch(`backend/getImage.php?id=${id}`)
        .then(response => response.text())
        .then(text => {
            document.getElementById("gall-img").innerHTML = text
            document.getElementById("link-to-img").href = `gallery.php#${id}`
        })
    }
    let galleryPanelCount = 0;
    document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
    document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].paragraph;
    updateImage(galleryInformation[galleryPanelCount].id);

    document.getElementById("home-arrow").addEventListener("click", () => {
        galleryPanelCount = galleryPanelCount >= galleryInformation.length - 1 ? 0 : galleryPanelCount + 1;
        document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
        document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].paragraph;
        updateImage(galleryInformation[galleryPanelCount].id)
    })
    document.getElementById("contact-me").addEventListener("click", () => {
        location.replace("contact.php")
    })
})