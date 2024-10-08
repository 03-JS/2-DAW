let errStr = "";

username.onblur = () => {
    let str = "El nombre no puede tener carácteres numéricos\n";
    if (/\d/.test(username.value)) {
        if (!errStr.includes(str)) errStr += str;
        username.classList.toggle("wrong");
        return;
    }
    username.classList.toggle("correct");
}
surnames.onblur = () => {
    let str = "Los apellidos no pueden tener carácteres numéricos\n";
    if (/\d/.test(surnames.value)) {
        if (!errStr.includes(str)) errStr += str;
        surnames.classList.toggle("wrong");
        return;
    }
    surnames.classList.toggle("correct");
}
email.onblur = () => {
    let str = "El correo ha de incluir un '@'\n";
    let str1 = "El correo ha de incluir un '.'\n";
    email.classList.toggle("correct", email.value.includes("@") || email.value.includes("."));
    email.classList.toggle("wrong", !email.value.includes("@") || !email.value.includes("."));
    if (!email.value.includes("@") && !errStr.includes(str)) errStr += str;
    if (!email.value.includes(".") && !errStr.includes(str1)) errStr += str1;
}
dni.onblur = () => {
    let str = "El DNI ha de incluir una letra y ha de tener 8 números\n";
    if (dni.value.length != 9 || !/[a-zA-Z]/.test(dni.value.charAt(dni.value.length - 1))) {
        if (!errStr.includes(str)) errStr += str;
        dni.classList.toggle("wrong");
        return;
    }
    dni.classList.toggle("correct");
}
passwd.onblur = () => {
    let str = "La contraseña ha de tener un mínimo de 8 carácteres\n";
    let str1 = "La contraseña ha de contener una letra mayúscula y una minúscula\n";
    let str2 = "La contraseña ha de contener un número\n";
    passwd.classList.toggle("correct", passwd.value.length == 8 || /^[A-Za-z]+$/.test(passwd.value) || /\d/.test(passwd.value));
    passwd.classList.toggle("wrong", passwd.value.length != 8 || !/^[A-Za-z]+$/.test(passwd.value) || !/\d/.test(passwd.value));
    if (passwd.value.length != 8 && !errStr.includes(str)) errStr += str;
    if (!/^[A-Za-z]+$/.test(passwd.value) && !errStr.includes(str1)) errStr += str1;
    if (!/\d/.test(passwd.value) && !errStr.includes(str2)) errStr += str2;
}
repeatPasswd.onblur = () => {
    let str = "La contraseña no es la misma\n";
    if (repeatPasswd.value != passwd.value) {
        if (!errStr.includes(str)) errStr += str;
        repeatPasswd.classList.toggle("wrong");
        return;
    }
    repeatPasswd.classList.toggle("correct");
}
ip.onblur = () => {
    let str = "IP no válida\n";
    if (!/(?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})/g.test(ip.value)) {
        if (!errStr.includes(str)) errStr += str;
        ip.classList.toggle("wrong");
        return;
    }
    ip.classList.toggle("correct");
}

bttn.onclick = () => {
    if (errStr != "") alert(errStr);
    errStr = "";
}