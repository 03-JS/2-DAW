const RandomRange = (min, max) => Math.floor(Math.random() * max) + min;
let start;
let elapsed;

document.addEventListener("DOMContentLoaded", () => setTimeout(CreateDiv, RandomRange(2000, 5000)));

function CreateDiv() {
    start = new Date();
    let div = document.createElement("div");
    div.style.top = `${RandomRange(200, window.screen.availHeight - 200)}px`;
    div.style.left = `${RandomRange(200, window.screen.availWidth - 200)}px`;
    div.innerText = "Púlsame";
    document.body.appendChild(div);
    div.addEventListener("click", () => {
        div.remove();
        elapsed = new Date() - start;
        alert(`Has tardado ${FormatTime(elapsed)} segundos`);
        setTimeout(CreateDiv, RandomRange(2000, 5000));
    });
}

function FormatTime(time) {
    let seconds = time / 1000;
    return seconds;
}