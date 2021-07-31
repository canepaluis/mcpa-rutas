<?php
	$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Datos Generales</title>

    <!-- Encabezado - Inicio -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

	<link href="<?php echo URL;?>public/assets/img/logo-circular.png" rel="icon" type="image">

	<link href="<?php echo URL;?>public/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="<?php echo URL;?>public/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">

	<link href="<?php echo URL;?>public/css/style_perfil.css" rel="stylesheet" type="text/css">
	<!--<link href="<?php echo URL;?>public/css/buscador_perfil.css" rel="stylesheet" type="text/css">-->

	<nav class="navbar navbar-expand-lg navbar-light blue fixed-top" style="padding: 10px 1%;">
    	<div>
        	<a class="navbar-brand" href="#"><img src="<?php echo URL;?>public/assets/img/logo.png" height="50">
            	<div class="textnav">
                	<em>
                    	<p> Plataforma Educativa<br>Universitaria</p>
                	</em>
            	</div>
        	</a>
    	</div>
    	<!--<button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
    	</button>-->
    	<div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding: 1px 5%;">
        	<ul class="navbar-nav ml-auto">
            	<li class="nav-item dropdown">
                	<div class="nav-link usercss">
                    	<p>	<strong>
								<?php echo $session->get("nombre"); ?>
                        	</strong>
                        	<div class="d-flex justify-content-center">
                            	<em>
									<?php echo $session->get("tipo");?>
                            	</em>
                        	</div>
                    	</p>
                	</div>
            	</li>
        	</ul>
    	</div>
	</nav>
    <!-- Encabezado - Fin -->
    <?php
        if($session->get('operacion'))
        {   
    ?>
        <script>
            alert('<?php echo $session->get('operacion'); ?>');
        </script>
    <?php
        $session->remove('operacion');
        } 
    ?>
</head>

<body>
    <!-- Cuerpo - Inicio -->
    <div class="wrapper">
        <!-- Menu Principal - Inicio -->
        <nav id="sidebar">
            <ul class="list-unstyled components" style="position: fixed;">
                <br><br> <br>
                <li>
                    <a href="<?php echo URL.'perfil_alumno';?>"><i class="zmdi zmdi-account-circle zmdi-hc-lg zmdi-hc-fw"></i>Perfil</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-assignment-check zmdi-hc-lg zmdi-hc-fw"></i>Calificaciones</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-calendar-alt zmdi-hc-lg zmdi-hc-fw"></i>Horario</a>
                </li>
                <li>
                    <a href="#"><i class="zmdi zmdi-collection-bookmark zmdi-hc-lg zmdi-hc-fw"></i>Materias</a>
                </li>
            </ul>
        </nav>
        <!-- Menu Principal - Fin -->

        <div class="content">
            <!-- Navegacion - Inicio -->
            <div class="row" id="navegacion" style="position: fixed; width: 100%; z-index: 1;">
                <div class="col-9">
                        <ol id="breadcrumb">
                            <button id="sidebarCollapse"><i class="zmdi zmdi-more-vert zmdi-hc-lg"></i></button>
                            <li class="menu-directorio-link"><a style="color: #fff; font-size:18px;" href="<?php echo URL.'home/docente';?>">UPQROO</a></li>
                            <li class="menu-directorio-link"><a style="color: #fff; font-size:18px;" href="<?php echo URL.'perfil_docente';?>">PERFIL</a></li>
                            <li class="menu-directorio text_resaltado" aria-current="page">DATOS GENERALES</li>
                        </ol>
                </div>
                <div class="col-3" id="opc-breadcrum">
                    <ol id="breadcrumb" class="pt-1">
                        <i role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;" class="text_resaltado menu-directorio zmdi zmdi-menu"></i>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo URL;?>perfil_docente/datos_generales_modificar"><i class="zmdi zmdi-edit zmdi-hc-fw"></i>Modificar</a>
                            </div>
                        <li class="menu-directorio text_resaltado"><a style="text-decoration: none;" href="<?php echo URL.'login/cerrarsession';?>">Cerrar sesion</a></li>
                    </ol>
                </div>
            </div>
            <!-- Navegacion - Fin -->
            <br><br>
            <!-- Informacion - Inicio -->
            <form class="container">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <p>Datos Generales</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Numero de control</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_docente['Num_Control'] ;?>">
                                    </div>
                                    <div class="form-group2 col-6">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_docente['Nombres'] ;?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido paterno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_docente['Apellido_paterno'] ;?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido materno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_docente['Apellido_materno'] ;?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Estatus</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_estatus['Nombre'] ;?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Periodo actual</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_descripcion_periodo_actual['Descripcion'] . " " . $this->resultado_id_descripcion_periodo_actual['Anio']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 imageform">
                                <div>
                                    <img src="<?php echo URL; ?>public/assets/fotos/<?php echo $this->resultado_docente['Imagen'] ;?>"
                                        class="rounded-circle z-depth-1-half avatar-pic image-fluid" width="200"
                                        alt="example placeholder avatar">
                                </div>
                            </div>
                            <div class="col-6">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" disabled value="<?php echo $this->resultado_generales['Fecha_Nac'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Pais</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_pais['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Estado</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_estado['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Municipio</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_municipio['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>CURP</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['CURP'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Estado civil</label>
                                <input type="text" class="form-control" disabled
                                value="<?php echo $this->resultado_generales['Estado_Civil'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['RFC'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Grado</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_grado['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Genero</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['Genero'] ;?>">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
            <!-- Informacion - Fin -->
        </div>
    </div>
    <!-- Cuerpo - Fin -->

 	<!-- Footer - Inicio -->
 	<footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: #024677; color: #fff;">
            Av. Arco Bincentenario, Mza. 11, Lote 1119-33 Sm 255, 77500 Cancún, Q.R.
        </div>
    </footer>
    <!-- Footer - Fin -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="<?php echo URL;?>public/js/script_perfil.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>