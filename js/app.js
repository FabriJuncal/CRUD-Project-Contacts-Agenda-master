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
        console.log('Los campos estan vacio')
    }else{
        console.log('Tiene algo')
    }
}