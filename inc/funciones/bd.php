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
// define('BD_PORT','3306');

// Los parametros deben ir en esta secuencia: el 5to parametro es opcional (puerto).
// mysqli(HOST, USUARIO, CONTRASEÑA, NOMBRE DE LA BASE DE DATOS, PUERTO)

$conn = new mysqli(BD_HOST, BD_USUARIO, BD_PASSWORD, BD_NOMBRE);

// Si ocurre un problema de conexion, se imprimira un mensaje del error
if ($conn->connect_error) {
    die("CONEXION FALLIDA: " . $conn->connect_error);
}else{
    // ping(): Nos muestra dos posibles valores:
    // 1: Significa que se realizo la conexion con la base de datos.
    // 0 o (nada): Significa que no se puedo establecer la conexion con la base de datos.
    // echo $conn->ping();

}

 



