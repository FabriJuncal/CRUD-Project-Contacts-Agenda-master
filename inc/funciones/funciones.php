<?php

    // Obtenemos todos los registros
    function obtenerContactos(){
        include 'bd.php';

        try {
            
            return $conn->query("SELECT id, nombre, empresa, telefono FROM contactos");

        } catch (Exception $e) {

            echo "Error!!" . $e->getMessage() . "<br>";
            return false;
             
        }
    }

    // Obtenemos el registro con el ID que se paso como parametro
    function obtenerContacto($id){
        include 'bd.php';

        try {
            
            return $conn->query("SELECT id, nombre, empresa, telefono FROM contactos WHERE id = $id");

        } catch (Exception $e) {

            echo "Error!!" . $e->getMessage() . "<br>";
            return false;
             
        }
    }