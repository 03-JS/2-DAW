function ChangeShape(element) {
    element.classList.add("circle");
}

function RestoreShape(element) {
    if (!element.classList.contains("interior-shadow")) element.classList.remove("circle");
}

function AddShadow(element) {
    element.classList.add("shadowed");
}

function RemoveShadow(element) {
    element.classList.remove("shadowed");
}

function TransformShape(element) {
    element.classList.add("circle");
    element.classList.add("interior-shadow");
    element.classList.remove("shadowed");
}

function DeleteElements(elements) {
    for (let i = 0; i < elements.length; i++) {
        elements[i].remove();
    }
}