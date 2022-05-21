var modal = document.getElementById("createModal");

// Get the button that opens the modal
var btn = document.getElementById("createBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



var viewModal = document.getElementById("viewContact");

// Get the button that opens the modal
var viewBtn = document.getElementById("viewModal");

// Get the <span> element that closes the modal
var viewSpan = document.getElementsByClassName("close")[1];

// When the user clicks the button, open the modal 
viewBtn.onclick = function() {
    viewModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
viewSpan.onclick = function() {
    viewModal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        viewModal.style.display = "none";
    }
}