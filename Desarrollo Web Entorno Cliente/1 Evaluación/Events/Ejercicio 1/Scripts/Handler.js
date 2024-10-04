let nameInput = document.getElementById("name");
let surInput = document.getElementById("surnames");
let emailInput = document.getElementById("email");
let dniInput = document.getElementById("dni");
let passInput = document.getElementById("passwd");
let rePassInput = document.getElementById("repeat_passwd");
let ipInput = document.getElementById("ip");
let submitButton = document.getElementById("bttn");
let errStr = "";

nameInput.onblur = () => { if (/\d/.test(nameInput.value)) errStr += "El nombre no puede tener carácteres numéricos\n"; }
surInput.onblur = () => { if (/\d/.test(surInput.value)) errStr += "Los apellidos no pueden tener carácteres numéricos\n"; }
emailInput.onblur = () => {
    if (!emailInput.value.includes("@")) errStr += "El correo ha de incluir un '@'\n";
    if (!emailInput.value.includes(".")) errStr += "El correo ha de incluir un '.'\n";
}
dniInput.onblur = () => {
    if (emailInput.value.length != 9 || !/^[A-Za-z]+$/.test(emailInput.value.charAt(emailInput.value.length - 1))) {
        errStr += "El DNI ha de incluir una letra y ha de tener 8 números\n";
    }
}
passInput.onblur = () => {
    if (passInput.value.length != 8) errStr += "La contraseña ha de tener un mínimo de 8 carácteres\n";
    if (!/^[A-Za-z]+$/.test(passInput.value)) errStr += "La contraseña ha de contener una letra mayúscula y una minúscula\n";
    if (!/^\d+$/.test(passInput.value)) errStr += "La contraseña ha de contener un número\n";
}
rePassInput.onblur = () => {
    if (rePassInput.value != passInput.value) errStr += "La contraseña no es la misma\n";
}
ipInput.onblur = () => {
    if (!/(?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})/g.test(ipInput.value)) {
        errStr += "IP no válida\n";
    }
}

submitButton.onclick = () => {
    if (errStr != "") alert(errStr);
    errStr = "";
}