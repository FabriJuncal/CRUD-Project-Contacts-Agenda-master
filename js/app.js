const formularioContactos = document.querySelector('#contacto'),
      listadoContactos = document.querySelector('#listado-contactos tbody');

eventListeners();

function eventListeners(){

    // Cuando el BOTON de Crear o Editar se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);

    // Evento para Eliminar Registro
    listadoContactos.addEventListener('click', eliminarContacto);
}

function leerFormulario(e){
    e.preventDefault();
    
    //Leer los datos de los inputs
    const nombre = document.querySelector('#nombre').value,
          empresa = document.querySelector('#empresa').value,
          telefono = document.querySelector('#telefono').value,
          accion = document.querySelector('#accion').value;
    
    if(nombre === '' || empresa === '' || telefono === ''){
        // 2 parametros: texto y clase
        mostrarNotificacion('Todos los Campos son Obligatorios', 'error'); 
    }else{
        // Si pasa la validacion, se crea el llamado a Ajax
        // FomrData(): Los objetos FormData le permiten compilar un conjunto de pares clave/valor para enviar mediante XMLHttpRequest. Están destinados principalmente para el envío de los datos del formulario, pero se pueden utilizar de forma independiente con el fin de transmitir los datos tecleados.
        const infoContacto = new FormData();
        infoContacto.append('nombre', nombre);
        infoContacto.append('empresa',empresa);
        infoContacto.append('telefono', telefono);
        infoContacto.append('accion', accion);

        // El Operador de Propagación, o spread operator, se compone del nombre de nuestro array precedido por tres puntos.
        // En este sencillo ejemplo, estamos cogiendo nuestro array para procesar cada uno de sus elementos como argumentos de la propia función ‘console.log’, por lo que el resultado sería equivalente a escribir:
        // console.log(infoContacto[0], infoContacto[1], infoContacto[2],infoContacto[3])

        // console.log(...infoContacto);

        if(accion === 'crear'){
            //Crearemos un nuevo contacto
            insertarBD(infoContacto);
        }else{
            //Editamos el contacto
        }
    }
}

/** Insercion de Registros via Ajax **/
function insertarBD(datos){
    // 1)Llamado a Ajax

    // 2)Crear el objeto
        const xhr = new XMLHttpRequest();

    // 3)Abrir la conexion
        //POST: Se utiliza cuando se inserta algo a la BASE DE DATOS
        //GET: Se utiliza cuando se quiere obtener algo que esta en el SERVIDOR    
        xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);


    // 4)Pasar los datos
        xhr.onload = function(){
            // status = 200 significa que todo esta correcto, por lo tanto creamos una condicional que ejecute el codigo si todo salio bien
            if(this.status === 200){
                // leemos la respuesta de PHP
                // Utilizamos "JSON.parse" para poder transformar los datos que obtenemos del servidor que estan en formato string a JSON
                // console.log(JSON.parse(xhr.responseText));
                
                const respuesta = JSON.parse( xhr.responseText); 
                

                /**  Creamos nodos HTML con Scripting por que: **/
                // El SANEAMIENTO se hace automaticamente.
                // Se CARGAN MAS RAPIDO.
                // Es mas SEGURO

                // Insertamos un nuevo elemento a la Tabla
                const  nuevoContacto = document.createElement('tr');

                nuevoContacto.innerHTML = `
                    <td>${respuesta.datos.nombre}</td>
                    <td>${respuesta.datos.empresa}</td>
                    <td>${respuesta.datos.telefono}</td>

                `
                // Creamos el  contenedor  para los botones
                const  contenedorAcciones = document.createElement('td');   

                /** Creamos el ICONO DE EDITAR **/
                const iconoEditar =  document.createElement('i');
                iconoEditar.classList.add('fas', 'fa-pen-square');

                // Creamos el ENLACE para editar
                const btnEditar = document.createElement('a');
                btnEditar.appendChild(iconoEditar);
                btnEditar.href = `editar.php?id=${respuesta.datos.id_insertado}`; //Forma 1 de agragar atributos al nodo
                btnEditar.classList.add('btn-editar', 'btn');

                // Agregamos el nodo al padre
                contenedorAcciones.appendChild(btnEditar);

                /** Creamos el ICONO DE ELIMINAR **/
                const iconoEliminar  =  document.createElement('i');
                iconoEliminar.classList.add('fas', 'fa-trash-alt');

                // Creamos el BOTON para eliminar
                const btnEliminar = document.createElement('button');
               
                btnEliminar.appendChild(iconoEliminar);
                btnEliminar.setAttribute('data-id', respuesta.datos.id_insertado); //Forma 2 de agragar atributos al nodo
                btnEliminar.classList.add('btn', 'btn-borrar')

                // Agregamos el nodo al padre
                contenedorAcciones.appendChild(btnEliminar);

                
                /** Agregamos los dos nodos HTML creados al <tr> **/
                nuevoContacto.appendChild(contenedorAcciones);
                
                /** Agregamos el contacto a la Lista de Contactos **/
                listadoContactos.appendChild(nuevoContacto);

                // Reseteamos el Formulario
                document.querySelector('form').reset();

                // Mostramos la notificacion de Registro Creado
                mostrarNotificacion('Contacto Creado Correctamente', 'correcto');


            }
        }
    // 5)Enviar los datos
        xhr.send(datos);



}

