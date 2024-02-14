function validarNumero(numeroString){
    if (isNaN(numeroString)){
        return false;
    }
    return true;

}

function calcularNumeroRaices(a, b, c){
    let discriminante = b*b-4*a*c;
    if (discriminante < 0 )
        return 0;
    if (discriminante === 0 )
        return 1;
    if (discriminante > 0 )
        return 2;
}

function raiz1(a,b,c){
    console.log('Coeficiente ' + a + ' Coeficiente ' + b + ' Coeficiente ' + c)
    return (-b+Math.sqrt(b*b-4*a*c))/(2*a);
}

function raiz2(a,b,c){
    return (-b-Math.sqrt(b*b-4*a*c))/(2*a);
}

function comprobar(num,coef)
{
    var resultado =false;
    if(validarNumero(num)==false)
        {
            campoMensaje.innerHTML = "El coeficiente " + coef + " no es un n\u00FAmero ";
            resultado = false;
        }
    else
        if(num==0)
            {
                campoMensaje.innerHTML = "El coeficiente "+ coef + " no puede ser 0 ";
                resultado = false;
            }
        else resultado = true;
    return resultado;
}
function calcularResultado(){
    campoMensaje = document.getElementById("mensaje");//REf al campo donde dejar el resultado
    var numA = document.getElementById("a").value;
    var numB = document.getElementById("b").value;
    var numC = document.getElementById("c").value;
    //alert(numA);    
    //alert(numB);
    //alert(numC);
    /*if(validarNumero(numA)==false) //Empaquetar en función
        campoMensaje.innerHTML = "El coeficiente A no es un n\u00FAmero";
    else
        if(numA==0)
            campoMensaje.innerHTML = "El coeficiente A no puede ser 0";*/
    /*comprobar(numA,"A");
    comprobar(numB,"B");
    comprobar(numC,"C");*/
    if(comprobar(numA,"A")==true && comprobar(numB,"B")==true && comprobar(numC,"C")==true)
    {
        if(calcularNumeroRaices(numA,numB,numC) == 0)
            campoMensaje.innerHTML = "Esta ecuacin\u00F3n no tiene raices reales";
        else
            if (calcularNumeroRaices(numA,numB,numC) == 1)
                campoMensaje.innerHTML = "Esta ecuacin\u00F3n tiene ra\u00EDz doble: " + raiz1(numA,numB,numC);
            else
                campoMensaje.innerHTML = "Esta ecuacin\u00F3n tiene dos ra\u00EDces: " + "Raiz1 ==> " + raiz1(numA,numB,numC) + " Raiz2 ==> " + raiz2(numA,numB,numC);
    }
}