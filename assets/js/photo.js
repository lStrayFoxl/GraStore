"use strict"

let modalPhoto = document.getElementById('modalPhoto');
let btnPhoto = document.getElementById('photoChage');

btnPhoto.onclick = function() {
    modalPhoto.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == modalPhoto) {
        modalPhoto.style.display = "none";
    }

}