<?php
  // Obtener los valores de los campos de entrada
  $num1 = $_POST["num1"];
  $num2 = $_POST["num2"];

  // Validar que los campos no estén vacíos y sean números
  if (!empty($num1) && !empty($num2) && is_numeric($num1) && is_numeric($num2)) {
    // Calcular la suma
    $suma = $num1 + $num2;

    // Devolver el resultado
    echo "La suma es: " . $suma;
  } else {
    echo "Por favor, ingresa dos números válidos.";
  }
?>