const menuBtn = document.querySelector(".menuBtn");
const mobilMenuBtn = document.querySelector(".mobilMenuBtn");
const searchBtn = document.querySelector(".searchBtn");
const mobilSearchBtn = document.querySelector(".mobilSearchBtn");
const themeBtn = document.querySelector(".themeBtn");
const menu = document.querySelector(".outDropdown");
const fullLine = document.querySelector(".outFullLine");
const search = document.querySelector(".search");
const theme = document.querySelector(".outTheme");
const closeSearch = document.querySelector(".closeSearch");
const closeTheme = document.querySelector(".closeTheme");

menuBtn.addEventListener("click", () => {
    menu.classList.toggle("open");
});

mobilMenuBtn.addEventListener("click", () => {
    menu.classList.toggle("open");
});

searchBtn.addEventListener("click", () => {
    fullLine.classList.add("open");
    search.classList.add("open");
});

mobilSearchBtn.addEventListener("click", () => {
    fullLine.classList.add("open");
    search.classList.add("open");
});

closeSearch.addEventListener("click", () => {
    fullLine.classList.remove("open");
    search.classList.remove("open");
});

themeBtn.addEventListener("click", () => {
    fullLine.classList.add("open");
    theme.classList.add("open");
});

closeTheme.addEventListener("click", () => {
    fullLine.classList.remove("open");
    theme.classList.remove("open");
});
