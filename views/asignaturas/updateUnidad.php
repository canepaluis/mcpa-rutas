<?php
	$session = new Session();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Asignaturas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo URL;?>public/css/main.css">
	<link rel="shortcut icon" href="<?php echo URL;?>public/assets/img/upqroo.ico"> 
	
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
						<h1><i class="zmdi zmdi-view-dashboard"></i> Carrera, planes y asignaturas</h1>
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

			<!-- Menú de hamburguesa | MCPA -->
				
				<div class="cover dashboard-sideBar">
					<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
						<div class="full-box dashboard-sideBar-ct">
							<!-- Opciones del menú de hamburguesa | MCPA -->
							<div class="caja-menu centrarvertical">
								<ul class="list-unstyled full-box dashboard-sideBar-Menu">
									<li>
										<a href="<?php echo URL;?>carreras"> 
											<i class="zmdi zmdi-graduation-cap"></i>  Carrera
										</a>
									</li>
									<li>
										<a href="<?php echo URL;?>planes">
											<i class="zmdi zmdi-library"></i>  Planes académicos
										</a>
									</li>
									<li class="seleccionar">
										<a href="<?php echo URL;?>asignaturas">
											<i class="zmdi zmdi-book"></i> Asignaturas
										</a>
									</li>
								</ul>
							</div>
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
											<a href="<?php echo URL; ?>home"><div class="op-navegador"><div class="navegadornombre">Inicio</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href="#!"><div class="op-navegador"><div class="navegadornombre">Módulo carrera, planes y asignaturas</div><div class="navegadorflecha"><i class="zmdi zmdi-chevron-right"></i></div></div></a>
										</li>
										<li class="li-left indice-navegacion">
											<a href=""><div class="op-navegador"><div class="navegadornombre">Carrera</div></div></a>
										</li>
										<li class="li-right">
											<a href="#!" class="btn-exit-system margen-navbar"><div class="espacio"><i></i>Cerrar sesión</div></a>
										</li>
										<li class="li-right">
											<a href="#!"><div><i class="zmdi zmdi-menu"></i></div></a>
											<ul>
												<li>
													<a onclick="activarinput()"><div class=espacio><i class="zmdi zmdi-edit"></i> Editar</div></a>
												</li>
												<li>
													<a  href="<?php echo URL; ?>asignaturas/deleteAsignatura" style="text-decoration:none"><div class="espacio menu-opciones-plus"><i class="zmdi zmdi-plus-circle"></i> Eliminar</div></a>
												</li>
											</ul>
										</li>
									</ul>
								</nav>

							<!--Inicio de modal-->

							<div id="exampleModal" aria-labelledby="exampleModalLabel">
								<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
								  <div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title info-asignatura" id="exampleModalLabel"> Unidad</h5>
									</div>
									<div class="modal-body">
									<form id="validacion_modalunidades" method="POST"action="<?php echo constant('URL'); ?>asignaturas/updateUnidadSearched">
										<div class="container">
											<div class="row">
												<!--Input unidad-->
													<div class="col-sm-12 col-md-4">
														<div class="formulario__grupo" id="grupo__numerounidad">
															<label for="numerounidad" class="formulario__label">Unidad</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control" rows="2" name="numerounidad" id="numerounidad" placeholder="Unidad" required><?php if (isset($this->resultado["Num_unidad"])) echo $this->resultado["Num_unidad"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
													</div>
												<!--Input descripción-->
													<div class="col-sm-12 col-md-8">
															<div class="formulario__grupo" id="grupo__descripcion1">
																<label for="numerounidad" class="formulario__label">Descripción</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="descripcion1" id="descripcion1" placeholder="Descripción" required><?php if (isset($this->resultado["Titulo_Unidad"])) echo $this->resultado["Titulo_Unidad"]; ?></textarea>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
															</div>
													</div>
											</div>

											<div class="row">
												<!--Input sub-->
													<div class="col-sm-12 col-md-12">
														<div class="formulario__grupo" id="grupo__sub">
															<label for="sub" class="formulario__label">Sub</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control"  rows="2" name="sub" id="sub" placeholder="Sub" required><?php if (isset($this->resultado["Sub_Unidad"])) echo $this->resultado["Sub_Unidad"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
													</div>	
											</div>

											<div class="row">
												<!--Input competencias genéricas-->
													<div class="col-sm-12 col-md-6">
														<div class="formulario__grupo" id="grupo__competenciasgenericas">
															<label for="competenciasgenericas" class="formulario__label">Competencias genéricas</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control" rows="2" name="competenciasgenericas" id="competenciasgenericas" placeholder="competenciasgenericas" required><?php if (isset($this->resultado["Competencia"])) echo $this->resultado["Competencia"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
													</div>
												<!--Input actividades de aprendizaje-->
													<div class="col-sm-12 col-md-6">
															<div class="formulario__grupo" id="grupo__actividades">
																<label for="actividades" class="formulario__label">Actividades de aprendizaje</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="actividades" id="actividades" placeholder="Actividades de aprendizaje" required><?php if (isset($this->resultado["Actividades"])) echo $this->resultado["Actividades"]; ?></textarea>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
															</div>
													</div>
											</div>

											<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_modal"  style="display: none">
												<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
											</div>
										</div>
									
										</div>
										<div class="modal-footer">
                                            <a class="btn btn-secondary" href="<?php echo URL;?>asignaturas/getUnidadSearched" type="button">Regresar</a>
											<button type="submit" form="validacion_modalunidades" class="btn btn-primary" id="actualizar_unidad" action="<?php echo constant('URL'); ?>asignaturas/updateUnidadSearched">Actualizar información</button>
										</div>
									</form>
								  </div>
								</div>
							  </div>
							<!--Fin de modal-->


						</div>
					</section>
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
	<script src="<?php echo URL;?>public/js/validador_planes.js"></script>
	<script src="<?php echo URL;?>public/js/validador_asignaturas_modal.js"></script>
	<script src="<?php echo URL;?>public/js/validador_asignaturas.js"></script>
	<script src="<?php echo URL;?>public/js/jquery-3.1.1.min.js"></script>
	<script src="<?php echo URL;?>public/js/sweetalert2.min.js"></script>
	<script src="<?php echo URL;?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo URL;?>public/js/material.min.js"></script>
	<script src="<?php echo URL;?>public/js/ripples.min.js"></script>
	<script src="<?php echo URL;?>public/js/jquery.mCustomScrollbar.concat2.min.js"></script>
	<script src="<?php echo URL;?>public/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<?php
	if($session->get("alerta")){

		switch($session->get("tipoAlerta")){
			case 'Actualizar':
				echo "<script>
					function alerta(){
					swal({
					title: '¡Asignatura actualizada!',
					text: 'La asignatura ha sido actualizada correctamente.',
					type: 'success',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;

			case 'Buscar':
				echo "<script>
					function alerta(){
					swal({
					title: 'Oops! asignatura no encontrada',
					text: 'La asignatura que desea buscar no ha sido encontrada, verifique que la clave sea correcta.',
					type: 'error',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						window.location.href=url +  'asignaturas';
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;
			case 'Eliminar':
				echo "<script>
					function alerta(){
					swal({
					title: '¡Asignatura eliminada!',
					text: 'La asignatura fue eliminada correctamente.',
					type: 'error',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						window.location.href=url +  'asignaturas';
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;
			case 'agregarUnidad':
				echo "<script>
					function alerta(){
					swal({
					title: '¡Unidad agregada!',
					text: 'La unidad fue agregada correctamente.',
					type: 'success',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;
			case 'actualizarUnidad':
				echo "<script>
					function alerta(){
					swal({
					title: '¡Unidad actualizada!',
					text: 'La unidad fue actualizada correctamente.',
					type: 'success',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;
			case 'confirmacionEliminar':
				echo "<script>
					function alerta(){
					swal({
					title: '¡Unidad Eliminada!',
					text: 'La unidad fue eliminada correctamente.',
					type: 'success',
						confirmButtonColor: '#03A9F4',
						cancelButtonColor: '#F44336',
						confirmButtonText: 'Cerrar',
					}).then(function () {
						
					});
					}
					alerta();
					</script>";
				$session->add("alerta", false);
				$session->add("tipoAlerta", " ");
			break;
		}
		
	}
?>
</body>
</html>