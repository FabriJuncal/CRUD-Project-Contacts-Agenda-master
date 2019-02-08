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
        console.log('Tiene algo')
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