"use strict"

// Enter form modal variables
let modalEnter = document.getElementById('modalEnter');
let btnEnter = document.getElementById("enter");
let btnEnt = document.getElementById("ent")

// Registration form modal variables
let modalReg = document.getElementById('modalReg');
let btnReg = document.getElementById("reg");


// Function for displaying a modal window for Enter
btnEnter.onclick = function() {
    modalEnter.style.display = "block";
}

// Function to close modal windows when clicking on an empty space
window.onclick = function(event) {
    if (event.target == modalEnter) {
        modalEnter.style.display = "none";
    }

    if (event.target == modalReg) {
        modalReg.style.display = "none";
    }

}

// Function for displaying a modal window for Registration
btnReg.onclick = function() {
    modalEnter.style.display = "none";
    modalReg.style.display = "block";
}

// Function for displaying a modal window for Enter
btnEnt.onclick = function() {
    modalReg.style.display = "none";
    modalEnter.style.display = "block";
}