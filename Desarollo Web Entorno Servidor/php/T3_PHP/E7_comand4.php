<p><b>Versión con shell_exec</b></p>
<p>Comando 1:</p>
<p>FECHA:</p>

<?php

echo "<pre>" . shell_exec("date +'%Y-%m-%d %H:%M:%S'") . "</pre>";

?>


<p>Comando 2:</p>
<p>CUENTA PALABRAS DEL LISTADO:</p>

<?php

echo "<pre>" . shell_exec("ls | wc -w") . "</pre>";

?>