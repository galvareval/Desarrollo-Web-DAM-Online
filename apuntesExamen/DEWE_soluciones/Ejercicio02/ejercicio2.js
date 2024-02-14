cconst meses = [ 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SETIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
const diaSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
function determinarFecha(){
    const fecha = new Date(document.getElementById('fecha').value);
    let dia = diaSemana[fecha.getDay()-1].toLowerCase();
    let diaMes = fecha.getDate();
    let mes = meses[fecha.getMonth()-1].toLowerCase();
    txtMensaje = 'El ' + diaMes + ' de ' + mes + ' de ' + fecha.getFullYear() +'. Fue '+ dia; 
    let mensaje = document.getElementById('mensaje');
    mensaje.innerHTML = txtMensaje;
}