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

var openFullLineSearchIcon = document.getElementById("openFullLineSearchIcon");
var closeFullLineSearchIcon = document.getElementById("closeFullLineSearchIcon");
var openFullLineThemeIcon = document.getElementById("openFullLineThemeIcon");
var closeFullLineThemeIcon = document.getElementById("closeFullLineThemeIcon");
var fullLine = document.getElementById("fullLine");
var fullLineSearch = document.getElementById("fullLineSearch");
var fullLineTheme = document.getElementById("fullLineTheme");

openFullLineSearchIcon.onclick = function () {
    fullLine.style.display = "flex";
    fullLineSearch.style.display = "flex"
}

closeFullLineSearchIcon.onclick = function () {
    fullLine.style.display = "none";
    fullLineSearch.style.display = "none"
}

openFullLineThemeIcon.onclick = function () {
    fullLine.style.display = "flex";
    fullLineTheme.style.display = "flex"
}

closeFullLineThemeIcon.onclick = function () {
    fullLine.style.display = "none";
    fullLineTheme.style.display = "none"
}