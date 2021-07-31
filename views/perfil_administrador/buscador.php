<?php
	$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Buscador</title>

    <!-- Encabezado - Inicio -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

	<link href="<?php echo URL;?>public/assets/img/logo-circular.png" rel="icon" type="image">

	<link href="<?php echo URL;?>public/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link href="<?php echo URL;?>public/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">

	<link href="<?php echo URL;?>public/css/style_perfil.css" rel="stylesheet" type="text/css">
	<link href="<?php echo URL;?>public/css/buscador_perfil.css" rel="stylesheet" type="text/css">

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
</head>

<body>
    <!-- Cuerpo - Inicio -->
    <div class="wrapper">
        <!-- Menu Principal - Inicio -->
        <nav id="sidebar">
            <ul class="list-unstyled components" style="position: fixed;">
                <br><br> <br>
                <li>
                    <a href="<?php echo URL.'perfil_administrador';?>"><i class="zmdi zmdi-account-circle zmdi-hc-lg zmdi-hc-fw"></i>Perfil</a>
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
                            <li class="menu-directorio-link"><a style="color: #fff; font-size:18px;" href="<?php echo URL.'home/administrador';?>">UPQROO</a></li>
                            <li class="menu-directorio-link"><a style="color: #fff; font-size:18px;" href="<?php echo URL.'perfil_administrador';?>">PERFIL</a></li>
                            <li class="menu-directorio text_resaltado" aria-current="page">BUSCADOR</li>
                        </ol>
                </div>
                <div class="col-3" id="opc-breadcrum">
                    <ol id="breadcrumb" class="pt-1">
                        <i role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 18px;" class="text_resaltado menu-directorio zmdi zmdi-menu"></i>
                        <li class="menu-directorio text_resaltado"><a style="text-decoration: none;" href="<?php echo URL.'login/cerrarsession';?>">Cerrar sesion</a></li>
                    </ol>
                </div>
            </div>
            <!-- Navegacion - Fin -->
            <br><br>
            <!-- Informacion - Inicio -->
            <form  class="content-buscador">
                <div class="linea-buscador">
                    <img src="<?php echo URL;?>public/assets/img/search.png" alt="Icono_Buscador" class="logob" />
                    <p class="titulobuscador">Buscador de perfiles</p>
                </div>
                <hr>
                <div>
                    <p>Ingrese los datos del usuario a buscar. Puede usar nombres, matrículas o números de Control para
                        buscar: Alumnos, Docentes, Directores
                        de carrera.
                    </p>
                    <input type="search" class="textb" name="buscar" id="buscar" value="<?php echo $this->buscar;?>">
                    <select name="perfil" id="perfil" >
                        <?php
                        $array_values = array("Alumnos", "Docentes","Directores","Administrativos","Perfiles");
                        $array_options = array("Alumnos", "Docentes","Directores","Administrativos","Todos");
                        $total_perfiles = 5;
                        for ($i=1; $i <= $total_perfiles; $i++) { 
                            if($this->perfil == $array_values[$i-1])
                            {
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>" selected> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>"> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <select name="carrera" id="carrera">
                    <?php
                        $array_values = ["Carreras", "Ingeniería Software","Ingenieria en biomedica","Ingenieria en biotecnologia", "Financiera","Terapia Fisica","Licenciatura en Pymes"];
                        $array_options = ["Todos", "Software","Biomedica","Biotecnologia", "Financiera","Terapia Fisica","Licenciatura en Pymes"];
                        $total_carreras = 7;
                        for ($i=1; $i <= $total_carreras; $i++) { 
                            if($this->carrera == $array_values[$i-1])
                            {
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>" selected> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }else{
                                ?>
                                <option value="<?php echo $array_values[$i-1]; ?>"> <?php echo $array_options[$i-1]; ?> </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                    <input type="button" class="buttonb" value="Buscar" onclick="buscar_administrador();">
                </div>
            </form>
            <br>
            <p class="text-resultados text-center">Resultados: <?php echo $this->total_registros;?></p>
            <div class="container cuadroresultado">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <!-- TARGETA -->
                    <?php
                        if($this->buscador_resultados){
                            for ($i=$this->inicio_pagina; $i < $this->fin_pagina ; $i++) { 
                                if($i <= ($this->total_registros-1)){
                                    ?>
                                        <div class="col" id="">
                                            <div class="element">
                                                <div class="sameline">
                                                    <p class="matricula"> <?php echo $this->buscador_resultados[$i]['ID']?> </p>
                                                    <p class="tipouser"> <?php echo $this->buscador_resultados[$i]['Perfil']?> </p>
                                                </div>
                                                <p class="name"> <?php echo $this->buscador_resultados[$i]['Nombres'].' '.$this->buscador_resultados[$i]['apP'].' '.$this->buscador_resultados[$i]['apM']; ?> </p>
                                                <label>Seccion: </label> 
                                                <select name="seccion" id="seccion<?php echo $i;?>">
                                                <?php
                                                    if($this->buscador_resultados[$i]['Perfil'] == "Alumno")
                                                    {
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Procedencia">Procedencia</option>
                                                            <option value="Adicionales">Adicionales</option>
                                                            <option value="Documentos">Documentos</option>
                                                            <?php
                                                    }else if($this->buscador_resultados[$i]['Perfil'] == "Docente"){
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Laborales">Datos laborales</option>
                                                            <option value="Documentos">Documentos</option>
                                                            <option value="Historial">Historial</option>
                                                        <?php                                                                
                                                    }
                                                    else if($this->buscador_resultados[$i]['Perfil'] == "Director"){
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Documentos">Documentos</option>
                                                        <?php                                                                
                                                    }
                                                    else if($this->buscador_resultados[$i]['Perfil'] == "Administrativo"){
                                                        ?>
                                                            <option value="Secciones">Todos</option>
                                                            <option value="Generales">Datos generales</option>
                                                            <option value="Contacto">Contacto</option>
                                                            <option value="Laborales">Datos laborales</option>
                                                            <option value="Documentos">Documentos</option>
                                                        <?php                                                                
                                                    }
                                                ?>
                                                </select>
                                                <div class="botones text-right">
                                                    <?php
                                                        if($this->buscador_resultados[$i]['Perfil'] == "Alumno")
                                                        {
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionAlumnoAdministrador(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir" onclick="pdfAlumno(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                            <?php
                                                        }else if($this->buscador_resultados[$i]['Perfil'] == "Docente"){
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionDocenteAdministrador(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir">
                                                            <?php
                                                        }else if($this->buscador_resultados[$i]['Perfil'] == "Director"){
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionDirectorAdministrador(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir" onclick="">
                                                            <?php
                                                        }else if($this->buscador_resultados[$i]['Perfil'] == "Administrativo"){
                                                            ?>
                                                                <input class="botonver" type="button" value="ver" onclick="definirSeccionAdministrativoAdministrador(<?php echo $this->buscador_resultados[$i]['ID'];?>,<?php echo $i;?>);">
                                                                <input class="botonimp" type="button" value="imprimir" onclick="">
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }
                    ?>
                    <!-- TARGETA -->
                </div>
                <!-- PAGINACION -->
                <div class="row my-2">
                    <div class="col justify-content-center align-items-center text-center">
                        <nav aria-label=" ">
                            <ul class="pagination ">
                                <?php
                                    if($this->pagina !=1){
                                        ?>
                                            <li class="page-item"><a class="page-link" href="<?php echo URL."perfil_administrador/buscador/".$this->buscar.'/'.$this->perfil.'/'.$this->carrera.'/'.($this->pagina-1);?>">Previous</a></li>
                                        <?php
                                    }else if($this->pagina == 1){
                                        ?>
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        <?php   
                                    }
                                    if($this->pagina < $this->total_paginas){
                                        ?>
                                            <li class="page-item"><a class="page-link" href="<?php echo URL."perfil_administrador/buscador/".$this->buscar.'/'.$this->perfil.'/'.$this->carrera.'/'.($this->pagina+1);?>">Next</a></li>
                                        <?php
                                    }else if($this->pagina == $this->total_paginas){
                                        ?>
                                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary">Imprimir todos</button>
                    </div>
                </div>
                <!-- PAGINACION -->
            </div>
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
