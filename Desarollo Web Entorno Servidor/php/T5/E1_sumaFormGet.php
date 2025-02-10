<!DOCTYPE html>
<html>
<head>
<title>Suma de Números con GET y AJAX</title>
<script>
function sumarNumeros() {
  // Obtener los valores de los campos de entrada
  var num1 = document.getElementById("num1").value;
  var num2 = document.getElementById("num2").value;

  // Crear el objeto XMLHttpRequest
  var xhttp = new XMLHttpRequest();

  // Configurar la petición AJAX
  xhttp.open("GET", "E1_sumaGet.php?num1=" + num1 + "&num2=" + num2, true);

  // Función a ejecutar cuando la petición esté lista
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("resultado").innerHTML = this.responseText;
    }
  };

  // Enviar la petición
  xhttp.send();
}
</script>
</head>
<body>

  <h1>Suma de Números</h1>

  <form>
    Número 1: <input type="number" id="num1" name="num1"><br><br>
    Número 2: <input type="number" id="num2" name="num2"><br><br>
    <button type="button" onclick="sumarNumeros()">Sumar</button>
  </form>

  <div id="resultado"></div>

</body>
</html>