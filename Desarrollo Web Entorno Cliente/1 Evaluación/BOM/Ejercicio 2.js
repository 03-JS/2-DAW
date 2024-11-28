window.addEventListener("load", () => {
    back.addEventListener("click", () => {history.go(-1);});
    forwards.addEventListener("click", () => {history.go(1);});
})