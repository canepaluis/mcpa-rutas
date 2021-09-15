<?php
$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>PEU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/main.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?php echo URL; ?>public/assets/img/upqroo.ico">

	<style>
		table,
		th,
		td {
			border: 2px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 5px;
			text-align: center;
		}
	</style>
</head>

<body>
	<!--Banner informativa de plataforma | Logo, nombre de módulo, Usuario y tipo de usuario-->
	<header>
		<section class="bannerinfo caja-full">
			<div class="container-fluid caja-full">
				<div class="row centrarvertical caja-full">
					<div class="col-3 col-sm-6 col-md-4 seccion-logo">
						<div class="logo logo-orientacion">
							<div class="logo-nombre ">
								<p>Plataforma Educativa Universitaria</p>
							</div>
						</div>



					</div>

					<div class="col-md-4 nombre-plan">
						<h1><i class="zmdi zmdi-view-dashboard"></i>Horarios</h1>
					</div>
					<div class="col-9 col-sm-6 col-md-4 seccion-datos">
						<div class="datos-usuario datos-orientacion">
							<h2 class="nombre-usuario"><?php echo $session->get("nombre"); ?></h2>
							<h5 class="tipo-usuario"><?php echo $session->get("tipo"); ?></h5>
						</div>
					</div>
				</div>
			</div>
		</section>
	</header>




	<!--Sección de contenido de página | Menú de hamburguesa e información de pestaña-->
	<section class="seccionmaster">
		<div class="contenedormaster">

			<!-- Menú de hamburguesa | MPGH -->

			<div class="cover dashboard-sideBar">
					<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
						<div class="full-box dashboard-sideBar-ct">
							<!-- Opciones del menú de hamburguesa -->
							<ul class="list-unstyled full-box dashboard-sideBar-Menu">
								<li><a href="<?php echo URL;?>mpgh_estudiantes"><i class="zmdi zmdi-calendar-note"></i>Elegir Horario</a></li>
							</ul>
						</div>
				</div>

			<!-- Barra de navegación | Opciones de pestaña-->

			<div class="dashboard-contentPage full-box">

				<!-- NavBar | Barra de navegación -->

				<!-- NavBar -->
				<nav class="dashboard-Navbar">

					<ul class="submenu list-unstyled">
						<li class="li-left">
							<a href="#!">
								<div class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></div>
							</a>
						</li>
						<li class="li-left indice-navegacion">
							<a href="<?php echo URL; ?>main">
								<div class="op-navegador">
									<div class="navegadornombre">Inicio > Biomedica</div>
								</div>
							</a>
						</li>
						<li class="li-right">
							<a href="#" class="btn-exit-system margen-navbar">
								<div class="espacio"><i></i>Cerrar sesión</div>
							</a>
						</li>

						<li class="li-right">
							<a href="#!">
								<div><i class="zmdi zmdi-menu"></i></div>
							</a>
							<ul>
								<li>
									<a onclick="activarinput()" style="text-decoration:none">
										<div class="espacio menu-opciones-plus"><i class="zmdi zmdi-edit"></i> Editar</div>
									</a>
								</li>

							</ul>
						</li>
					</ul>
				</nav>




				<!-- Contenido de pestaña-->



               
<div class="container overflow-scrollpy">
    <div class="row">
        <div class="col-md-12">

        
        <form action="<?php echo constant('URL'); ?>terapia/load">
									<div class="container-fluid " style="padding-top:2rem;">
										<div class="container" id="padre">
											<div class="row align-items-center justify-content-center" style="width:100%;">
												<div class="col-12">
													
													<div class="table-responsive">
														<table class="table" id=Horario>
															<thead>
																<tr>
																<th scope="col">HORA</th>
																<th scope="col">LUNES</th>
																<th scope="col">MARTES</th>
																<th scope="col">MIERCOLES</th>
																<th scope="col">JUEVES</th>
																<th scope="col">VIERNES</th>

																</tr>
															</thead>
															<tbody>
																<tr>
																<th scope="row">7:00 - 7:50</th>
																<?php 
																	foreach($this->horarios5 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Mark</td>
																<td>Otto</td>                                    
																<td>Mark</td>
																<td>Mark</td>
																<td>@mdo</td>-->
																</tr>
																<tr>
																<th scope="row">7:50 - 8:40</th>
																<?php 
																	foreach($this->horarios3 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Jacob</td>
																<td>Thornton</td>
																<td>@fat</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>
																<tr>
																<th scope="row">8:40 - 9:30</th>
																<?php 
																	foreach($this->horarios2 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Larry</td>
																<td>the Bird</td>
																<td>@twitter</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>

																<tr>
																<th scope="row ">9:40</th>
																<td colspan="5" style="text-align:center;">RECESO</td>
															
																</tr>

																<tr>
																<th scope="row">9:40 - 10:30</th>
																<?php 
																	foreach($this->horarios4 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Larry</td>
																<td>the Bird</td>
																<td>@twitter</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>

																<tr>
																<th scope="row">10:30 - 11:20</th>
																<?php 
																	foreach($this->horarios as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Larry</td>
																<td>the Bird</td>
																<td>@twitter</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>

																<tr>
																<th scope="row">11:20 - 12:10</th>
																<?php 
																	foreach($this->horarios6 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Larry</td>
																<td>the Bird</td>
																<td>@twitter</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>

																<tr>
																<th scope="row">12:10 - 1:00</th>
																<?php 
																	foreach($this->horarios7 as $row){
																		$horario = new Horario();
																		$horario = $row;
																	
																?>
																<td><?php echo $horario->Nombre_Asig; ?></td>

																<?php
																	}
																?>
																<!--<td>Larry</td>
																<td>the Bird</td>
																<td>@twitter</td>
																<td>the Bird</td>
																<td>@twitter</td>-->
																</tr>
															</tbody>
														</table>
													</div>
												
												

												</div>
											</div>
										</div>					
									</div>
								</form>


        </div>
    </div>
</div>








			</div>

		</div>
	</section>
	<br>



	<!--Pie de página | Footer -->
	<footer class="vertical">
		<p>Av. Arco Bicentenario, Mza. 11, Lote 1119-33, SM. 255. Cancún, Quintana Roo, México. C.P. 77500 Tel. y Fax (998) 283 1859</p>
	</footer>


	<!--Scripts -->
	<script src="<?php echo URL; ?>public/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL; ?>public/js/sweetalert2.min.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>public/js/material.min.js"></script>
	<script src="<?php echo URL; ?>public/js/ripples.min.js"></script>
	<script src="<?php echo URL; ?>public/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>

<style>
	#padre{
		display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
	height: 503px;
	}
	
	th{
        height:5% ;
		background:#024677;
	}
</style>
</html>

