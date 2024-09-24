let str = "1*5*3*7*33*13*66*24*9*45*4*77";

let splitStr = str.split("*");

splitStr.sort((a, b) => b - a);

console.log(splitStr.join("*"));