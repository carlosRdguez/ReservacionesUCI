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
	<style type="text/css">
		/* Chart.js */
		/*
 * DOM element rendering detection
 * https://davidwalsh.name/detect-node-insertion
 */
		@keyframes chartjs-render-animation {
			from {
				opacity: 0.99;
			}

			to {
				opacity: 1;
			}
		}

		.chartjs-render-monitor {
			animation: chartjs-render-animation 0.001s;
		}

		/*
 * DOM element resizing detection
 * https://github.com/marcj/css-element-queries
 */
		.chartjs-size-monitor,
		.chartjs-size-monitor-expand,
		.chartjs-size-monitor-shrink {
			position: absolute;
			direction: ltr;
			left: 0;
			top: 0;
			right: 0;
			bottom: 0;
			overflow: hidden;
			pointer-events: none;
			visibility: hidden;
			z-index: -1;
		}

		.chartjs-size-monitor-expand>div {
			position: absolute;
			width: 1000000px;
			height: 1000000px;
			left: 0;
			top: 0;
		}

		.chartjs-size-monitor-shrink>div {
			position: absolute;
			width: 200%;
			height: 200%;
			left: 0;
			top: 0;
		}
	</style>
</head>

<body>
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
										<li class="sidebar-item active">
											<a class="sidebar-link" href="viajes.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map align-middle mr-2">
													<polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
													<line x1="8" y1="2" x2="8" y2="18"></line>
													<line x1="16" y1="6" x2="16" y2="22"></line>
												</svg><span class="align-middle">Viajes</span>
											</a>
										</li>

										<li class="sidebar-item">
											<a class="sidebar-link" href="ajustes.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle mr-2">
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

					<h1 class="h3 mb-3">Viajes</h1>
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Lista de viajes</h5>
						</div>
						<div class="card-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th style="width:15%;">Fecha</th>
										<th style="width:20%">Chofer</th>
										<th style="width:10%">Capacidades</th>
										<th style="width:10%">Ganancias</th>
										<th style="width:15%">Estado</th>
										<th style="width:5%"></th>
										<th class="d-none d-md-table-cell" style="width:5%"></th>
									</tr>
								</thead>
								<script>
									function asignarChofer(event) {
										var peticionAsignarChofer = new XMLHttpRequest();
										peticionAsignarChofer.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
												// Todo ok
												if (this.responseText == "ok") {
													// cargar ventana
												} else {
													alert('Algo salio mal.');
												}
											}
										}
										peticionAsignarChofer.open('GET', 'php/viajesServidor.php?accion=asignarChofer&chofer=' + event.value + '&fila=' + event.getAttribute('fila'), true);
										peticionAsignarChofer.send();
									}
									function asignarEstado(event) {
										var peticionAsignarEstado = new XMLHttpRequest();
										peticionAsignarEstado.onreadystatechange = function() {
											if (this.readyState == 4 && this.status == 200) {
												// Todo ok
												if (this.responseText == "ok") {
													// cargar ventana
												} else {
													alert('Algo salio mal.');
												}
											}
										}
										peticionAsignarEstado.open('GET', 'php/viajesServidor.php?accion=asignarEstado&estado=' + event.value + '&fila=' + event.getAttribute('fila'), true);
										peticionAsignarEstado.send();
									}
								</script>
								<tbody id="tablaViajes">

								</tbody>
							</table>
							<script>
								// solicita la informacion para la lista de pasajeros de este viaje agrupados por destino
								function listaPasajerosPorDestino(event) {
									var peticionListaPasajerosPorDestino = new XMLHttpRequest();
									peticionListaPasajerosPorDestino.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											// actualizar tabla
											document.getElementById('listaPasajeros').innerHTML = this.responseText;
										}
									};
									peticionListaPasajerosPorDestino.open('GET', 'php/viajesServidor.php?accion=listapasajerosDestino&fila=' + event.getAttribute('fila'), true);
									peticionListaPasajerosPorDestino.send();
								}

								function listaPasajeros(event) {
									var peticionListaPasajeros = new XMLHttpRequest();
									peticionListaPasajeros.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											// actualizar tabla
											document.getElementById('listaPasajeros').innerHTML = this.responseText;
										}
									};
									peticionListaPasajeros.open('GET', 'php/viajesServidor.php?accion=listapasajeros&fila=' + event.getAttribute('fila'), true);
									peticionListaPasajeros.send();
								}
							</script>
							<div class="modal fade" id="defaultModalPrimary" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content" id="listaPasajeros">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="row col-12">
								<table class="table">
									<thead>
										<tr>
											<th class="ml-2 text-left">Viajes realizados por choferes</th>
											<th class="text-right">
												<form class="d-none d-sm-inline-block">
													<div class="input-group input-group-navbar">
														<script>
															function buscarChofer() {
																var peticionBuscarChofer = new XMLHttpRequest();
																chofer = document.getElementById('buscarChofer_input').value;
																peticionBuscarChofer.onreadystatechange = function() {
																	if (this.readyState == 4 && this.status == 200) {
																		// Disponer datos en la pagina
																		document.getElementById('tablaViajesChoferes').innerHTML = this.response;
																	}
																}
																if(chofer != "") {
																	peticionBuscarChofer.open("GET", "php/viajesServidor.php?accion=buscarChofer&search="+chofer, true);
																}
																// mostrar todos los choferes
																else {
																	peticionBuscarChofer.open("GET", "php/viajesServidor.php?accion=cargarDatosViajesChoferes", true);
																}
																peticionBuscarChofer.send();
															}
														</script>
														<input id="buscarChofer_input" onkeyup=buscarChofer(this); type="text" class="form-control" placeholder="Buscar Chofer" aria-label="Search">
														<button class="btn" type="button">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle">
																<circle cx="11" cy="11" r="8"></circle>
																<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
															</svg>
														</button>
													</div>
												</form>
											</th>
										</tr>
									</thead>
								</table>
							</div>
							<table class="table  table-hover">
								<thead>
									<tr>
										<th class="text-left">Nombre</th>
										<th class="text-left">Número de licencia</th>
										<th class="text-right">Fecha</th>
									</tr>
								</thead>
								<tbody id="tablaViajesChoferes">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.php" class="text-muted"><strong>Sistema de Reservaciones UCI</strong></a> ©
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
	<script src="js/viajes.js"></script>


</body>

</html>