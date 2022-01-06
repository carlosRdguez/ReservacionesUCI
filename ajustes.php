<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png">

	<title>Sistema de reservaciones UCI</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body style="" class="">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar" data-simplebar="init">
				<div class="simplebar-wrapper" style="margin: 0px;">
					<div class="simplebar-height-auto-observer-wrapper">
						<div class="simplebar-height-auto-observer"></div>
					</div>
					<div class="simplebar-mask">
						<div class="simplebar-offset" style="right: 0px; bottom: 0px;">
							<div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
								<div class="simplebar-content" style="padding: 0px;">
									<a class="sidebar-brand" href="index.php">
										<span class="align-middle">Reservaciones UCI</span>
									</a>

									<ul class="sidebar-nav">
										<li class="sidebar-header">
											Páginas
										</li>

										<li class="sidebar-item">
											<a class="sidebar-link" href="index.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-middle mr-2">
													<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
												</svg> <span class="align-middle">Indicadores</span>
											</a>
										</li>

										<li class="sidebar-item">
											<a class="sidebar-link" href="reservaciones.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check align-middle mr-2">
													<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
													<circle cx="8.5" cy="7" r="4"></circle>
													<polyline points="17 11 19 13 23 9"></polyline>
												</svg> <span class="align-middle">Reservaciones</span>
											</a>
										</li>
										<li class="sidebar-item">
											<a class="sidebar-link" href="viajes.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map align-middle">
													<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
													<line x1="8" y1="2" x2="8" y2="18"></line>
													<line x1="16" y1="6" x2="16" y2="22"></line>
												</svg><span class="align-middle">Viajes</span>
											</a>
										</li>

										<li class="sidebar-item active">
											<a class="sidebar-link" href="ajustes.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle mr-1">
													<circle cx="12" cy="12" r="3"></circle>
													<path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
												</svg> <span class="align-middle">Ajustes</span>
											</a>
										</li>


									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="simplebar-placeholder" style="width: 260px; height: 481px;"></div>
				</div>
				<div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
					<div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
				</div>
				<div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
					<div class="simplebar-scrollbar" style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
				</div>
			</div>
		</nav>

		<div class="main">
			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Ajustes</h1>

					<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">


								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-toggle="list" href="#tarifas" role="tab" aria-selected="true">
										Tarifas
									</a>
									<a id="botonChofers" class="list-group-item list-group-item-action" data-toggle="list" href="#choferes" role="tab" aria-selected="false">
										Choferes
									</a>

								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade active show" id="tarifas" role="tabpanel">
									<div class="card">
										<div class="card-header">
											<h2 class="card-title mb-0 h2">Lista de tarifas</h2>
										</div>
										<div class="card-body">
											<table class="table">
												<thead>
													<tr>
														<th style="width:40%;">Destino</th>
														<th style="width:25%">Precio</th>
													</tr>
												</thead>
												<tbody>
												<tbody id="tablaTarifas">
													<script>
														function peticion(url){
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText != "ok") {
																		alert('Algo salio mal.');
																	}
																	else {
																		location.reload();
																	}
																}
															}
															peticionModificar.open('GET', url, true);
															peticionModificar.send();
														};
														// slot para un nombre cambiado
														function destinoChanged(event) {
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText == "ok") {
																		// cargar ventana
																		location.reload();
																	}
																	else {
																		alert('Algo salio mal.');
																	}
																}
															}
															peticionModificar.open('GET', 'php/ajustesServidor.php?accion=modificarDestino&destino='+event.value+'&fila='+event.getAttribute('fila'), true);
															peticionModificar.send();
														};
														// slot para un ci cambiado
														function precioChanged(event) {
															peticion('php/ajustesServidor.php?accion=modificarPrecio&precio='+event.value+'&fila='+event.getAttribute('fila'));
														};
														// slot para eliminar una tarifa
														function borrarTarifa(event) {
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText == "ok") {
																		// eliminar elementos de la pagina
																		document.getElementById('fila'+event.getAttribute('fila')).remove();
																	}
																	else {
																		alert('Algo salio mal.');
																	}
																}
															}
															peticionModificar.open('GET', 'php/ajustesServidor.php?accion=eliminarTarifa&fila='+event.getAttribute('fila'), true);
															peticionModificar.send();
														};
													</script>
												</tbody>
											</table>
											<div class="mb-0">
												<button id="agregar_chofer_button" type="button" class="btn btn-success" data-toggle="modal" data-target="#defaultModalSuccess">
													Agregar tarifa
												</button>
												<div class="modal fade" id="defaultModalSuccess" tabindex="-1" style="display: none;" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Datos de la nueva tarifa</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
															</div>
															<div class="modal-body m-3">
																<div class="row">
																	<div class="col-md-9">
																		<input id="destino_input" type="text" class="form-control" placeholder="Destino">
																	</div>
																	<div class="col-md-3">
																    	<div class="input-group mb-2 mr-sm-2">
																			<div class="input-group-text">$</div>
																			<input id="precio_input" type="ztext" class="form-control" placeholder="Precio">
																		</div>	
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
																<button id="agregarTarifa_button" type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="choferes" role="tabpanel">
									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Lista de choferes</h5>
										</div>

										<div class="card-body">
											<table class="table">
												<thead>
													<tr>
														<th style="width:50%;">Nombre</th>
														<th style="width:25%">Carné de identidad</th>
														<th style="width:25%">Licencia</th>
													</tr>
												</thead>
												<tbody id="tablaChoferes">
													<script>
														function peticion(url){
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText != "ok") {
																		alert('Algo salio mal.');
																	}
																	else {
																		
																	}
																}
															}
															peticionModificar.open('GET', url, true);
															peticionModificar.send();
														};
														// slot para un nombre cambiado
														function nombreChanged(event) {
															peticion('php/ajustesServidor.php?accion=modificarNombre&nombre='+event.value+'&fila='+event.getAttribute('fila'));
														};
														// slot para un ci cambiado
														function ciChanged(event) {
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText == "ok") {
																		// cargar ventana
																		location.reload();
																	}
																	else {
																		alert('Algo salio mal.');
																	}
																}
															}
															peticionModificar.open('GET', 'php/ajustesServidor.php?accion=modificarCi&ci='+event.value+'&fila='+event.getAttribute('fila'), true);
															peticionModificar.send();
														};
														// slot para una licencia cambiada
														function licenciaChanged(event) {
															peticion('php/ajustesServidor.php?accion=modificarLicencia&licencia='+event.value+'&fila='+event.getAttribute('fila'));
														};
														// slot para eliminar un chofer
														function borrarChofer(event) {
															var peticionModificar = new XMLHttpRequest();
															peticionModificar.onreadystatechange = function() {
																if(this.readyState == 4 && this.status == 200) {
																	// Todo ok
																	if(this.responseText == "ok") {
																		// eliminar elementos de la pagina
																		document.getElementById('fila'+event.getAttribute('fila')).remove();
																	}
																	else {
																		alert('Algo salio mal.');
																	}
																}
															}
															peticionModificar.open('GET', 'php/ajustesServidor.php?accion=eliminarChofer&fila='+event.getAttribute('fila'), true);
															peticionModificar.send();
														};
													</script>
												</tbody>
											</table>

											<div class="mb-0">
												<button id="agregar_chofer_button" type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarChofer">
													Agregar chofer
												</button>
												<div class="modal fade" id="agregarChofer" tabindex="-1" style="display: none;" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title">Datos del nuevo chofer</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">×</span>
																</button>
															</div>
															<div class="modal-body m-3">
																<div class="row">
																	<div class="col-md-6">
																		<input id="nombre_input" type="text" class="form-control" placeholder="Nombre">
																	</div>
																	<div class="col-md-3">
																		<input id="ci_input" type="text" class="form-control" placeholder="CI">
																	</div>
																	<div class="col-md-3">
																		<input id="licencia_input" type="text" class="form-control" placeholder="No. Licencia">
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
																<button id="agregar_button" type="button" class="btn btn-success" data-dismiss="modal">Agregar</button>
															</div>
														</div>
													</div>
												</div>
											</div>
											

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>Sistema de Reservaciones UCI</strong></a> ©
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Soporte</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Ayuda</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacidad</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Términos</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="js/app.js"></script>
	<script src="js/ajustes.js"></script>


</body>

</html>