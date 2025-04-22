// Andrew Iammancini
// April 7
// JS used to send the AJAX request to add an image to the gallery.
window.addEventListener("load", () => {
    document.getElementById("edit-form").addEventListener("submit", e => {
        e.preventDefault();

        const form = e.target;
        var input = document.querySelector('input[type="file"]')

        // Gets the data from the form
        var data = new FormData(form)
        for (const file of input.files) {
            data.append('files',file,file.name)
        }
        
        /**
         * 
         * @typedef {Object} Data 
         * @property {Boolean} ok - Whether request was successful.
         * @property {String} msg - Response message to display on the screen.
         */
        /**
         * 
         * @param {Data} data - The response data.
         */
        const success = data => {
            document.getElementById("msg").innerHTML = (
                data.ok ? 
                `Success: ${data.msg}` :
                `Failure: ${data.msg}`
            )
            document.getElementById("edit-form").reset();
        }

        // Adds in the tile using a POST API call
        fetch("backend/addTile.php", {
            method: "POST",
            body: data,
        })
        .then(res => res.json())
        .then(success)
        .catch(err => document.getElementById('msg').innerHTML = err)
    })
})