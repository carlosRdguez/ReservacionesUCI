// Funcion autoinvocada
(function () {
	// SLOT del boton de reservacion
	var reservar_buttonSLOT = function () {
		// Adquiriendo datos del formulario
		var nombre = document.getElementById('nombre_input'),
			ci = document.getElementById('ci_input'),
			fecha = document.getElementById('fecha_input'),
			facultad = document.getElementById('facultad_input'),
			asignatura = document.getElementById('asignatura_input'),
			destino = document.getElementById('destino_select');
		// Peticion Ajax para efectuar reservacion en la base de datos	
		var peticionEfectuarReservacion = new XMLHttpRequest();
		peticionEfectuarReservacion.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// si hubieron errores
				if(this.responseText == "Sin capacidades") {
					alert('No hay capacidades para la Fecha escogida.');
				}
				else if(this.responseText == "Error de insercion en la base de datos.") {
					alert('Eror de insercion en la base de datos, pruebe de nuevo.');
					// Recargar pagina
					location.reload();
				}
				else if(this.responseText != "Campo faltante" && this.responseText != "Error de insercion en la base de datos." && this.responseText != "Error en la actualizacion de viajes") {
					// Recargar pagina
					location.reload();
					/*

					No es necesario ya que se recarga la pagina

					// Actualizar tabla
					fechaActual = new Date();
					// anno actual del sistema
					annoActual = fechaActual.getFullYear();
					fechaJS = new Date(fecha.textContent);
					// anno seleccionado para viajar
					year = fechaJS.getFullYear();
					// mes seleccionado para viajar

					// Determinar semestre

					month = fechaJS.getMonth() + 1;
					if(year == annoActual) {
						if(month == 10 || month == 11 || month == 12) {
							var tabla = document.getElementById('tabla_semestre_1');
						}
					}
					if(year == annoActual+1) {
						if(month == 1 || month == 2) {
							var tabla = document.getElementById('tabla_semestre_1');
						}
						else if(month == 3 || month == 4 || month == 5 || month == 6 || month == 7) {
							var tabla = document.getElementById('tabla_semestre_2');
						}
					}
					tabla.innerHTML = tabla.innerHTML + this.responseText;

					*/
					// Limpiar elementos de reservacion
					fecha.innerHTML = "Fecha";
					destino.selectedIndex = 0;
					nombre.value = "";
					ci.value = "";
					facultad.value = "";
					asignatura.value = "";
					document.getElementById('capacidad_disponible').innerHTML = "";
				}				
				
			}
		}
		var fechaJS = new Date(fecha.textContent);
		var fechaFormatoSQL = "";
		fechaFormatoSQL += fechaJS.getFullYear().toString() + "-";
		if(fechaJS.getMonth()+1 < 10) {
			fechaFormatoSQL += "0" + (fechaJS.getMonth()+1).toString() + "-";
		}
		else {
			fechaFormatoSQL += (fechaJS.getMonth()+1).toString() + "-";
		}
		if(fechaJS.getDate() < 10) {
			fechaFormatoSQL += "0" + fechaJS.getDate().toString();
		}
		else {
			fechaFormatoSQL += fechaJS.getDate().toString();
		}
		peticionEfectuarReservacion.open('GET', 'php/reservacionesServidor.php?accion=efectuarReservacion&nombre=' + nombre.value + '&ci=' + ci.value + '&fecha=' + fechaFormatoSQL + '&facultad=' + facultad.value + '&asignatura=' + asignatura.value + '&destino=' + destino.value, true);
		peticionEfectuarReservacion.send();
	};
	function comprobarCapacidades(fecha) {
		var peticionCapacidades = new XMLHttpRequest();
		peticionCapacidades.onreadystatechange = function() {
			if(peticionCapacidades.readyState == 4 && this.status == 200) {
				// si la respuesta del servidor es verdadera
				var zonaMensajeCapacidadDisponible = document.getElementById('capacidad_disponible');
				if(this.responseText == "1") {
					// mensaje de informacion con capacidades disponibles
					zonaMensajeCapacidadDisponible.innerHTML = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">" +
					"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">" +
					"<span aria-hidden=\"true\">×</span>" +
					"</button>" +
					"<div class=\"alert-message\">" +
					"<strong>Capacidad disponible para la fecha seleccionada.</strong>" +
					"</div>";
					// bloquear boton de reserva
					document.getElementById('reservar_button').removeAttribute('disabled', '');
				}
				// la respuesta del servidor es falsa
				else if(this.responseText == "0"){
					// mensaje de informacion sin capacidades
					zonaMensajeCapacidadDisponible.innerHTML = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">" +
					"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">" +
					"<span aria-hidden=\"true\">×</span>" +
					"</button>" +
					"<div class=\"alert-message\">" +
					"<strong>No existen capacidades para la fecha seleccionada.</strong>" +
					"</div>";
					// bloquear boton de reserva
					document.getElementById('reservar_button').setAttribute('disabled', '');
				}
				// el servidor arrojo otra respuesta
				else {
					// mensaje de informacion sin capacidades
					zonaMensajeCapacidadDisponible.innerHTML = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">" +
					"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">" +
					"<span aria-hidden=\"true\">×</span>" +
					"</button>" +
					"<div class=\"alert-message\">" +
					"<strong>No existen capacidades para la fecha seleccionada.</strong>" +
					"</div>";
					// bloquear boton de reserva
					document.getElementById('reservar_button').setAttribute('disabled', '');
				}
			}
		}
		peticionCapacidades.open("GET", "php/reservacionesServidor.php?accion=comprobarCapacidades&fecha="+fecha, true);
		peticionCapacidades.send();
	}
	// Elimina un elemento que genera un comportamiento no deseado en el calendario
	var eliminarCalendarioExtra = function () {
		document.getElementsByClassName('flatpickr-calendar')[1].innerHTML = "";
	}
	// SLOT del boton de seleccion de fecha de la reservacion
	var actualizarFecha = function () {
		// obteniendo fecha
		var fechaString = document.getElementsByClassName('flatpickr-calendar')[0].getElementsByClassName('selected')[0].getAttribute('aria-label');
		document.getElementById('fecha_input').innerHTML = fechaString;
		comprobarCapacidades(fechaString);
	}
	// Carga los datos de la pagina desde la base de datos
	function cargarDatosSemI() {
		// esta peticion retornara los datos de la tabla de reservaciones realizadas en el primer semestre
		var peticionCargarTablaSemestreI = new XMLHttpRequest();
		peticionCargarTablaSemestreI.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tabla_semestre_1').innerHTML = document.getElementById('tabla_semestre_1').innerHTML + this.responseText;
			}
		};
		var fecha = new Date();
		year = fecha.getFullYear();
		month = fecha.getMonth() + 1;
		// Determinar anno de inicio del semestre (al servidor solo se envia el anno de comienzo del semestre)
		// El inicio de curso fue el anno pasado
		if(month == 1 || month == 2 || month == 3 || month == 4 || month == 5 || month == 6 || month == 7) {
			year -= 1;
		}
		peticionCargarTablaSemestreI.open("GET", "php/reservacionesServidor.php?accion=cargarDatosSemI&year="+year.toString(), true);
		peticionCargarTablaSemestreI.send();
	}
	function cargarDatosSemII() {
		// esta peticion retornara los datos de la tabla de reservaciones realizadas en el primer semestre
		var peticionCargarTablaSemestreII = new XMLHttpRequest();
		peticionCargarTablaSemestreII.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('tabla_semestre_2').innerHTML = document.getElementById('tabla_semestre_2').innerHTML + this.responseText;
			}
		};
		var fecha = new Date();
		year = fecha.getFullYear();
		month = fecha.getMonth() + 1;
		// Determinar anno de inicio del semestre (al servidor solo se envia el anno de comienzo del semestre)
		// El inicio de curso fue el anno pasado
		if(month == 1 || month == 2 || month == 3 || month == 4 || month == 5 || month == 6 || month == 7) {
			year -= 1;
		}
		peticionCargarTablaSemestreII.open("GET", "php/reservacionesServidor.php?accion=cargarDatosSemII&year="+year.toString(), true);
		peticionCargarTablaSemestreII.send();
	}
	function cargarListaDestinos() {
		var peticionLista = new XMLHttpRequest();
		peticionLista.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				document.getElementById('destino_select').innerHTML = this.response;
			}
		}
		peticionLista.open("GET", "php/reservacionesServidor.php?accion=cargarListaDestinos", true);
		peticionLista.send();
	}
	function profesoresFacultadLista() {
		var peticionprofesoresFacultadLista = new XMLHttpRequest();
		peticionprofesoresFacultadLista.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				// Disponer datos en la pagina
				// actualizando grafico

				document.getElementById('profesoresFacultadLista').innerHTML = this.response;
				newLabels = [];
				newData = [];
				for(i=0; i < document.getElementById('profesoresFacultadLista').childElementCount; i++) {
					newLabels[i] = document.getElementById('profesoresFacultadLista').childNodes[i].childNodes[0].textContent;
					newData[i] = document.getElementById('profesoresFacultadLista').childNodes[i].childNodes[1].textContent;
				}
				new Chart(document.getElementById("chartjs-dashboard-pie"), {
					type: "pie",
					data: {
						labels: newLabels,
						datasets: [{
							data: newData,
							backgroundColor: [
								window.theme.primary,
								"#6f42c1",
								window.theme.danger,
								window.theme.warning,
								window.theme.success,
								"#112345"
							],
							borderWidth: 5
						}]
					},
					options: {
						responsive: !window.MSInputMethodContext,
						maintainAspectRatio: false,
						legend: {
							display: false
						},
						cutoutPercentage: 75
					}
				});
			}
		}
		peticionprofesoresFacultadLista.open("GET", "php/reservacionesServidor.php?accion=profesoresFacultad", true);
		peticionprofesoresFacultadLista.send();
	}
	function listaProfesores() {
		var peticionlistaProfesores = new XMLHttpRequest();
		peticionlistaProfesores.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById('listaProfesores').innerHTML = this.responseText;
			}
		}
		peticionlistaProfesores.open('GET', 'php/reservacionesServidor.php?accion=listaProfesores', true);
		peticionlistaProfesores.send();
	}

	// Event Listener de los elementos de la pagina
	document.getElementById('reservar_button').addEventListener('click', reservar_buttonSLOT);
	document.getElementById('guardar_fecha_button').addEventListener('click', actualizarFecha);
	document.getElementById('fecha_input').addEventListener('click', eliminarCalendarioExtra);



	// Cargando los datos de base de datos de la pagina
	cargarDatosSemI();
	cargarDatosSemII();
	cargarListaDestinos();
	listaProfesoresCantidadViajes(document.getElementById('cantidadViajes_input'));
	profesoresFacultadLista();
	listaProfesores();
}());