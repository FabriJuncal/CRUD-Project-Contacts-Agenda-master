<?php 
 include 'inc/funciones/funciones.php';
 include 'inc/layout/header.php';
 


// FILTER_VALIDATE_INT: Se asegura que sea el valor sea un numero y lo transforma a INT
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT); 

if(!$id){
    // die(): Se le pase un parametro que será un mensaje que se mostrará, luego detendra la secuencia del codigo.
    // Es decir, es equivalente a la funcion exit(), pero con la diferencia que puede mostrar un mensje.
    die('No es válido'); 
}

$resultado = obtenerContacto($id);

$contacto = $resultado->fetch_assoc();
?>

<div class="contenedor-barra">

    <div class="contenedor barra">
        <a href="index.php" class= "btn volver">Volver</a>
        <h1>Editar Contacto </h1>
    </div>

</div>

<div class="bg-amarillo contenedor sombra">

    <form id="contacto" action="#">
        <legend>Edite el Contacto</legend>
        <?php include 'inc/layout/formulario.php'; ?>
    </form>

</div> <!-- bg-amarillo contenedor sombra -->

<?php include 'inc/layout/footer.php'; ?>