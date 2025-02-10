<!DOCTYPE html>
<html>
<head>
<title>Número Aleatorio AJAX</title>
<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("numero").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "E1_aleatorio.php", true);
  xhttp.send();
}

// Llama a loadDoc() cada 5 segundos
setInterval(loadDoc, 5000);

// Llama a loadDoc() una vez al cargar la página para mostrar un número inicial
loadDoc();
</script>
</head>
<body>

  <h1>Número Aleatorio:</h1>
  <div id="numero"></div>

</body>
</html>
