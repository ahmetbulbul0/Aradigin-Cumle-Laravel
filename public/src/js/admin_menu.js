const menuBtn = document.querySelector(".menuBtn");
const mobilMenuBtn = document.querySelector(".mobilMenuBtn");
const themeBtn = document.querySelector(".themeBtn");
const menu = document.querySelector(".outDropdown");
const fullLine = document.querySelector(".outFullLine");
const theme = document.querySelector(".outTheme");
const closeTheme = document.querySelector(".closeTheme");

menuBtn.addEventListener("click", () => {
    menu.classList.toggle("open");
});

mobilMenuBtn.addEventListener("click", () => {
    menu.classList.toggle("open");
});

themeBtn.addEventListener("click", () => {
    fullLine.classList.add("open");
    theme.classList.add("open");
});

closeTheme.addEventListener("click", () => {
    fullLine.classList.remove("open");
    theme.classList.remove("open");
});

document.addEventListener("click", (e) => {
    if (!e.composedPath().includes(menu.querySelector(".inDropdown"))) {
        if (menu.classList.contains("open")) {
            if (!e.composedPath().includes(menuBtn)) {
                if (!e.composedPath().includes(mobilMenuBtn)) {
                    menu.classList.remove("open");
                }
            }
        }
    }
});
