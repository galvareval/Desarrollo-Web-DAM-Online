//Constantes arrays para referenciar los meses y dias
const meses = [ 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SETIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
const diaSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
function determinarFecha(){
    
campoMensaje = document.getElementById("mensaje");//Localizar el cmapo mensaje
var fecha = document.getElementById("fecha").value;// obtener la fecha entera del HTML, formato aa-mm-dd
alert(fecha);
var divisionFecha = fecha.split('-');//Obtener un array mediante split con los valores de la fecha

// Desglosar fecha
var dia = divisionFecha[2]; // obtener dia, esta en la posicion 2 del array(empieza en 0)
var mes = divisionFecha[1]; //obtener mes, pos 1
var año = divisionFecha[0]; //obtener año pos 0
// crear tipo fecha para usar metodos de obtencion de dia
tipoFecha = new Date(año,mes-1,dia-1);//  hay que restar 1 para que cuadre
// El mes en Cadena se obtiene del array meses, ya sabemos la posicion del mes
// El dia se Cadena se obtiene del array diaSemana,
// usar metodos getDay() para saber que dia de la semana fue ese dia de la fecha(1-7) 
// asi tenemos una posición para buscar en el array de diaSemana
// Añadir mediante inner al campo resultado
campoMensaje.innerHTML = "El " + dia + " de " + meses[mes-1] + " de " + año + " fue " + diaSemana[tipoFecha.getDay()];	
}