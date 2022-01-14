var openMenuIcon = document.getElementById("openMenuIcon");
var closeMenuIcon = document.getElementById("closeMenuIcon");
var dropdown = document.getElementById("dropdown");

openMenuIcon.onclick = function () {
    dropdown.style.display = "flex";
    openMenuIcon.style.display = "none";
    closeMenuIcon.style.display = "flex"
}

closeMenuIcon.onclick = function () {
    dropdown.style.display = "none";
    openMenuIcon.style.display = "flex";
    closeMenuIcon.style.display = "none"
}

var openFullLineThemeIcon = document.getElementById("openFullLineThemeIcon");
var closeFullLineThemeIcon = document.getElementById("closeFullLineThemeIcon");
var fullLine = document.getElementById("fullLine");
var fullLineTheme = document.getElementById("fullLineTheme");

openFullLineThemeIcon.onclick = function () {
    fullLine.style.display = "flex";
    fullLineTheme.style.display = "flex"
}

closeFullLineThemeIcon.onclick = function () {
    fullLine.style.display = "none";
    fullLineTheme.style.display = "none"
}