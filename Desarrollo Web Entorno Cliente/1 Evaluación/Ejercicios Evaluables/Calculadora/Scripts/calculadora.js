let opDisabled = false;
let comDisabled = false;

function Main() {
    document.addEventListener("keydown", HandleKeyboardInput);
    clear.addEventListener("mousedown", Clear);
    remove.addEventListener("mousedown", Remove);
    one.addEventListener("mousedown", AddNumToDisplay);
    two.addEventListener("mousedown", AddNumToDisplay);
    three.addEventListener("mousedown", AddNumToDisplay);
    four.addEventListener("mousedown", AddNumToDisplay);
    five.addEventListener("mousedown", AddNumToDisplay);
    six.addEventListener("mousedown", AddNumToDisplay);
    seven.addEventListener("mousedown", AddNumToDisplay);
    eight.addEventListener("mousedown", AddNumToDisplay);
    nine.addEventListener("mousedown", AddNumToDisplay);
    zero.addEventListener("mousedown", AddNumToDisplay);
    add.addEventListener("mousedown", AddOpToDisplay);
    substract.addEventListener("mousedown", AddOpToDisplay);
    divide.addEventListener("mousedown", AddOpToDisplay);
    multiply.addEventListener("mousedown", AddOpToDisplay);
    percentage.addEventListener("mousedown", AddOpToDisplay);
    comma.addEventListener("mousedown", AddCommaToDisplay);
    parentheses.addEventListener("mousedown", AddParentheses);
    equals.addEventListener("mousedown", Calculate);
}

function GetEventValue(event) {
    return event.key ? event.key.toLowerCase() : event.target.textContent.trim();
}

function ToggleButtonShadow(element) {
    if (element.classList.contains("pressed")) element.classList.remove("pressed");
    else element.classList.add("pressed");
}

function AddToDisplay(value, replace) {
    if (replace) display.value = value;
    else display.value += value;
}

function AddNumToDisplay(event) {
    if (display.value[display.value.length -1 ] == ")" ) return;
    AddToDisplay(GetEventValue(event), display.value == "0");
    opDisabled = false;
}

function AddOpToDisplay(event) {
    let eventValue = GetEventValue(event);
    if (!opDisabled && /\d|\)$/.test(display.value[display.value.length - 1])) {
        AddToDisplay(eventValue == "*" ? "x" : eventValue, false);
        opDisabled = true;
        comDisabled = false;
    }
}

function AddCommaToDisplay(event) {
    if (!opDisabled && !comDisabled && /^\d+$/.test(display.value[display.value.length - 1])) {
        AddToDisplay(GetEventValue(event), false);
        opDisabled = true;
        comDisabled = true;
    }
}

function AddParentheses() {
    display.value = display.value.replaceAll(/[()]/g, "");
    if (display.value == "") display.value = "0";
    AddToDisplay(display.value.replace(/(?<!\()\d+(\.\d+)?(?!\))/g, "($&)"), true);
}

function HandleKeyboardInput(event) {
    if (/^\d+$/.test(event.key)) AddNumToDisplay(event);
    if (/[+*xX\/%-]/.test(event.key)) AddOpToDisplay(event);
    if (event.key == ".") AddCommaToDisplay(event);
    if (event.key.toUpperCase() == "C") Clear();
    if (event.key == "Backspace") Remove();
    if (event.key == "Enter" || event.key == "=") Calculate();
    if (event.key == "(" || event.key == ")") AddParentheses();
}

function Clear() {
    display.value = "0";
}

function Remove() {
    if (/[+x\/%-\.]/.test(display.value[display.value.length - 1])) opDisabled = false;
    if (display.value[display.value.length - 1] == ".") comDisabled = false;
    if (display.value.length == 1) display.value = 0;
    else display.value = display.value.substring(0, display.value.length - 1);
}

function Calculate() {
    try {
        display.value = eval(display.value.replace("x", "*"));
        if (/\./.test(display.value)) comDisabled = true;
    } catch (err) {
        alert("Operación no valida");
        console.log(err.message);
    }
}