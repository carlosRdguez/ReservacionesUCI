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
										<li class="sidebar-item active">
											<a class="sidebar-link" href="index.php">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-middle mr-1">
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
					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>Indicadores mensuales</h3>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Viajes realizados</h5>
												<h1 id="viajesRealizados" class="mt-1 mb-3">Desconocido</h1>
												<div id="viajesRealizadosPorciento" class="mb-1">
													
													
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Viajeros</h5>
												<h1 id="viajeros" class="mt-1 mb-3">Desconocido</h1>
												<div id="viajerosPorciento" class="mb-1">
													
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Ganancias</h5>
												<h1 id="ganancias" class="mt-1 mb-3">Desconocido</h1>
												<div id="gananciasPorciento" class="mb-1">
													
													
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<h5 class="card-title mb-4">Reservaciones</h5>
												<h1 id="reservaciones" class="mt-1 mb-3">Desconocido</h1>
												<div id="reservacionesPorciento" class="mb-1">
													
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0">Ganancias por mes</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<div class="chartjs-size-monitor">
											<div class="chartjs-size-monitor-expand">
												<div class=""></div>
											</div>
											<div class="chartjs-size-monitor-shrink">
												<div class=""></div>
											</div>
										</div>
										<canvas id="chartjs-dashboard-bar" style="display: block; width: 835px; height: 350px;" class="chartjs-render-monitor" width="835" height="350"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Viajes del mes</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th class="d-none d-xl-table-cell">Fecha</th>
											<th>Estado</th>
											<th class="d-none d-md-table-cell">Chofer</th>
										</tr>
									</thead>
									<tbody id="ultimosViajes">
										
									</tbody>
								</table>
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
	<script src="js/index.js"></script>

</html>