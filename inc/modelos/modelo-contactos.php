<?php

// INSERTAMOS un registro
if($_POST['accion']== 'crear'){

    // Hacemos la conexion a la base de datos
    require_once('../funciones/bd.php');

    // Validamos las entradas agregandole un FILTRO DE SANEAMIENTO a cada una
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

    
    try {
        // Validamos los datos insertados en el metodo PREPARED STATEMENTS
        // Preparamos la plantilla de Insersion
        $stmt = $conn->prepare("

                                 INSERT INTO contactos (nombre, empresa, telefono) VALUES (?, ?, ?)
                                
                               ");

        $stmt->bind_param("sss", $nombre, $empresa, $telefono);

        // Ejecutamos la consulta
        $stmt->execute();

        if($stmt->affected_rows == 1){
            $respuesta = array(
                'respuesta' => 'correcto',
                'datos' => array(
                    'nombre' => $nombre,
                    'empresa' => $empresa,
                    'telefono' => $telefono,
                    'id_insertado' => $stmt->insert_id
                )
            );
        }
        
        // Cerramos las conexiones
        $stmt->close();
        $conn->close();


    } catch (Exception $e) { // Le asignamos a $e la Excepcion
        $respuesta = array(
            'error' => $e->getMessage()
        );
    } 
    
}


// Con "json_encode" enviamos los datos en formato JSON
echo json_encode($respuesta);