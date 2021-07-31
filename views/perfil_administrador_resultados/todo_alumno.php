<?php
	$session = new Session();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title><?php echo $this->usuario; ?></title>

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
                            <li class="menu-directorio-link"><a style="color: #fff; font-size:18px;" href="<?php echo URL.'perfil_administrador/buscador/Todos';?>">BUSCADOR</a></li>
                            <li class="menu-directorio text_resaltado" aria-current="page">RESULTADO <?php echo $this->usuario; ?></li>
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
            <form class="container">
                <div class="row rowgreen"></div>
                <div class="row rowhite">
                    <div class="col">                    
                        <!-- DATOS DEL ALUMNO -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Datos del Alumno</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Matricula</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Matricula']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Nombres</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Nombres']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido paterno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Apellido_Paterno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Apellido materno</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Apellido_Materno']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Carrera</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_carrera['Nom_Carrera']; ?>">
                                    </div>
                                    <div class="col-6">
                                        <label>Estatus</label>
                                        <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Estatus']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 imageform">
                                <img class="rounded-circle z-depth-1-half avatar-pic image-fluid" src="<?php echo URL;?>public/assets/fotos/<?php echo $this->resultado_alumno['Imagen']; ?>" width="200" alt="example placeholder avatar">
                            </div>
                            <div class="col-6">
                                <label>Plan de estudios</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_plan_estudio['Clave_Oficial']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Periodo de ingreso</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_descripcion_periodo_ingreso['Descripcion'].' '.$this->resultado_id_descripcion_periodo_ingreso['Anio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Periodo actual</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_descripcion_periodo_actual['Descripcion'].' '.$this->resultado_id_descripcion_periodo_actual['Anio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Creditos</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_alumno['Creditos_Acumulados']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Tipo de ingreso</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_ingreso['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Grupo</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_grupo['Clave']; ?>">
                            </div>
                        </div>
                        <br>
                        <!-- DATOS GENERALES -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Datos generales</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">      
                            <div class="col-6">
                                <label>Fecha de nacimiento</label>
                                <input type="date" class="form-control" disabled value="<?php echo $this->resultado_generales['Fecha_Nac'] ?>">
                            </div>
                            <div class="col-6">
                                <label>Pais</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_pais['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Estado</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_estado['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Municipio</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_municipio['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>CURP</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['CURP']; ?>">
                            </div>

                            <div class="col-6">
                                <label>Estado civil</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['Estado_Civil']; ?>">
                            </div>
                            <div class="col-6">
                                <label>RFC</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['RFC']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Genero</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_generales['Genero']; ?>">
                            </div>
                        </div>   
                        <br>
                        <!-- CONTACTO -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Datos de contacto</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-12">
                                <label>Dirección</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Domicilio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Telefono fijo</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Tel_Domicilio']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Celular</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Celular']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Nombre de emergencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Nombre_Emergencia']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Numero de emergencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_contacto['Tel_Emergencia']; ?>">
                            </div>                                  
                        </div>  
                        <br>
                        <!-- SEGURO MEDICO -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Datos del seguro medico</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Empresa afiliada</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Nombre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>NSS</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Num_Afiliacion']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Tipo de sangre</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Tipo_Sangre']; ?>">
                            </div>
                            <div class="col-6">
                                <label>Estatus</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_medico['Estatus']; ?>">
                            </div>                               
                        </div>  
                        <br>
                        <!-- PROCEDENCIA -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Datos de procedencia</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Escuela de procedencia</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_bachiller['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Area</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_bachiller_area['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio general</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_Gral'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio exani II</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_Exani_2'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio egel</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_EGEL'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Promedio toefl</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Prom_TOEFL'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Fecha de egreso</label>
                                <input type="date" class="form-control" disabled value="<?php echo $this->resultado_procedencia['Fecha_egreso'] ;?>">
                            </div>                             
                        </div>   
                        <br>
                        <!-- DATOS ADICIONALES -->
                        <div class="row">
                            <div class="col">
                                <p style="font-size:18px; font-weight:bold;">Otros datos</p>
                                <hr>
                            </div>
                        </div>
                        <div class="row formcss">
                            <div class="col-6">
                                <label>Grupo indigena</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_grupo_indigena['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Lengua indigena</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_lengua['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Discapacidad</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_discapacidad['Nombre'] ;?>">
                            </div>
                            <div class="col-6">
                                <label>Beca</label>
                                <input type="text" class="form-control" disabled value="<?php echo $this->resultado_beca['Nombre'] ;?>">
                            </div>                          
                        </div>  
                        <br>                      
                        <!-- DOCUMENTOS -->
                        <div class="row formcss">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <p style="font-size:18px; font-weight:bold;">Documentos</p>
                                    </div>   
                                    <hr>  
                                </div>   
                                <table class="table text-center">
                                <thead style="background: #00b6bf; color: #fff;">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Tipo de Documento</th>
                                        <th scope="col">Estatus</th>
                                        <th scope="col">Ver</th>
                                    </tr>
                                </thead>
                                <tbody class="justify-content-center align-items-center">
                                <?php
                                    if($this->resultado_documentos)
                                    {
                                        foreach($this->resultado_documentos as $key => $value)
                                        {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['documento'] ;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['tipo_documento'] ;?>
                                                    </td>
                                                    <td>
                                                        <?php echo $this->resultado_documentos[$key]['Estatus'] ;?>
                                                    </td>
                                                    <td><a href="<?php echo URL;?>public/docs/<?php echo $this->resultado_documentos[$key]['documento'] ;?>" target="_blank"><button
                                                            type="button" class="btn btn-secondary">Ver Documento</button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                                </tbody>
                                </table>     
                            </div>
                        </div>    
                        <br>
                        <div class="row justify-content-end align-items-end text-right mr-3" style="width:100px;">
                            <button type="submit" class="btn btn-primary " name="imp">Imprimir</button>
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
