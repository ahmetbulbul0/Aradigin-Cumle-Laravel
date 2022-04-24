const settingsMobilMenuBtn = document.querySelector(".settingsMobilMenuBtn");
const settingsMobilMenu = document.querySelector(".outSettingsMobilMenu");

settingsMobilMenuBtn.addEventListener("click", () => {
    settingsMobilMenu.classList.toggle("active");
});
