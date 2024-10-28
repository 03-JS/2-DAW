<h1>Listado del contenido del directorio actual</h1>
<h2>Varias formas de hacerlo</h2>
<p><b>Versión mediante exec</b></p>

<?php

exec("dir", $out);

foreach ($out as $line) {
    echo "$line<br>";
}

?>

<p><b>Versión mediante system</b></p>

<?php

echo system("dir");

?>

<p><b>Versión con comillas invertidas</b></p>

<?php

echo `dir`;

?>