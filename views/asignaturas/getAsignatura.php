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
													<a onclick="alertaEliminar();"  style="text-decoration:none"><div class="espacio menu-opciones-plus"><i class="zmdi zmdi-plus-circle"></i> Eliminar</div></a>
												</li>
											</ul>
										</li>
									</ul>
								</nav>

							
					

					<!-- Contenido de pestaña-->

					<div class="pestaña-contenido">
					<section class="full-box">
						<div class="contenido">

		
							<!-- Pestaña | contenido de sección-->
							<div class="contenido-box">
								<div class="nombre-seccion">
									<h3><i class="zmdi zmdi-book"></i> Asignaturas</h3>
								</div>
								<div class="descripcion-seccion">
									<p>Visualiza, actualiza y agrega asignaturas de la carrera.</p>
								</div>

								<form method="POST" action="<?php echo constant('URL'); ?>asignaturas/getAsignatura">
								<div class="row justify-content-center">
									<div class="col-md-12">
											<div class="input-group pb-4 pt-1 buscador">
												<input type="text" class="form-control" name="busqueda" id="busqueda" placeholder="Buscar asignatura por clave" aria-label="Recipient's username" aria-describedby="button-addon2">
												<button class="btn btn-primary" type="submit" id="button-addon2"><i class="zmdi zmdi-search"></i> Buscar</button>
											</div>
										
									</div>
								</div>
								</form>
								
								<div class="formulario-box">
									<form class="diseño-formulario" id="validacion_asignatura" action="<?php echo constant('URL'); ?>asignaturas/updateAsignatura" method="POST">
										
											<div class="container-fluid">
											
												<div class="nombre-clasificación-formulario">
													<h4><i class="zmdi zmdi-info"></i> Información de la asignatura</h4>
												</div>

												<!-- Input clave asignatura-->

												<div class= "row">
													<div class="col-sm-12 col-md-4 col-lg-2">
														<div class="formulario__grupo" id="grupo__claveasignatura">
															<label for="claveasignatura" class="formulario__label">Clave</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="claveasignatura" id="claveasignatura" placeholder="Clave" value="<?php if(isset($this->resultado["Clave_Materia"])) echo $this->resultado["Clave_Materia"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede tener letras, numeros y guiones, maximo 20 caracteres.</p>
														</div>
														
													</div>

													<!-- Input nombre asignatura-->
													<div class="col-sm-12 col-md-8 col-lg-5">
														<div class="formulario__grupo" id="grupo__nombreasignatura">
															<label for="usuario" class="formulario__label">Nombre de la asignatura</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="nombreasignatura" id="nombreasignatura" placeholder="Nombre de la signatura" value="<?php if (isset($this->resultado["Nombre_Asig"])) echo $this->resultado["Nombre_Asig"]; ?>"required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
														
													</div>

													<!-- Input nombre corto de la asignatura-->
													<div class="col-sm-12 col-md-12 col-lg-3">
														<div class="formulario__grupo" id="grupo__nombrecortoasignatura">
															<label for="usuario" class="formulario__label">Nombre corto de asignatura</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="nombrecortoasignatura" id="nombrecortoasignatura" placeholder="Nombre corto de la asignatura" value="<?php if (isset($this->resultado["Nombre_Corto"])) echo $this->resultado["Nombre_Corto"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, números y guiones, máximo 30 caracteres.</p>
														</div>
														
													</div>

													<!-- Input cuatrimestre-->
													<div class="col-sm-12 col-md-6 col-lg-2">
														<div class="formulario__grupo" id="grupo__creditoasignatura">
															<label for="cuatrimestreasignatura" class="formulario__label">Cuatrimestre</label>
															<select class="form-select" name="cuatrimestreasignatura" required disabled>
																<option value="">Cuatrimestre</option>
																<?php foreach ($this->cuatrimestre as $opciones) : ?>
																<option value="<?php echo $opciones->ID_Cuat ?>"

																<?php $seleccionar = $this->resultado["ID_Cuat"];
																if($seleccionar == $opciones->ID_Cuat){
																	echo "selected";
																}
																?>
																> <?php echo $opciones->Nombre_Cuat ?></option>
																<?php endforeach; ?>
															</select>
															<div class="invalid-feedback formulario__input-error">Selecciona el cuatrimestre.</div>
														</div>
													</div>

													

												</div>

												<!-- Input créditos-->

												<div class= "row">
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__creditoasignatura">
															<label for="claveasignatura" class="formulario__label">Créditos</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="creditoasignatura" id="creditoasignatura" placeholder="Créditos" value="<?php if (isset($this->resultado["Creditos"])) echo $this->resultado["Creditos"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo número y maximo 3 caracteres.</p>
														</div>
														
													</div>

													<!-- Input horas teóricas-->
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horasteoricas">
															<label for="horasteoricas" class="formulario__label">Horas teóricas</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control monto"  onkeyup="sumahorastotales();" name="horasteoricas" id="horasteoricas" placeholder="Horas teóricas" value="<?php if (isset($this->resultado["Hrs_Clase"])) echo $this->resultado["Hrs_Clase"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>

													<!-- Input horas prácticas-->
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horaspracticas">
															<label for="horaspracticas" class="formulario__label">Horas prácticas</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control monto" onkeyup="sumahorastotales();" name="horaspracticas" id="horaspracticas" placeholder="Horas prácticas" value="<?php if (isset($this->resultado["Hrs_Practicas"])) echo $this->resultado["Hrs_Practicas"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>

													<!--Input horas totales-->

													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__horastotales">
															<label for="horastotales" class="formulario__label">Hora totales</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="horastotales" id="horastotales" placeholder="Horas totales" value="<?php if (isset($this->resultado["Hrs_Totales"])) echo $this->resultado["Hrs_Totales"]; ?>" required readonly>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo números y maximo de 4 caracteres.</p>
														</div>
														
													</div>
												</div>

												<!-- Input plan académico-->

												<div class= "row">
													<div class="col-sm-12 col-md-6 col-lg-3">
														<div class="formulario__grupo" id="grupo__planacademico">
															<label for="planacademico" class="formulario__label">Plan académico</label>
															<div class="formulario__grupo-input">
																<input type="text" class="formulario__input form-control" name="planacademico" id="planacademico" placeholder="Plan académico" value="<?php if (isset($this->resultado["Cod_Revision"])) echo $this->resultado["Cod_Revision"]; ?>" required disabled>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, numero y guiones, maximo 20 caracteres.</p>
														</div>
														
													</div>

													<!-- Input plan de estudio-->
													<div class="col-sm-12 col-md-6 col-lg-2">
														<div class="formulario__grupo" id="grupo__creditoasignatura">
															<label for="planasignatura" class="formulario__label">Plan de estudio</label>
															<select class="form-select" name="planasignatura" required disabled>
																<option>Plan de estudio</option>
																<?php foreach ($this->planestudio as $opciones) : ?>
																<option value="<?php echo $opciones->Clave ?>"

																<?php $seleccionar = $this->resultado['Clave'];
																if($seleccionar == $opciones->Clave){
																	echo "selected";
																}
																?>
																> <?php echo $opciones->Clave_Oficial ?></option>
																<?php endforeach; ?>
															</select>
															<div class="invalid-feedback formulario__input-error">Selecciona el plan de estudio.</div>
														</div>
													</div>

													<!-- Input área académica-->
													<div class="col-sm-12 col-md-6 col-lg-2">
														<div class="formulario__grupo" id="grupo__creditoasignatura">
															<label for="area_asignatura" class="formulario__label">Área Académica</label>
															<select class="form-select" name="area_asignatura" required disabled>
																<option >Área Académica</option>
																<?php foreach ($this->areaacademica as $opciones) : ?>
																<option value="<?php echo $opciones->ID_Area_Aca ?>"

																<?php $seleccionar = $this->resultado['ID_Area_Aca'];
																if($seleccionar == $opciones->ID_Area_Aca) {
																	echo "selected";
																}
																?>
																> <?php echo $opciones->Nombre_Aca ?></option>
																<?php endforeach; ?>
															</select>
															<div class="invalid-feedback formulario__input-error">Selecciona el área académica.</div>
														</div>
													</div>

													<!--Manual de unidad-->
													<div class="col-sm-12 col-md-6 col-lg-5">
														<div class="formulario__grupo" id="grupo__manual">
															<label for="usuario" class="formulario__label">Manual de asignatura</label>
															<div class="formulario__grupo-input">
																<div class="input-group was-validated">
																	<input type="file" class="form-control" aria-label="file example" accept="application/pdf" name="manual">
																	<div class="invalid-feedback">Selecciona el manual de la asignatura.</div>
																  </div>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
														
													</div>

												</div>


												<!--Objetivos de la materia-->

												<div class="nombre-clasificación-formulario">
													<h4><i class="zmdi zmdi-check-circle"></i> Objetivos de la asignatura</h4>
												</div>


												<!-- Text area caracterización-->

												<div class= "row">
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="formulario__grupo" id="grupo__caracterizacion">
															<label for="caracterizacion" class="formulario__label">Caracterización</label>
															<div class="formulario__grupo-input">
																<textarea class="formulario__input form-control" id="caracterizacion" name="caracterizacion" rows="3" required disabled><?php if (isset($this->resultado["Caracterizacion"])) echo $this->resultado["Caracterizacion"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>

													<!-- Text area intuición didáctica-->
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="formulario__grupo" id="grupo__intuicion">
															<label for="intuicion" class="formulario__label">Intuición didáctica</label>
															<div class="formulario__grupo-input">
																<textarea class="form-control" id="intuicion" name="intuicion" rows="3" required disabled><?php if (isset($this->resultado["Objetivos"])) echo $this->resultado["Objetivos"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>

													<!-- Text area competencia específica de la asignatura-->
													<div class="col-sm-12 col-md-12 col-lg-12">
														<div class="formulario__grupo" id="grupo__competencia">
															<label for="usuario" class="formulario__label">Competencias específicas</label>
															<div class="formulario__grupo-input">
																<textarea class="form-control" id="competencia" name="competencia" rows="3" required disabled><?php if (isset($this->resultado["Com_Especifica"])) echo $this->resultado["Com_Especifica"]; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
														
													</div>													
												</div>


												<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" id="alerta_asignaturas"  style="display: none">
													<strong>Oops!</strong> No es posible enviar los datos, verifica que tu información este correctamente escrita.
												</div>
												<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" id="alerta_asignaturas_nounidad"  style="display: none">
													<strong>Oops!</strong> No hay unidades agregadas a esta asignatura. ¡Agrega las que sea necesarias!
												</div>

												<div class="boton-dise linea_A pb-4">
													<button href='<?php echo constant('URL'); ?>asignaturas/updateAsignatura' class="btn btn-primary botonespacio" id="boton" style="display:none" type="submit">Actualizar información</button>
													<div class="alert alert-warning alert-dismissible fade show mt-2" role="alert" id="alerta_agrega_unidad" style="display: none;" >
														<strong>¡Advertencia!</strong> Recuerda agregar las unidades de la asignatura.
													</div>
												</div>
									
												<fieldset class="bloqueo_unidades">
													<div class="alert alert-success alert-dismissible fade show mt-2" role="alert" id="alerta_ahora_agregar" style="display: none">
														<strong>¡Asignatura agregada!</strong> Ahora agregue las unidades.
													</div>
									</form>							

													<!--Contenidos de la asignatura-->

													<div class="nombre-clasificación-formulario">
														<h4><i class="zmdi zmdi-folder"></i> Contenidos de la asignaturas</h4>
													</div>

													<div class="row">
														<!-- Input unidades de la materia-->
														<div class="col-sm-12 col-md-3 col-lg-3">
															<div class="formulario__grupo" id="grupo__unidades">
																<label for="unidades" class="formulario__label">Unidades</label>
																<div class="formulario__grupo-input">
																	<input type="text" class="formulario__input form-control" name="unidades" id="unidades" placeholder="0" value="<?php if (isset($this->numero_unidades["COUNT(*)"])) $numero =$this->numero_unidades["COUNT(*)"]; echo $numero; ?>" disabled>
																</div>
																<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
															</div>
															
														</div>

														<!-- boton agregar unidad-->
														<div class="col-sm-12 col-md-9 col-lg-9">
															<div class="formulario__grupo d-grid" id="grupo__nombrecortoasignatura">
																<label for="usuario" class="formulario__label">¡Agrega nuevas unidades!</label>
																<button type="button" class="btn btn-primary" id="nuevaunidad" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="zmdi zmdi-plus-circle"></i> Agregar unidad</button>
															</div>
															
														</div>
													</div>
												<form>
													<div class="table-responsive">
														<table class="table table-striped colortr" class="text-center">
															<thead>
															<tr>
																<th class="text-center" scope="col">Unidad</th>
																<th scope="col">Sub</th>
																<th scope="col">Titulo de Unidad</th>
																<th scope="col">Competencias genéricas</th>
																<th scope="col">Actividades de aprendizaje</th>
																<th scope="col">Editar</th>
																<th scope="col">Eliminar</th>
															</tr>
															</thead>
															<?php
														if(isset($this->unidad)){
															
															?>
															<tbody id="tabla">
															<tr class="colortr" >
																<?php
																	include_once 'models/unidad.php';
																	$i=1;
																	foreach($this->unidad as $row)
																	{
																		$unidad = new Unidad();
																		$unidad = $row;
																?>
																<th class="text-center" scope="row"><?php echo $unidad->Num_unidad; ?></th>
																<td><?php echo $unidad->Sub_Unidad; ?></td>
																<td><?php echo $unidad->Titulo_Unidad; ?></td>
																<td><?php echo $unidad->Competencia; ?></td>
																<td><?php echo $unidad->Actividades; ?></td>
																<td style="text-align: center"><a class="btn btn-primary btn-sm" id='<?php echo "button".$i ?>' href="<?php echo URL;?>asignaturas/gettoupdateUnidadSearched?k=<?php echo $i;?>" type="button"><i class="zmdi zmdi-edit"></i></a></td>
																<td style="text-align: center"><a class="btn btn-danger btn-sm" id='<?php echo "button".$i ?>' onclick="eliminarUnidad();" type="button"><i class="zmdi zmdi-delete"></i></a></td>

																<script>
																	function eliminarUnidad(){
																	swal({
																	title: '¿Esta seguro de eliminar la unidad?',
																	text: 'La unidad será eliminada de la base de datos y no será posible recuperarla.',
																	type: 'warning',
																		showCancelButton: true,
																		confirmButtonColor: '#F44336',
																		cancelButtonColor: '#03A9F4',
																		confirmButtonText: '<i class="zmdi zmdi-check-circle"></i> Si, eliminar',
																		cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, regresar',
																	}).then(function () {
																		window.location.href='<?php echo URL;?>asignaturas/eliminarUnidadSearched?k=<?php echo $i;?>';
																		
																	});
																	}
																	</script>
															</tr>
															<?php $i++;
																	} ?>
														<?php } ?>
															</tbody>
														</table>
														
														</div>
													</div>
												</form>										
													</fieldset>

													
												</div>
						
											</div>
										

										
									</div>
								</div>

							<!--Inicio de modal-->

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
								  <div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title info-asignatura" id="exampleModalLabel"> Unidad</h5>
									  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
									<form id="validacion_modalunidades" method="POST"action="<?php echo constant('URL'); ?>asignaturas/setUnidadSearched">
										<div class="container">
											<div class="row">
												<!--Input unidad-->
													<div class="col-sm-12 col-md-4">
														<div class="formulario__grupo" id="grupo__numerounidad">
															<label for="numerounidad" class="formulario__label">Unidad</label>
															<div class="formulario__grupo-input">
																<textarea type="text" class="formulario__input form-control" rows="2" name="numerounidad" id="numerounidad" placeholder="Unidad" ><?php if (isset($this->numero_unidades["COUNT(*)"])) $numero =$this->numero_unidades["COUNT(*)"]; echo $numero=$numero+1; ?></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra y maximo de 40.</p>
														</div>
													</div>
												<!--Input descripción-->
													<div class="col-sm-12 col-md-8">
															<div class="formulario__grupo" id="grupo__descripcion1">
																<label for="numerounidad" class="formulario__label">Descripción</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="descripcion1" id="descripcion1" placeholder="Descripción" required></textarea>
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
																<textarea type="text" class="formulario__input form-control"  rows="2" name="sub" id="sub" placeholder="Sub" required></textarea>
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
																<textarea type="text" class="formulario__input form-control" rows="2" name="competenciasgenericas" id="competenciasgenericas" placeholder="competenciasgenericas" required></textarea>
															</div>
															<p class="formulario__input-error">Solo puede contener caracteres tipo letra, máximo 500 caracteres.</p>
														</div>
													</div>
												<!--Input actividades de aprendizaje-->
													<div class="col-sm-12 col-md-6">
															<div class="formulario__grupo" id="grupo__actividades">
																<label for="actividades" class="formulario__label">Actividades de aprendizaje</label>
																<div class="formulario__grupo-input">
																	<textarea type="text" class="formulario__input form-control" rows="2" name="actividades" id="actividades" placeholder="Actividades de aprendizaje" required></textarea>
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
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
											<button type="submit" form="validacion_modalunidades"  class="btn btn-primary" id="agregar_unidad" >Agregar unidad</button>
											<button type="submit" form="validacion_modalunidades" style="display:none" class="btn btn-primary" id="actualizar_unidad" action="<?php echo constant('URL'); ?>asignaturas/setUnidadSearched">Actualizar información</button>
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

	<script>
					function alertaEliminar(){
					swal({
					title: '¿Esta seguro de eliminar la asignatura?',
					text: 'La asignatura será eliminada de la base de datos y no será posible recuperarla.',
					type: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#F44336',
						cancelButtonColor: '#03A9F4',
						confirmButtonText: '<i class="zmdi zmdi-check-circle"></i> Si, eliminar',
						cancelButtonText: '<i class="zmdi zmdi-close-circle"></i> No, regresar',
					}).then(function () {
						window.location.href=url +  'asignaturas/deleteAsignatura';
						
					});
					}
					
		</script>
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