// Eliminacion de Registros
function eliminarContacto(e){ // El parametro "e", nos reportará a que elemento se le dio Click
    // Creamos una condicional para saber si se hizo click en el elemento esperamos
    // e: Contiene el dato del nodo seleccionado
    // .target: Nos mostrará el nodo seleccionado
    // .parentElement: Nos mostrará el padre del nodo seleccionado
    // .classList: Nos referimos a las clases que contiene el nodo seleccionado
    // .contains: Devuelve TRUE si la clase que pasamos como parametro se encuentra en el nodo seleccionado, y retornará FALSE si no se encuentra
    if(e.target.parentElement.classList.contains('btn-borrar')){
        // Tomamos el ID
        //.getAttribute: Nos devuelve el valor del atributo del nodo seleccionado.
        const id = e.target.parentElement.getAttribute('data-id');
        
        // Pregunta al usuario
        const respuesta = confirm('Estas Seguro/a ?');

        if(respuesta){
            //1)Llamado a AJAX

            //2)Creamos el objeto
                const xhr = new XMLHttpRequest();

            //3)Abrimos la conexion
                xhr.open('GET', `inc/modelos/modelo-contactos.php?id=${id}&accion=borrar`, true);

            //4)Leemos la respuesta
                xhr.onload = function(){
                    if(this.status === 200){
                        const resultado = JSON.parse(xhr.responseText);

                        console.log(resultado);
                    }
                }
            //5)Enviamos la peticion
                xhr.send();
        }
    }
}


//Notificacion en pantalla
function mostrarNotificacion(mensaje,clase){
    // Creamos el nodo
    const notificacion = document.createElement('div');
    // Le insertamos una clase al nodo
    notificacion.classList.add(clase,'notificacion','sombra');
    // Le insertamos texto al nodo
    notificacion.textContent = mensaje;

    // Insertamos el nodo creado antes del Legend
    formularioContactos.insertBefore(notificacion, document.querySelector('form legend'));

    // Ejecutamos la funcion en un intervalo de tiempo de 100milisegundos
    setTimeout(() => {
        // Agregamos una clase al nodo para Mostrarlo
        notificacion.classList.add('visible');

        // Ejecutamos la funcion en un intervalo de tiempo de 3 segundos
        setTimeout(() => {
            // Quitamos la clase del nodo
            notificacion.classList.remove('visible');
            
            setTimeout(() => {
                // Eliminamos el nodo
                notificacion.remove();
            },500)

        }, 3000)

    },100)
}