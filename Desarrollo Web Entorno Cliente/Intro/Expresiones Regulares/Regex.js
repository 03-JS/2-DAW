/*
1
*/

var ipAddress = "255.0.0.1";
var regex = /(?:(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})\.){3}(?:25[0-5]|2[0-4]\d|[01]?\d?\d{1})/g;

if (regex.test(ipAddress)) {
    alert("Sí es una IP");
} else {
    alert("No es una IP");
}

/*
2
*/

var mystring = 'Una cadena. De prueba.';
var newString = mystring.replace(/\./g, "_");

console.log(newString);

/*
3
*/

var str = "Una cadena de prueba";
var regex = /a/g;
str.match(regex).length;
