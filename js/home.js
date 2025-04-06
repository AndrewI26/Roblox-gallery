// Andrew Iammancini
// April 2
// Basic javascript for frontend homepage. Cycles through gallery.
window.addEventListener("load", () => {
    let galleryPanelCount = 0;
    const galleryInformation = [
        {
            title: "Sample title 1",
            desc: "Desciption shfjgj 1"
        },
        {
            title: "Sample title 2",
            desc: "Desciption shfjgj 2"
        },
        {
            title: "Sample title 3",
            desc: "Desciption shfjgj 3"
        },
        {
            title: "Sample title 4",
            desc: "Desciption shfjgj 4"
        },
    ]
    document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
    document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].desc;
    document.getElementById("home-arrow").addEventListener("click", () => {
        galleryPanelCount = galleryPanelCount > 3 ? 0 : galleryPanelCount + 1;
        document.getElementById("gall-title").innerHTML = galleryInformation[galleryPanelCount].title;
        document.getElementById("gall-desc").innerHTML = galleryInformation[galleryPanelCount].desc;
    })
})