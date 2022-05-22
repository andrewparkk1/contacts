var modal = document.getElementById("createModal");
var modal2 = document.getElementById("viewContact");
var btn = document.getElementById("createBtn");
var close1 = document.getElementsByClassName("close")[0];
var close2 = document.getElementsByClassName("close")[1];


// Open and close modals
btn.onclick = function() {
    modal.style.display = "block";
}

close1.onclick = function() {
    modal.style.display = "none";
    window.location.href = "index.php";
}

close2.onclick = function() {
    modal.style.display = "none";
    window.location.replace("index.php");
}

window.onclick = function(event) {
    if (event.target == modal || event.target == modal2) {
        modal.style.display = "none";
        modal2.style.display = "none";
        window.location.replace("index.php");
    }
}

// display file name
const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
    const [file] = e.target.files;
    document.querySelector('#file-name').textContent = file.name;
});

const file2 = document.querySelector('#file2');
file2.addEventListener('change', (e) => {
    const [file] = e.target.files;
    document.querySelector('#file-name-2').textContent = file.name;
});