//get the element using id
var div1 = document.getElementById("div1");
var h1 = document.getElementById("h1");
var form = document.getElementById("form");

div1.addEventListener("mouseover", hover);
div1.addEventListener("mouseout", unhover);
div1.addEventListener("click", click);

function hover() {
    h1.style.color = "white";
    div1.style.width = "450px";
    div1.style.height = "85px";
    h1.style.fontSize = "2em";
    div1.style.padding = "20px";
}
function unhover() {
    h1.style.color = "#333";
    div1.style.width = "300px";
    div1.style.height = "60px";
    h1.style.fontSize = "1.4em";
}
function click() {
    //aggiunge un animazione al div
    div1.style.height = "80%";
    div1.style.maxHeight = "600px";
    div1.style.width = "70%";
    div1.style.maxWidth = "500px";
    div1.style.cursor = "default";
    div1.removeEventListener("mouseover", hover);
    div1.removeEventListener("mouseout", unhover);
    div1.removeEventListener("click", click);
    div1.style.transition = "all 2s";


    form.style.opacity = "1";
    form.style.visibility = "visible";
}