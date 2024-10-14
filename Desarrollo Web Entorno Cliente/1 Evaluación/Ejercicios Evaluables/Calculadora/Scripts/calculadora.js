let opDisabled = false;
let comDisabled = false;

function Main() {
    AddEventListeners();
}

function AddEventListeners() {
    document.addEventListener("keydown", HandleKeyboardInput);
    clear.addEventListener("click", Clear);
    remove.addEventListener("click", Remove);
    one.addEventListener("click", AddNumToDisplay);
    two.addEventListener("click", AddNumToDisplay);
    three.addEventListener("click", AddNumToDisplay);
    four.addEventListener("click", AddNumToDisplay);
    five.addEventListener("click", AddNumToDisplay);
    six.addEventListener("click", AddNumToDisplay);
    seven.addEventListener("click", AddNumToDisplay);
    eight.addEventListener("click", AddNumToDisplay);
    nine.addEventListener("click", AddNumToDisplay);
    zero.addEventListener("click", AddNumToDisplay);
    add.addEventListener("click", AddOpToDisplay);
    substract.addEventListener("click", AddOpToDisplay);
    divide.addEventListener("click", AddOpToDisplay);
    multiply.addEventListener("click", AddOpToDisplay);
    percentage.addEventListener("click", AddOpToDisplay);
    equals.addEventListener("click", Calculate);
}

function GetEventValue(event) {
    return event.key ? event.key : event.target.textContent.trim();
}

function AddToDisplay(value) {
    if (display.value == "0") display.value = value;
    else display.value += value;
}

function AddNumToDisplay(event) {
    AddToDisplay(GetEventValue(event));
    opDisabled = false;
}

function AddOpToDisplay(event) {
    if (display.value == "0") return;
    let eventValue = GetEventValue(event);
    if (!opDisabled) {
        AddToDisplay(eventValue == "*" ? "x" : eventValue);
    }
    opDisabled = true;
    comDisabled = false;
}

function AddCommaToDisplay(event) {
    if (display.value == "0") return;
    if (!opDisabled && !comDisabled) {
        AddToDisplay(GetEventValue(event));
    }
    comDisabled = true;
    opDisabled = true;
}

function HandleKeyboardInput(event) {
    if (/^\d+$/.test(event.key)) AddNumToDisplay(event);
    if (/[+*x\/%-]/.test(event.key)) AddOpToDisplay(event);
    if (event.key == ".") AddCommaToDisplay(event);
    if (event.key.toUpperCase() == "C") Clear();
    if (event.key == "Backspace") Remove();
}

function Clear() {
    display.value = "0";
}

function Remove() {
    console.log(display.value[display.value.length - 1]);
    if (/[+x\/%-]/.test(display.value[display.value.length - 1])) opDisabled = false;
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