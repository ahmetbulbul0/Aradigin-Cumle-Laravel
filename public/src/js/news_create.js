var screenWidth = window.innerWidth;

var openDateAndTimeBoxBtn = document.getElementById("openDateAndTimeBoxBtn");
var closeDateAndTimeBoxBtn = document.getElementById("closeDateAndTimeBoxBtn");
var outRadioBox = document.getElementById("outRadioBox");
var outDateAndTimeBox = document.getElementById("outDateAndTimeBox");

openDateAndTimeBoxBtn.onclick = function() {
    outRadioBox.style.display = "none";
    if (screenWidth <= 490) {
        outDateAndTimeBox.style.display = "block";
    }
    if (screenWidth > 490) {
        outDateAndTimeBox.style.display = "flex";
    }
}
closeDateAndTimeBoxBtn.onclick = function() {
    if (screenWidth <= 490) {
        outRadioBox.style.display = "block";
    }
    if (screenWidth > 490) {
        outRadioBox.style.display = "flex";
    }
    outDateAndTimeBox.style.display = "none";
}