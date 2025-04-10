// Andrew Iammancini
// April 7
// JS used to send the AJAX request to delete the tile from gallery
window.addEventListener("load", () => {
    const success = (data) => {
        if (data.ok) {
            console.log(`Data ok: ${data.ok}, msg is ${data.msg}`)
            document.getElementById("msg").innerHTML = data.msg;
            const table = document.getElementById("update-table")
            for (let i = table.rows.length - 1; i > 0; i--) {
                const id = table.rows[i].cells[0].textContent;
                if (id == parseInt(data.id)) {
                    table.deleteRow(i);
                }
            }
        } else {
            document.getElementById("msg").innerHTML = `Deletion was unsuccessful: ${data.msg}`;
        }
        
    }

    function deleteTile(e) {
        e.preventDefault();
        let tileId = e.target.dataset.id;
        fetch(`backend/deleteTile.php?id=${tileId}`)
        .then(res => res.json())
        .then(success)
    }
    const delBtns = document.getElementsByClassName("del-btn");
    for (const btn of delBtns) {
        btn.addEventListener("click", e => deleteTile(e))
    }
})