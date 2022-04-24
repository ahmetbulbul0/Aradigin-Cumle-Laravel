var screenWidth = window.innerWidth;

var usernameChangingOpen = document.getElementById("usernameChangingOpen");
var usernameChangedValue = document.getElementById("usernameChangedValue");
var usernameChangingForm = document.getElementById("usernameChangingForm");
var usernameChangingCancel = document.getElementById("usernameChangingCancel");

usernameChangingOpen.onclick = function () {
    usernameChangingOpen.style.display = "none";
    usernameChangedValue.style.display = "none";
    if (screenWidth > 960) {
        usernameChangingForm.style.display = "flex";
    }
    if (screenWidth <= 960) {
        usernameChangingForm.style.display = "block";
    }
};
usernameChangingCancel.onclick = function () {
    usernameChangingOpen.style.display = "flex";
    if (screenWidth > 540) {
        usernameChangedValue.style.display = "flex";
    }
    if (screenWidth <= 540) {
        usernameChangedValue.style.display = "block";
    }
    usernameChangingForm.style.display = "none";
};

var fullNameChangingOpen = document.getElementById("fullNameChangingOpen");
var fullNameChangedValue = document.getElementById("fullNameChangedValue");
var fullNameChangingForm = document.getElementById("fullNameChangingForm");
var fullNameChangingCancel = document.getElementById("fullNameChangingCancel");

fullNameChangingOpen.onclick = function () {
    fullNameChangingOpen.style.display = "none";
    fullNameChangedValue.style.display = "none";
    if (screenWidth > 960) {
        fullNameChangingForm.style.display = "flex";
    }
    if (screenWidth <= 960) {
        fullNameChangingForm.style.display = "block";
    }
};
fullNameChangingCancel.onclick = function () {
    fullNameChangingOpen.style.display = "flex";
    if (screenWidth > 540) {
        fullNameChangedValue.style.display = "flex";
    }
    if (screenWidth <= 540) {
        fullNameChangedValue.style.display = "block";
    }
    fullNameChangingForm.style.display = "none";
};
