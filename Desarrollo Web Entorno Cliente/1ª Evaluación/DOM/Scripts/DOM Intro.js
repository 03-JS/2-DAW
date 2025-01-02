function ApplyStyle() {
    let array = document.querySelectorAll(".principal");
    for (let i = 0; i < array.length; i++) {
        array[i].style.border = "2px double green";
        array[i].style.backgroundColor = "gray";
        array[i].style.width = "300px";
        array[i].style.height = "300px";
        array[i].style.margin = "auto";
    }
}