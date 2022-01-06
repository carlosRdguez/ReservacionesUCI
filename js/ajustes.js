(function (){

    var agregarChofer = function() {
        // Adquiriendo entradas
        var nombre = document.getElementById('nombre_input'),
            ci = document.getElementById('ci_input'),
            licencia = document.getElementById('licencia_input');
        // Peticion ajax
        var peticionNuevoChofer = new XMLHttpRequest();
		peticionNuevoChofer.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
                // Recargar pagina
                location.reload();
                /*

                No necesario

                // Actualizar tabla
                var tabla = document.getElementById('tablaChoferes');
                tabla.innerHTML = tabla.innerHTML + this.responseText;
                */
            }
        }
        peticionNuevoChofer.open('GET', 'php/ajustesServidor.php?accion=agregarChofer&nombre='+nombre.value+'&ci='+ci.value+'&licencia='+licencia.value, true);
        peticionNuevoChofer.send();

    };
    // slot para agregar una nueva tarifa
    var agregarTarifa = function() {
        // Adquiriendo entradas
        var destino = document.getElementById('destino_input'),
            precio = document.getElementById('precio_input');
        // Peticion ajax
        var peticionNuevaTarifa = new XMLHttpRequest();
		peticionNuevaTarifa.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
                location.reload();
                /*

                No necesario
                // Actualizar tabla
                var tabla = document.getElementById('tablaTarifas');
                tabla.innerHTML = tabla.innerHTML + this.responseText;
                */
            }
        }
        peticionNuevaTarifa.open('GET', 'php/ajustesServidor.php?accion=agregarTarifa&destino='+destino.value+'&precio='+precio.value, true);
        peticionNuevaTarifa.send();
    };

    // cargar los datos de la tabla de tarifas
    function cargarDatosTarifas() {
        var peticionCargarDatosTarifas = new XMLHttpRequest();
		peticionCargarDatosTarifas.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tablaTarifas').innerHTML = this.response;
			}
		};
		peticionCargarDatosTarifas.open("GET", "php/ajustesServidor.php?accion=cargarDatosTarifas", true);
		peticionCargarDatosTarifas.send();
    }

    // cargar los datos de la tabla de choferes
    function cargarDatosChoferes() {
		// esta peticion retornara los datos de la tabla de reservaciones realizadas en el primer semestre
		var peticionCargarDatosChoferes = new XMLHttpRequest();
		peticionCargarDatosChoferes.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tablaChoferes').innerHTML = this.response;
			}
		};
		peticionCargarDatosChoferes.open("GET", "php/ajustesServidor.php?accion=cargarDatosChoferes", true);
		peticionCargarDatosChoferes.send();
	}
    // Los slots de cambio de alguno de los componentes de la tabla se encuentran definidos 'in situ' en ajustes.php


















    // Agregando eventListeners
    document.getElementById('agregar_button').addEventListener('click', agregarChofer);
    document.getElementById('agregarTarifa_button').addEventListener('click', agregarTarifa);

    cargarDatosTarifas();
    cargarDatosChoferes();

}());