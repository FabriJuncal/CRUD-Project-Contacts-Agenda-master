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

<div class="bg-blanco contenedor sombra contactos">
    <div class="contenedor-contactos">
        <h2>Contactos</h2>

        <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Contactos...">

        <p class="total-contactos"><span>2</span> Contactos</p>

        <div class="contenedor-tabla">
            <table id="listado-contactos" class="listado-contactos">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Empresa</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Fabricio</td>
                        <td>Udemy</td>
                        <td>3764154511</td>
                        <td>
                            <a href="editar.php?id=1" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <!-- "data-id" es un atributo personalisado, es una nueva caracteristica de HTML, agragando data-[nombre], creamos el atributo personalisado -->
                            <button data-id="1" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Fabricio</td>
                        <td>Udemy</td>
                        <td>3764154511</td>
                        <td>
                            <a href="editar.php?id=1" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <!-- "data-id" es un atributo personalisado, es una nueva caracteristica de HTML, agragando data-[nombre], creamos el atributo personalisado -->
                            <button data-id="1" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>Fabricio</td>
                        <td>Udemy</td>
                        <td>3764154511</td>
                        <td>
                            <a href="editar.php?id=1" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>

                            <!-- "data-id" es un atributo personalisado, es una nueva caracteristica de HTML, agragando data-[nombre], creamos el atributo personalisado -->
                            <button data-id="1" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            
            </table>
        </div> <!-- contenedor-tabla -->
    </div> <!-- .contenedor-contactos -->
</div> <!-- bg-blanco contenedor sombra contactos -->


<?php include 'inc/layout/footer.php'; ?>