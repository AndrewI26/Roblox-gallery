// Andrew Iammancini
// April 22
// Script to add a message using AJAX. Updates the 'messages' database.

window.addEventListener("load", () => {
    const success = res => {
        const msgBox = document.getElementById("msg-box");
        if (res.ok) {
            msgBox.className = "success";
            msgBox.innerHTML = res.msg;
        } else {
            msgBox.className = "error";
            msgBox.innerHTML = res.msg;
        }
        document.getElementById("contact-form").reset();
    }

    document.getElementById("contact-form").addEventListener("submit", e => {
        e.preventDefault();
        const form = e.target;
        var data = new FormData(form)

        fetch("backend/addMessage.php", {
            method: "POST",
            body: data,
        })
        .then(res => res.json())
        .then(success)
        .catch(err => document.getElementById('msg').innerHTML = err)
    })
})