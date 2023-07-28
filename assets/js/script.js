"use strict"

// Comment creation modal variables
let modalView = document.getElementById('modalView');
let btnView = document.getElementById("enter");

// Function for displaying a modal window for creating a comment
btnView.onclick = function() {
    modalView.style.display = "block";
}

// Function to close modal windows when clicking on an empty space
window.onclick = function(event) {
    if (event.target == modalView) {
        modalView.style.display = "none";
    }

}