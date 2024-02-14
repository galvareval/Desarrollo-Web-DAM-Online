function validarNumero(numeroString){
        alert(numeroString);
	dniInt = parseInt(numeroString);//obtener num entero dni
	campoMensaje = document.getElementById("mensaje");
	var resultado = false;
        alert(dniInt);
	if (isNaN(dniInt)==true)// EL dato leido no es un número
		{
                        alert('no es un numero');
			campoMensaje.innerHTML = "El dni " + numeroString + " no es un número";
			resultado = false;
		}
	else
	{
		if(longitud(dniInt) == false)
		{
			campoMensaje.innerHTML = "Es un número pero la longitud no es 8";
			resultado = false;
		}
		else
		{
			campoMensaje.innerHTML = "Validación correcta";
			resultado = true;
		}
	}
	return resultado;
}

function longitud(numero){
	if (numero.toString().length == 8)
		return true;
	else
		return false;

}

function calcularLetraDNI(){
    const letraDNI='TRWAGMYFPDXBNJZSQVHLCKET';
    var dni = document.getElementById("numerodni").value;
	if (validarNumero(dni) == true) // Los datos del dni son correctos
	{
		restoDni = parseInt(dni) % 23;
		campoMensaje = document.getElementById("mensaje");
		campoMensaje.innerHTML = "La letra es :" + letraDNI[restoDni];
	}
}