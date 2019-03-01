const formularioContactos = document.querySelector('#contacto');

eventListeners();

function eventListeners(){

    // Cuando el formulario de Crear o Editar se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);
}

function leerFormulario(e){
    e.preventDefault();
    
    //Leer los datos de los inputs
    const nombre = document.querySelector('#nombre').value,
          empresa = document.querySelector('#empresa').value,
          telefono = document.querySelector('#telefono').value;
    
    if(nombre === '' || empresa === '' || telefono === ''){
        // 2 parametros: texto y clase
        mostrarNotificacion('Todos los Campos son Obligatorios', 'error'); 
    }else{
        // Pasa la validacion, crear llamado a Ajax
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
    }
}

/** Inserta en la base de datos via Ajax **/
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
            if(this.status === 200){
                // leemos la respuesta de PHP
                // Utilizamos "JSON.parse" para poder transformar los datos que obtenemos del servidor que estan en formato string a JSON
                console.log(JSON.parse(xhr.responseText));
                
                const respuesta = JSON.parce( xhr.responseText);
                console.log(respuesta)
            }
        }
    // 5)Enviar los datos
        xhr.send(datos);



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