<?php

// isset: Verifica que se exista la variable

// Utilizamos la funcion "isset" para que no genere un error por que se esta condicionando una variable que no existe aun.
if(isset($_POST['accion'])){
    // INSERTAMOS un registro
    if($_POST['accion'] == 'crear'){

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

    
    }else if($_POST['accion'] == 'editar'){
        // Siempre que utilicemos AJAX es recomendable utilizar "echo jsdon_encode()" para saber que estamos retornando
        // echo json_encode($_POST);    

        // Hacemos la conexion a la base de datos
        require_once('../funciones/bd.php');

        // Validamos las entradas agregandole un FILTRO DE SANEAMIENTO a cada una
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

        try {
            $stmt = $conn->prepare("UPDATE contactos SET nombre = ?, telefono = ?, empresa = ? WHERE id = ?");
            $stmt->bind_param("sssi", $nombre, $telefono, $empresa, $id);
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }

            $stmt->close();
            $conn->close();


        } catch (Excepcion $e) {
            $respuesta = array(
                'error' => $e->getMessage()
            );
        }
    }

    // Con "json_encode" enviamos los datos en formato JSON
    echo json_encode($respuesta);  
} 

if(isset($_GET['accion'])){
    // ELIMINAMOS un registro
    if($_GET['accion'] == 'borrar'){

        // Hacemos la conexion a la base de datos
        require_once('../funciones/bd.php');
        
        $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

        try{
            $stmt = $conn->prepare("DELETE FROM contactos WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();

            if($stmt->affected_rows == 1){
                $respuesta = array(
                    'respuesta' => 'correcto'
                );
            }
            $stmt->close();
            $conn->close();

        } catch(Excepcion $e){
            $respuesta = array(
                'error' => $e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }
}