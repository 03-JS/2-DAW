document.addEventListener("DOMContentLoaded", () => {
    logo.addEventListener("click", () => window.location.href = "./home.html");
    profileIcon.addEventListener("click", () => window.location.href = "./profile.html");
    document.querySelectorAll(".item").forEach(element => element.addEventListener("click", () => window.location.href = "./car_preview.html"));
    buy.addEventListener("click", () => window.location.href = "./purchase.html");
});