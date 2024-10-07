let errStr = "";

username.onblur = () => {
    if (/\d/.test(username.value)) {
        errStr += "El nombre no puede tener carácteres numéricos\n";
        username.classList.toggle("wrong");
        return;
    }
    username.classList.toggle("correct");
}
surnames.onblur = () => {
    if (/\d/.test(surnames.value)) {
        errStr += "Los apellidos no pueden tener carácteres numéricos\n";
        surnames.classList.toggle("wrong");
        return;
    }
    surnames.classList.toggle("correct");
}
email.onblur = () => {
    email.classList.toggle("correct", email.value.includes("@") || email.value.includes("."));
    email.classList.toggle("wrong", !email.value.includes("@") || !email.value.includes("."));
    if (!email.value.includes("@")) errStr += "El correo ha de incluir un '@'\n";
    if (!email.value.includes(".")) errStr += "El correo ha de incluir un '.'\n";
}
dni.onblur = () => {
    if (dni.value.length != 9 || !/^[A-Za-z]+$/.test(dni.value.charAt(dni.value.length - 1))) {
        errStr += "El DNI ha de incluir una letra y ha de tener 8 números\n";
        dni.classList.toggle("wrong");
        return;
    }
    dni.classList.toggle("correct");
}
passwd.onblur = () => {
    passwd.classList.toggle("correct", passwd.value.length == 8 || /^[A-Za-z]+$/.test(passwd.value) || /\d/.test(passwd.value));
    passwd.classList.toggle("wrong", passwd.value.length != 8 || !/^[A-Za-z]+$/.test(passwd.value) || !/\d/.test(passwd.value));
    if (passwd.value.length != 8) errStr += "La contraseña ha de tener un mínimo de 8 carácteres\n";
    if (!/^[A-Za-z]+$/.test(passwd.value)) errStr += "La contraseña ha de contener una letra mayúscula y una minúscula\n";
    if (!/\d/.test(passwd.value)) errStr += "La contraseña ha de contener un número\n";
}
repeatPasswd.onblur = () => {
    if (repeatPasswd.value != passwd.value) {
        errStr += "La contraseña no es la misma\n";
        repeatPasswd.classList.toggle("wrong");
        return;
    }
    repeatPasswd.classList.toggle("correct");
}
ip.onblur = () => {
    if (!/(?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})/g.test(ip.value)) {
        errStr += "IP no válida\n";
        ip.classList.toggle("wrong");
        return;
    }
    ip.classList.toggle("correct");
}

bttn.onclick = () => {
    if (errStr != "") alert(errStr);
    errStr = "";
}