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
							<div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
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

										<li class="sidebar-item active">
											<a class="sidebar-link" href="reservaciones.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check align-middle mr-1">
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
					<div class="simplebar-placeholder" style="width: 260px; height: 914px;"></div>
				</div>
				<div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
					<div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
				</div>
				<div class="simplebar-track simplebar-vertical" style="visibility: visible;">
					<div class="simplebar-scrollbar" style="height: 724px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
				</div>
			</div>
		</nav>

		<div class="main">

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Reservaciones</h1>

					<div class="row">
						<div class="row">
							<div class="col-md-3 col-xl-2">

								<div class="card">


									<div class="list-group list-group-flush" role="tablist">
										<a class="list-group-item list-group-item-action active" data-toggle="list" href="#reservar" role="tab" aria-selected="true">
											Reservación
										</a>
										<a class="list-group-item list-group-item-action" data-toggle="list" href="#clientes" role="tab" aria-selected="false">
											Profesores
										</a>

									</div>
								</div>
							</div>

							<div class="col-md-9 col-xl-10">
								<div class="tab-content">
									<div class="tab-pane fade active show" id="reservar" role="tabpanel">
										<div class="card">
											<div class="card-body">
												<table class="table">
													<thead>
														<tr>
															<th style="width:50%;">Informacion del viaje</th>
															<th style="width:50%"></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<button style="width: 100%;" class="btn btn-outline-secondary" data-toggle="modal" data-target="#defaultModalPrimary" id="fecha_input">Fecha</button>
																<div class="modal fade" id="defaultModalPrimary" tabindex="-1" style="display: none;" aria-hidden="true">
																	<div class="modal-dialog" role="document">
																		<div class="modal-content">
																			<div class="modal-header">
																				<h5 class="modal-title">Seleccione una fecha</h5>
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																					<span aria-hidden="true">×</span>
																				</button>
																			</div>
																			<div class="modal-body m-3">

																				<div class="card flex-fill">

																					<div class="card-body d-flex">
																						<div class="align-self-center w-100">
																							<div class="chart">
																								<div id="datetimepicker-dashboard" class="flatpickr-input" readonly="readonly"></div>
																								<div class="flatpickr-calendar animate inline" tabindex="-1">
																									<div class="flatpickr-months"><span class="flatpickr-prev-month"><span class="fas fa-chevron-left" title="Previous month"></span></span>
																										<div class="flatpickr-month">
																											<div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1">
																													<option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
																													<option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
																													<option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
																													<option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
																													<option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
																													<option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
																													<option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
																													<option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
																													<option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
																													<option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
																													<option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
																													<option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
																												</select>
																												<div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
																											</div>
																										</div><span class="flatpickr-next-month"><span class="fas fa-chevron-right" title="Next month"></span></span>
																									</div>
																									<div class="flatpickr-innerContainer">
																										<div class="flatpickr-rContainer">
																											<div class="flatpickr-weekdays">
																												<div class="flatpickr-weekdaycontainer">
																													<span class="flatpickr-weekday">
																														Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
																													</span>
																												</div>
																											</div>
																											<div class="flatpickr-days" tabindex="-1">
																												<div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="October 31, 2021" tabindex="-1">31</span><span class="flatpickr-day " aria-label="November 1, 2021" tabindex="-1">1</span><span class="flatpickr-day " aria-label="November 2, 2021" tabindex="-1">2</span><span class="flatpickr-day " aria-label="November 3, 2021" tabindex="-1">3</span><span class="flatpickr-day " aria-label="November 4, 2021" tabindex="-1">4</span><span class="flatpickr-day " aria-label="November 5, 2021" tabindex="-1">5</span><span class="flatpickr-day " aria-label="November 6, 2021" tabindex="-1">6</span><span class="flatpickr-day " aria-label="November 7, 2021" tabindex="-1">7</span><span class="flatpickr-day " aria-label="November 8, 2021" tabindex="-1">8</span><span class="flatpickr-day " aria-label="November 9, 2021" tabindex="-1">9</span><span class="flatpickr-day " aria-label="November 10, 2021" tabindex="-1">10</span><span class="flatpickr-day " aria-label="November 11, 2021" tabindex="-1">11</span><span class="flatpickr-day " aria-label="November 12, 2021" tabindex="-1">12</span><span class="flatpickr-day " aria-label="November 13, 2021" tabindex="-1">13</span><span class="flatpickr-day today" aria-label="November 14, 2021" aria-current="date" tabindex="-1">14</span><span class="flatpickr-day " aria-label="November 15, 2021" tabindex="-1">15</span><span class="flatpickr-day " aria-label="November 16, 2021" tabindex="-1">16</span><span class="flatpickr-day " aria-label="November 17, 2021" tabindex="-1">17</span><span class="flatpickr-day " aria-label="November 18, 2021" tabindex="-1">18</span><span class="flatpickr-day " aria-label="November 19, 2021" tabindex="-1">19</span><span class="flatpickr-day " aria-label="November 20, 2021" tabindex="-1">20</span><span class="flatpickr-day " aria-label="November 21, 2021" tabindex="-1">21</span><span class="flatpickr-day " aria-label="November 22, 2021" tabindex="-1">22</span><span class="flatpickr-day " aria-label="November 23, 2021" tabindex="-1">23</span><span class="flatpickr-day " aria-label="November 24, 2021" tabindex="-1">24</span><span class="flatpickr-day " aria-label="November 25, 2021" tabindex="-1">25</span><span class="flatpickr-day " aria-label="November 26, 2021" tabindex="-1">26</span><span class="flatpickr-day " aria-label="November 27, 2021" tabindex="-1">27</span><span class="flatpickr-day " aria-label="November 28, 2021" tabindex="-1">28</span><span class="flatpickr-day " aria-label="November 29, 2021" tabindex="-1">29</span><span class="flatpickr-day " aria-label="November 30, 2021" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="December 1, 2021" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="December 2, 2021" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="December 3, 2021" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="December 4, 2021" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="December 5, 2021" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="December 6, 2021" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="December 7, 2021" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="December 8, 2021" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="December 9, 2021" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay" aria-label="December 10, 2021" tabindex="-1">10</span><span class="flatpickr-day nextMonthDay" aria-label="December 11, 2021" tabindex="-1">11</span></div>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>



																			</div>
																			<div class="modal-footer">
																				<button id="guardar_fecha_button" type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
																			</div>
																		</div>
																	</div>
																</div>




															</td>
															<td class="d-none d-md-table-cell">
																<select class="form-control" id="destino_select">
																	
																</select>
															</td>
														</tr>
													</tbody>
												</table>
												<div id="capacidad_disponible">

												</div>

												<div class="row">
													<h5 class="card-title mb-0"><strong>Información personal</strong></h5>
												</div>
												<div class="row mt-3">
													<div class="mb-3 col-md-9">
														<input type="text" class="form-control" id="nombre_input" placeholder="Nombres y Apellidos">
													</div>
													<div class="mb-3 col-md-3">
														<input type="text" class="form-control" id="ci_input" placeholder="Carné de identidad">
													</div>
												</div>
												<div class="row">
													<div class="mb-3 col-md-6">
														<input type="text" class="form-control" id="facultad_input" placeholder="Facultad">
													</div>
													<div class="mb-3 col-md-6">
														<input type="text" class="form-control" id="asignatura_input" placeholder="Asignatura">
													</div>
												</div>
												<button id="reservar_button" class="btn btn-primary">Reservar</button>

											</div>
										</div>
										<div class="card">
											<div class="card-header">
												<ul class="nav nav-pills card-header-pills pull-right" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" data-toggle="tab" href="#tab-4">I Semestre</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#tab-5">II Semestre</a>
													</li>
												</ul>
											</div>
											<div class="card-body">
												<div class="tab-content">
													<div class="tab-pane fade active show text-center" id="tab-4" role="tabpanel">
														<div class="row col-12">
															<table class="table">
																<thead>
																	<tr>
																		<th class="ml-2 text-left">Lista de reservaciones realizadas</th>
																		<th class="text-right">
																			<form class="d-none d-sm-inline-block">
																				<div class="input-group input-group-navbar">
																					<script>
																						// actualiza la tabla con los profesores que coincidan con el criterio de busqueda
																						function buscarProfesorSemI(event) {
																							var peticionListaProfesores = new XMLHttpRequest();
																							peticionListaProfesores.onreadystatechange = function() {
																								document.getElementById('tabla_semestre_1').innerHTML = this.responseText;
																							};
																							date = new Date();
																							year = date.getFullYear();
																							peticionListaProfesores.open('GET', 'php/reservacionesServidor.php?accion=listaProfesoresSemI&year='+year.toString()+'&search='+event.value ,true);
																							peticionListaProfesores.send();
																						}
																					</script>
																					<input onkeyup=buscarProfesorSemI(this); type="text" class="form-control" placeholder="Buscar Profesor…" aria-label="Search">
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
														<table class="table table-striped table-sm">
															<thead>
																<tr>
																	<th class="text-left">Nombre</th>
																	<th class="text-right">Fecha</th>
																	<th class="text-right">Destino</th>
																</tr>
															</thead>
															<tbody id="tabla_semestre_1">
																
															</tbody>
														</table>
													</div>
													<div class="tab-pane fade text-center" id="tab-5" role="tabpanel">
														<div class="row col-12">
															<table class="table">
																<thead>
																	<tr>
																		<th class="ml-2 text-left">Lista de reservaciones realizadas</th>
																		<th class="text-right">
																			<form class="d-none d-sm-inline-block">
																				<div class="input-group input-group-navbar">
																				<script>
																						// actualiza la tabla con los profesores que coincidan con el criterio de busqueda
																						function buscarProfesorSemII(event) {
																							var peticionListaProfesores = new XMLHttpRequest();
																							peticionListaProfesores.onreadystatechange = function() {
																								document.getElementById('tabla_semestre_2').innerHTML = this.responseText;
																							};
																							date = new Date();
																							year = date.getFullYear();
																							peticionListaProfesores.open('GET', 'php/reservacionesServidor.php?accion=listaProfesoresSemII&year='+year.toString()+'&search='+event.value ,true);
																							peticionListaProfesores.send();
																						}
																					</script>
																					<input onkeyup=buscarProfesorSemII(this); type="text" class="form-control" placeholder="Buscar Profesor…" aria-label="Search">
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
														<table class="table table-striped table-sm">
															<thead>
																<tr>
																	<th class="text-left">Nombre</th>
																	<th class="text-right">Fecha</th>
																	<th class="text-right">Destino</th>
																</tr>
															</thead>
															<tbody id="tabla_semestre_2">
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>

										<div class="card">
											<div class="card-header">
												<div class="row">
													<div class="col-md-9">
														<h4 class="h4" id="tituloCantidadDeViajes"><strong>Profesores que han realizado 1 viaje</strong></h4>
													</div>
													<div class="col-md-3">
														<script>
															function listaProfesoresCantidadViajes(event) {
																var peticionListaProfesoresCantidadViajes = new XMLHttpRequest();
																cantidadDeViajes = event.value;
																if(cantidadDeViajes == '') {
																	cantidadDeViajes = '1';
																}
																peticionListaProfesoresCantidadViajes.onreadystatechange = function() {
																	document.getElementById('listaProfesoresCantidadViajes').innerHTML = this.responseText;
																	if(cantidadDeViajes == "1") {
																		document.getElementById('tituloCantidadDeViajes').innerHTML = "<strong>Profesores que han realizado " + cantidadDeViajes + " viaje</strong>";
																	}
																	else {
																		document.getElementById('tituloCantidadDeViajes').innerHTML = "<strong>Profesores que han realizado " + cantidadDeViajes + " viajes</strong>";
																	}
																	
																};
																peticionListaProfesoresCantidadViajes.open('GET', 'php/reservacionesServidor.php?accion=listaProfesoresCantidadViajes&search='+cantidadDeViajes, true);
																peticionListaProfesoresCantidadViajes.send();
															}
														</script>
														<input onkeyup=listaProfesoresCantidadViajes(this); type="text" class="form-control" id="cantidadViajes_input" placeholder="Cantidad de viajes">
													</div>
												</div>

											</div>
											<div class="card-body">
												<table class="table table-striped table-sm">
													<thead>
														<tr>
															<th style="width:30%;">Nombre</th>
															<th style="width:25%">Carné de identidad</th>
															<th style="width:15%">Facultad</th>
															<th style="width:30%">Asignatura</th>
														</tr>
													</thead>
													<tbody id="listaProfesoresCantidadViajes">
														
													</tbody>
												</table>
											</div>

										</div>
									</div>
									<div class="tab-pane fade" id="clientes" role="tabpanel">
										<div class="card flex-fill w-100">
											<div class="card-header">

												<h5 class="card-title mb-0">Reservaciones por facultades</h5>
											</div>
											<div class="card-body d-flex">
												<div class="align-self-center w-100">
													<div class="py-3">
														<div class="chart chart-xs">
															<div class="chartjs-size-monitor">
																<div class="chartjs-size-monitor-expand">
																	<div class=""></div>
																</div>
																<div class="chartjs-size-monitor-shrink">
																	<div class=""></div>
																</div>
															</div>
															<canvas id="chartjs-dashboard-pie" style="display: block; width: 453px; height: 200px;" width="453" height="200" class="chartjs-render-monitor"></canvas>
														</div>
													</div>

													<table class="table mb-0">
														<tbody id="profesoresFacultadLista">
															
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">Lista de profesores</h5>
											</div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th style="width:30%;">Nombre</th>
														<th style="width:15%">Carné de identidad</th>
														<th style="width:5%">Facultad</th>
														<th style="width:25%">Asignatura</th>
													</tr>
												</thead>
												<tbody id="listaProfesores">
													
												</tbody>
											</table>
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
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
				nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
			});
		});
	</script>
	<script src="js/reservaciones.js"></script>

</html>