function validarNumero(numeroString){
    let numero = parseInt(numeroString);
    if (numero.toString() === numeroString){
        return true;
    }
    return false;
}

function longitud(numero){
    if (numero.length === 8)
        return true;
    return false;
}

function calcularLetraDNI(){
    const letraDNI='TRWAGMYFPDXBNJZSQVHLCKET';
    let dni = document.getElementById('numerodni').value.toString();
    if (!validarNumero(dni)){
        let mensaje = document.getElementById('mensaje');
        mensaje.innerHTML='El DNI ' + dni + ' no es un número';
        return;
    }
    if (!longitud(dni)){
        let mensaje = document.getElementById('mensaje');
        mensaje.innerHTML='El DNI ' + dni + ' es un número, pero no tiene 8 dígitos';
        return;
    }
    // Calculamos el resto
    let resto = dni%23;
    let letra = letraDNI.substring(resto, resto+1);
    let mensaje = document.getElementById('mensaje');
    mensaje.innerHTML='El DNI ' + dni + ' tiene como letra: ' + letra;
    return;


}