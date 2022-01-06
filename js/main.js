// Funcion autoinvocada
(function(){

	var reservacion = function() {
		var tabla;
		// comprobar fecha
		if(true) {
			tabla =  document.getElementById('tabla_semestre_1');
		}
		else {
			tabla =  document.getElementById('tabla_semestre_2');
		}
		var nombre = document.getElementById('nombre_input'),
			ci =  document.getElementById('ci_input'),
			fecha = document.getElementById('fecha_input'),
			facultad = document.getElementById('facultad_input'),
			asignatura = document.getElementById('asignatura_input'),
			destino = document.getElementById('destino_select');
		tabla.innerHTML = tabla.innerHTML +
							   "<tr>"+
									"<td class=\"text-left\">"+nombre.value+"</td>"+
									"<td class=\"text-right\">"+fecha.innerHTML+"</td>"+
									"<td class=\"text-right\">"+destino.value+"</td>"+
								"</tr>";
		fecha.innerHTML = "Fecha";
		destino.selectedIndex = 0;
		nombre.value = "";
		ci.value = "";
		facultad.value = "";
		asignatura.value = "";
		document.getElementById('capacidad_disponible').innerHTML = "";
	};

	var comprobarCapacidades = function() {
		var zonaMensajeCapacidadDisponible = document.getElementById('capacidad_disponible');
		// capacidades disponibles
		if(true) {
			zonaMensajeCapacidadDisponible.innerHTML = "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">"+
													"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"+
								               			 "<span aria-hidden=\"true\">×</span>"+
								             		"</button>"+
													"<div class=\"alert-message\">"+
														"<strong>Capacidad disponible para la fecha seleccionada.</strong>"+
													"</div>";
		}
		else {
			zonaMensajeCapacidadDisponible.innerHTML = "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">"+
													"<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">"+
								               			 "<span aria-hidden=\"true\">×</span>"+
								             		"</button>"+
													"<div class=\"alert-message\">"+
														"<strong>No existen capacidades para la fecha seleccionada.</strong>"+
													"</div>";
		}
	};

	var eliminarCalendarioExtra = function() {
		document.getElementsByClassName('flatpickr-calendar')[1].innerHTML = "";
	}

	var actualizarFecha = function() {
		// obteniendo fecha
		var fechaString = document.getElementsByClassName('flatpickr-calendar')[0].getElementsByClassName('selected')[0].getAttribute('aria-label');
		var fecha = document.getElementById('fecha_input');
		fecha.innerHTML = fechaString;
		comprobarCapacidades();
	}
	document.getElementById('reservar_button').addEventListener('click', reservacion);
	document.getElementById('fecha_input').addEventListener('click', eliminarCalendarioExtra);
	document.getElementById('guardar_fecha_button').addEventListener('click', actualizarFecha);
}());