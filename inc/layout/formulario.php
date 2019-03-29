<div class="campos">

            <!-- Nombre -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="nombre">Nombre:</label>
                <input 

                type="text" 
                placeholder="Nombre Contacto" 
                id="nombre"
                <?php /* Esta linea de codigo se refiere a lo siguiente:
                    Se agrega en el ATRIBUTO "VALUE" un codigo PHP  donde se agregó una condicional resumida.
                    '?' : Significa "IF", en el caso que el valor sea TRUE.
                    ':' : Significa "ELSE", en el caso que el valor sea FALSE.

                    En este caso seria: Si la variable $contacto['nombre'] contiene un valor, entonces el ATRIBUTO tendra el valor de $contacto['nombre'] y en el caso que $contacto['nombre'] no tenga un valor, no se mostrará nada.
                
                */?>

                value="<?php echo (isset($contacto['nombre'])) ? $contacto['nombre'] : ''; ?>"
                
                >
            </div><!-- campo -->

            <!-- Empresa -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="empresa">Empresa:</label>
                <input 

                type="text" 
                placeholder="Nombre Empresa" 
                id="empresa"
                <?php /* Esta linea de codigo se refiere a lo siguiente:
                    Se agrega en el ATRIBUTO "VALUE" un codigo PHP  donde se agregó una condicional resumida.
                    '?' : Significa "IF", en el caso que el valor sea TRUE.
                    ':' : Significa "ELSE", en el caso que el valor sea FALSE.

                    En este caso seria: Si la variable $contacto['empresa'] contiene un valor, entonces el ATRIBUTO tendra el valor de $contacto['empresa'] y en el caso que $contacto['empresa'] no tenga un valor, no se mostrará nada.
                
                */?>

                value="<?php echo (isset($contacto['empresa'])) ? $contacto['empresa'] : ''; ?>"
                
                >
            </div><!-- campo -->

            <!-- Telefono -->
            <div class="campo">
                <!-- Lo que hace el atributo "for", es que si le damos Click al label, va a seleccionar el elemento con el Id con el mismo nombre -->
                <label for="telefono">Teléfono:</label>
                <input 

                type="tel" 
                placeholder="Teléfono Contacto" 
                id="telefono"
                <?php /* Esta linea de codigo se refiere a lo siguiente:
                    Se agrega en el ATRIBUTO "VALUE" un codigo PHP  donde se agregó una condicional resumida.
                    '?' : Significa "IF", en el caso que el valor sea TRUE.
                    ':' : Significa "ELSE", en el caso que el valor sea FALSE.

                    En este caso seria: Si la variable $contacto['telefono'] contiene un valor, entonces el ATRIBUTO tendra el valor de $contacto['telefono'] y en el caso que $contacto['telefono'] no tenga un valor, no se mostrará nada.
                
                */?>
                value="<?php echo (isset($contacto['telefono'])) ? $contacto['telefono'] : ''; ?>"
                
                >
            </div><!-- campo -->
            
</div><!-- campos -->

<div class="campo enviar">
    <?php
        $textoBtn = (isset($contacto['telefono'])) ? 'Guardar' : 'Añadir';
        $accion = (isset($contacto['telefono'])) ? 'editar' : 'crear'
    ?>

    <input type="hidden" id="accion" value="<?php echo $accion; ?>">
    <?php if(isset($contacto['id'])){ ?>
        <input type="hidden" id="id" value="<?php echo $contacto['id']; ?>">
    
    <?php } ?>
    
    <input type="submit" value="<?php echo $textoBtn; ?>">
</div>