const showBtn = document.getElementById("openPopUp");
const hideBtn = document.getElementById("closePopUp");
const popUpElement = document.getElementById("popUp");

showBtn.addEventListener("click", () => {
    if (popUpElement.classList.contains("active")) {
        popUpElement.classList.remove("active");
    } else {
        popUpElement.classList.add("active");
    }
});

hideBtn.addEventListener("click", () => {
    if (popUpElement.classList.contains("active")) {
        popUpElement.classList.remove("active");
    }
});