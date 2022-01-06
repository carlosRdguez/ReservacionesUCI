(function(){
    
    // Adquiere y muestra los datos de la base de datos en la pagina para la tabla con la lista de viajes
    function cargarDatosListaViajes(){
        var peticionCargarDatosViajes = new XMLHttpRequest();
		peticionCargarDatosViajes.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tablaViajes').innerHTML = this.response;
			}
		};
		peticionCargarDatosViajes.open("GET", "php/viajesServidor.php?accion=cargarDatosListaViajes", true);
		peticionCargarDatosViajes.send();
    }
    // Adquiere y muestra los datos de la base de datos en la pagina para la tabla con la lista de viajes por choferes
    function cargarDatosViajesChoferes() {
        var peticioncargarDatosViajesChoferes = new XMLHttpRequest();
		peticioncargarDatosViajesChoferes.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tablaViajesChoferes').innerHTML = this.response;
			}
		};
		peticioncargarDatosViajesChoferes.open("GET", "php/viajesServidor.php?accion=cargarDatosViajesChoferes", true);
		peticioncargarDatosViajesChoferes.send();
    }

    // Agregando event Listeners
    
    // Cargando informacion de la pagina desde la base de datos
    cargarDatosListaViajes();
    cargarDatosViajesChoferes();

}());