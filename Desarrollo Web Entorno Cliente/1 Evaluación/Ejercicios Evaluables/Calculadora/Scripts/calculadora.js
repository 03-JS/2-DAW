let opDisabled = false;
let comDisabled = false;
let buttons;

function Main() {
    buttons = document.querySelectorAll(".boton");
    for (let button of buttons) {
        button.addEventListener("mouseup", HandleButtonShadow);
    }
    document.addEventListener("keydown", HandleKeyboardInput);
    document.addEventListener("keyup", HandleButtonShadow);
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

function HandleButtonShadow(event) {
    let eventValue = GetEventValue(event);
    if (eventValue == "*") eventValue = "x";
    if (eventValue == "backspace") eventValue = "«";
    if (eventValue == "enter") eventValue = "=";
    if (eventValue == "(" || eventValue == ")") eventValue = "()";
    for (let button of buttons) {
        if (button.textContent.trim().toLowerCase() == eventValue) {
            if (button.classList.contains("pressed")) button.classList.remove("pressed");
            else button.classList.add("pressed");
        }
    }
}

function AddToDisplay(value, replace) {
    if (replace) display.value = value;
    else display.value += value;
}

function AddNumToDisplay(event) {
    if (display.value[display.value.length - 1] == ")") return;
    AddToDisplay(GetEventValue(event), display.value == "0");
    opDisabled = false;
    HandleButtonShadow(event);
}

function AddOpToDisplay(event) {
    let eventValue = GetEventValue(event);
    if (!opDisabled && /\d|\)$/.test(display.value[display.value.length - 1])) {
        AddToDisplay(eventValue == "*" ? "x" : eventValue, false);
        opDisabled = true;
        comDisabled = false;
    }
    HandleButtonShadow(event);
}

function AddCommaToDisplay(event) {
    if (!opDisabled && !comDisabled && /^\d+$/.test(display.value[display.value.length - 1])) {
        AddToDisplay(GetEventValue(event), false);
        opDisabled = true;
        comDisabled = true;
    }
    HandleButtonShadow(event);
}

function AddParentheses(event) {
    if (/[+x\/%-\.]/.test(display.value[display.value.length - 1])) return;
    display.value = display.value.replaceAll(/[()]/g, "");
    if (display.value == "") display.value = "0";
    AddToDisplay("(" + display.value + ")", true);
    // AddToDisplay(display.value.replace(/(?<!\()\d+(\.\d+)?(?!\))/g, "($&)"), true);
    HandleButtonShadow(event);
}

function Clear(event) {
    display.value = "0";
    HandleButtonShadow(event);
}

function Remove(event) {
    if (/[+x\/%-\.]/.test(display.value[display.value.length - 1])) opDisabled = false;
    if (display.value[display.value.length - 1] == ".") comDisabled = false;
    if (display.value.length == 1) display.value = 0;
    else display.value = display.value.substring(0, display.value.length - 1);
    HandleButtonShadow(event);
}

function Calculate(event) {
    try {
        display.value = eval(display.value.replace("x", "*"));
        if (/\./.test(display.value)) comDisabled = true;
    } catch (err) {
        alert("Operación no valida");
        console.log(err.message);
    }
    HandleButtonShadow(event);
}

function HandleKeyboardInput(event) {
    if (/^\d+$/.test(event.key)) AddNumToDisplay(event);
    if (/[+*xX\/%-]/.test(event.key)) AddOpToDisplay(event);
    if (event.key == ".") AddCommaToDisplay(event);
    if (event.key.toUpperCase() == "C") Clear(event);
    if (event.key == "Backspace") Remove(event);
    if (event.key == "Enter" || event.key == "=") Calculate(event);
    if (event.key == "(" || event.key == ")") AddParentheses(event);
}