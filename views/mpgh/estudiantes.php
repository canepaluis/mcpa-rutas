<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>PEU</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL;?>public/css/main.css">
	<link rel="shortcut icon" href="<?php echo URL;?>public/assets/img/upqroo.ico"> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
</head>

<body>
	
	<!--Banner informativa de plataforma | Logo, nombre de módulo, Usuario y tipo de usuario-->
	<header >
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
							<h5 class="tipo-usuario"><?php echo $session->get("tipo");?></h5>
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
								<li><a href="<?php echo URL;?>mpgh_estudiantes"><i class="zmdi zmdi-calendar-note"></i>Horario</a></li>
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
											<a href="#!"><div class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="<?php echo URL;?>main"><div class="op-navegador"><div class="navegadornombre">Inicio</div></div></a>
										</li>
										<li class="li-right">
											<a href="#" class="btn-exit-system margen-navbar"><div class="espacio"><i></i>Cerrar sesión</div></a>
										</li>
										<li class="li-right">
													<a href="#!"><div><i class="zmdi zmdi-menu"></i></div></a>
													<ul>
														<li>
															<a onclick="activarinput()" style="text-decoration:none"><div class="espacio menu-opciones-plus"><i class="zmdi zmdi-edit"></i> Editar</div></a>
														</li>
														
													</ul>
												</li>
									</ul>
								
						</nav>

							
					

					<!-- Contenido de pestaña-->
					<div class="overflow-hidden">
			

			<div class="container scroll">
				<div class="row">
					<div class="col-md-12">
	<h4>Carreras:</h4>
	<br>
					<div class="accordion accordion-flush" id="accordionFlushExample">
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingOne">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
		  Licenciatura en Terapia Fisica
		  </button>
		</h2>
		<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
			  
																		
																			<ul class="list-group list-group-flush">
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF21</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF22</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF51</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF52</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF81</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF23</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF54</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF24</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF53</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>terapia">TF82</a></li>
																			</ul>
																		
																	
		
		
		</div>
	  </div>
	
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingTwo">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
		  Ingeniería Biomédica
	
		  </button>
		</h2>
		<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
		 
		  <li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biomedic">2 DO</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biomedic">5 TO</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biomedic">8 VO</a></li>
							
		
		</div>
		</div>
	  </div>
	
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingThree">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
		  Ingeniería en Biotecnología
		  </button>
		</h2>
		<div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
			  
		  <ul class="list-group list-group-flush">
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biotec">2 DO</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biotec">5 TO</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>biotec">8 VO</a></li>
																			</ul>
		</div>
		</div>
	  </div>
	
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingFour">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
		  Ingeniería Financiera
		  </button>
		</h2>
		<div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
			  
		  <ul class="list-group list-group-flush">
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">LA-121-M</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">LA-151-M</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">IF-721-M</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">IF-851-M</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">IF-981-M</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>financiera">IF-722-V</a></li>
					
							
																			</ul>
		
		
		
		</div>
		</div>
	  </div>
	
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingFive">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
		  Ingeniería en Software
		  </button>
		</h2>
		<div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
			  
		  <ul class="list-group list-group-flush">
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS21</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS51</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS81</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS22</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS52</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>soft">IS82</a></li>
																			</ul>
							
		
		</div>
		</div>
	  </div>
	
	  <div class="accordion-item">
		<h2 class="accordion-header" id="flush-headingSix">
		  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
		  Licenciatura en Administración y Gestión de PYMES
		  </button>
		</h2>
		<div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
		  <div class="accordion-body">
		  
		
		  <ul class="list-group list-group-flush">
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>pymes"> LGE-251</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>pymes"> LGE-281</a></li>
																				<li class="list-group-item" style="height: 2rem; padding: 0.5rem 0.25rem;"><a class ="links" href="<?php echo constant('URL')?>pymes"> LGE-282</a></li>
							
																			</ul>
		
		
		
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
	</section>
	<!--Pie de página | Footer -->
		<footer class="vertical">
			<p>Av. Arco Bicentenario, Mza. 11, Lote 1119-33, SM. 255. Cancún, Quintana Roo, México. C.P. 77500 Tel. y Fax (998) 283 1859</p>
		</footer>


<!--Scripts -->
<script src="<?php echo URL;?>public/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL;?>public/js/sweetalert2.min.js"></script>
	<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo URL;?>public/js/material.min.js"></script>
	<script src="<?php echo URL;?>public/js/ripples.min.js"></script>
	<script src="<?php echo URL;?>public/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>