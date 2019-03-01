<?php

// La función define () define una constante.

// Las constantes son muy parecidas a las variables, excepto por las siguientes diferencias:

// El valor de una constante no se puede cambiar después de que se establece
// Los nombres constantes no necesitan un signo de dólar líder ($)
// Se puede acceder a las constantes sin importar el alcance
// Los valores constantes solo pueden ser cadenas y números.

/* credenciales  de la base de datos */
define('BD_HOST','localhost');
define('BD_USUARIO','root');
define('BD_PASSWORD','');
define('BD_NOMBRE','agendaphp');

$conn = new mysqli(BD_HOST, BD_USUARIO, BD_PASSWORD, BD_NOMBRE);
    
echo $conn->ping();


