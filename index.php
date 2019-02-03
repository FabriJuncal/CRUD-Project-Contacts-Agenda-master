<?php include 'inc/layout/header.php'; ?>

<div class="contenedor-barra">
    <h1>Agenda de Contactos</h1>
</div>

<div class="bg-amarillo contenedor sombra">
    <form id="contacto" action="#">
        <legend>Añada un contacto <span>Todos los campos son obligatorios</span></legend>

        <div class="campos">

            <!-- Nombre -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Nombre Contacto" id="nombre">
            </div><!-- campo -->

            <!-- Empresa -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="empresa">Empresa:</label>
                <input type="text" placeholder="Nombre Empresa" id="empresa">
            </div><!-- campo -->

            <!-- Telefono -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="telefono">Teléfono:</label>
                <input type="tel" placeholder="Teléfono Contacto" id="telefono">
            </div><!-- campo -->
            
        </div><!-- campos -->

        <div class="campo enviar">
            <input type="submit" value="Añadir">
        </div>
        
    </form>
</div> <!-- bg-amarillo contenedor sombra -->


<?php include 'inc/layout/footer.php'; ?>