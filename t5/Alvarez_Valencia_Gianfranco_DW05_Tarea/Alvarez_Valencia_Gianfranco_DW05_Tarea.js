// Función para inciar el programa al cargar la página.
function iniciar()
{
	// Para acceder a la tabla para seleccionar la paleta de colores.
	var paleta = document.getElementById("paleta");
	// Elementos de la paleta, td
	var elementosPaleta = paleta.getElementsByTagName("td");
	// Asignar eventos a paleta -> -1 para no entrar estado del pincel.
	for (var i = 0;i < elementosPaleta.length -1;i++)
	{
		crearEvento(elementosPaleta[i],"click",elegirColor);// en cada elmento de la paleta cuando se clicka- -> elegir color
	}
	// Inicializar color.
	colorPintar = elementosPaleta[0].classList[0];
	// Crear tabla para hacer el dibujo.
	crearTabla();
	// Para acceder a ala tabla en la que se pinta e dibujo.
	var tabla = document.getElementById("tabla");
	// Elementos de la tabla dibujo.
	var elementosTabla = tabla.getElementsByTagName("td");
	// Asignar eventos a tabla.
	for (var i = 0;i < elementosTabla.length;i++)
	{
		// Crear evento al clickar en la tabla para cambiar el estado del pincel.
		crearEvento(elementosTabla[i],"click",estadoPincel);
		// Crear evento al mover ratón sobre la tabla para pintar.
		crearEvento(elementosTabla[i],"mouseover",pintar);
	}
}

// Función para elegir el color del dibujo.
function elegirColor()
{
	// Del TD clickado ir al padre y de los hijos de este quitar la clase seleccionado por si hubiera estado seleccionada antes.
	for (var i = 0; i < this.parentNode.childNodes.length;i++)
	{	
		this.parentNode.childNodes[i].classList.remove("seleccionado");
	}
	// Color seleccionado será la primera clase del campo clickado.
	colorPintar = this.classList[0];
	// Añadir la clase seleccionado al elemento de la tabla clickado.
	this.classList.add("seleccionado");	
	//alert(colorPintar);
}

// Función para cambiar el estado del pincel cada vez que se haga click en la tabla de dibujo.
function estadoPincel()
{
	if (estadoPintar == true)
	{
		// Cambiar a pincel descativado.
		document.getElementById("pincel").childNodes[0].nodeValue = "PINCEL DESACTIVADO...";
		estadoPintar = false;
		//alert(estadoPintar);
	}
	else
	{
		// Cambiar a pincel activado.
		document.getElementById("pincel").childNodes[0].nodeValue = "PINCEL ACTIVADO...";
		estadoPintar = true;
		//alert(estadoPintar);
	}
	// Pintar la casilla clickada.
	this.classList.add(colorPintar);
}

// Función para pintar cuando el estado del pincel esta ON y se mueve el ratón.

function pintar ()
{
	if (estadoPintar == true)
	{
		// Quitar clase si tuviera.
		this.classList.remove(this.classList[0]);
		// Añadir clase para pintar.
		this.classList.add(colorPintar);
	}		
}

// Crear evento con crossover. Función tería del tema.

var crearEvento = function()
{
	function w3c_crearEvento(elemento, evento, mifuncion)
	{
		elemento.addEventListener(evento, mifuncion, false);
	}
	
	function ie_crearEvento(elemento, evento, mifuncion)
	{
		var fx = function()
		{
			mifuncion.call(elemento); 
		};
		
		elemento.attachEvent('on' + evento, fx);
	}

	if (typeof window.addEventListener !== 'undefined')
	{
		return w3c_crearEvento;
	}
	else if (typeof window.attachEvent !== 'undefined')
	{
		return ie_crearEvento;
	}
}();

// Función para crear la tabla sobre la que se "pintará".
function crearTabla()
{
	// Crear y definir tabla.
	var addTabla = document.createElement("table");
	addTabla.setAttribute("border","1");
	// id para la tabla->tabla
	addTabla.setAttribute("id","tabla");
	addTabla.setAttribute("class","tablerodibujo");
	// Caption 
	var tituloTabla = document.createElement("caption");
	// Crear nodo texto para el caption.
	var textoTitulo = document.createTextNode("Haga CLICK en cualquier celda para activar/desactivar el Pincel");
	// Agregar
	tituloTabla.appendChild(textoTitulo);
	addTabla.appendChild(tituloTabla);
	
	// Bucle para crear la tabla.
	for (var i = 0; i < 30; i++)
	{
		var fila = document.createElement("tr");
		for (var j = 0;j < 30;j++)
		{
			var elementoTabla = document.createElement("td");
			fila.appendChild(elementoTabla);
		}
		addTabla.appendChild(fila);
	}
	// Meter la tabla dentro del DIV zonadibujo.
	document.getElementById("zonadibujo").appendChild(addTabla);
}
// Para saber el color a pintar.
colorPintar = " ";
// Para saber el estado del pincel.
estadoPintar = false;
// Inicio del programa.
window.onload = iniciar;
