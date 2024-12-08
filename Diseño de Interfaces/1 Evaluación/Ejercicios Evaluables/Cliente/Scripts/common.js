document.addEventListener("DOMContentLoaded", () => {
    logo.addEventListener("click", () => window.location.replace("./home.html"));
    profileIcon.addEventListener("click", () => window.location.replace("./profile.html"));
    document.querySelectorAll(".item").forEach(element => element.addEventListener("click", () => {window.location.replace("./car_preview.html")}));
    buy.addEventListener("click", () => window.location.replace("./purchase.html"));
});