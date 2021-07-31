
<?php

class Perfil_Administrador extends Controller{

    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
    }

    function render(){
        if($this->session->get("tipo") == "Administrador")
        {
            $this->view->render('perfil/administrador');
        }else{
            echo("<script> alert('¡Acceso denegado!');  window.location = ".URL."login';</script>");
        }
    }

    function agregar_perfil(){
        $this->view->render('perfil_administrador/agregar_perfil');
    }

    function agregar_alumno(){
        $this->view->render('perfil_administrador/agregar_alumno');
    }

    function agregar_docente(){
        $this->view->render('perfil_administrador/agregar_docente');
    }

    function agregar_director(){
        $this->view->render('perfil_administrador/agregar_director');
    }

    function agregar_administrativo(){
        $this->view->render('perfil_administrador/agregar_administrativo');
    }

    function buscador($params){
        if(count($params) == 4){
            $buscar = $params[0];
            $perfil = $params[1];
            $carrera = $params[2];
            $pagina = $params[3];
        }else if(count($params) == 3){
            $buscar = "";
            $perfil = $params[0];
            $carrera = $params[1];
            $pagina = $params[2];
        }else{
            $buscar = "";
            $carrera = "Carreras";
            $perfil = "Perfiles";
            $pagina = 1;
        }

        $perfil_definido = $perfil != "Perfiles" ? true : false;
        $carrera_definido = $carrera != "Carreras" ? true : false;

    //Array que agrega todos los resultados de la busqueda sin importar el peril o los campos diferentes, de esta manera solo se tiene control en una variable.
    $buscador_resultados = array();
    if($buscar != "")
    {
        if($perfil_definido ==true && $carrera_definido == false){ //UN ARRAY
        //Un perfil definido de todas las carreras
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosConBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == true && $carrera_definido == true){ //UN ARRAY
        //Un perfil definido de una carrera especifico
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosConBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosConBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesConBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresConBuscarCarrera($carrera,$buscar);
            $resultado_administrativos = $this->model->getAdministrativosConBuscarCarrera($carrera,$buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                 foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosConBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesConBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresConBuscar($buscar);
            $resultado_administrativos = $this->model->getAdministrativosConBuscar($buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }
    }else if($buscar == ""){
        if($perfil_definido ==true && $carrera_definido == false){ //UN ARRAY
        //Un perfil definido de todas las carreras
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosSinBuscarPerfil($buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }

        }else if($perfil_definido == true && $carrera_definido == true){ //UN ARRAY
        //Un perfil definido de una carrera especifico
            switch($perfil){
            case 'Alumnos':
                $resultado = $this->model->getAlumnosSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Matricula"], "Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Docentes':
                $resultado = $this->model->getDocentesSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_Paterno'],
                        "apM" => $resultado[$key]['Apellido_Materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Directores':
                $resultado = $this->model->getDirectoresSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            case 'Administrativos':
                $resultado = $this->model->getAdministrativosSinBuscarPerfilCarrera($carrera,$buscar);
                if($resultado)
                {
                    foreach($resultado as $key => $value){
                        $buscador_resultados[] = array("ID" => $resultado[$key]["Num_Control"],"Nombres" => $resultado[$key]['Nombres'], "apP" => $resultado[$key]['Apellido_paterno'],
                        "apM" => $resultado[$key]['Apellido_materno'], "Perfil" => $resultado[$key]['Nombre']);
                    }
                }
            break;
            }
        }else if($perfil_definido == false && $carrera_definido == true){ //TRES ARRAY
        //Todos los perfiles de una carrera especifico
            $resultado_alumnos = $this->model->getAlumnosSinBuscarCarrera($carrera,$buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscarCarrera($carrera,$buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscarCarrera($carrera,$buscar);
            $resultado_administrativos = $this->model->getAdministrativosSinBuscarCarrera($carrera,$buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }else if($perfil_definido == false && $carrera_definido == false){ //TRES ARRAY
            //Todos los perfiles de todas las carreras 
            $resultado_alumnos = $this->model->getAlumnosSinBuscar($buscar);
            $resultado_docentes = $this->model->getDocentesSinBuscar($buscar);
            $resultado_directores = $this->model->getDirectoresSinBuscar($buscar);
            $resultado_administrativos = $this->model->getAdministrativosSinBuscar($buscar);

            if($resultado_alumnos)
            {
                foreach($resultado_alumnos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_alumnos[$key]["Matricula"], "Nombres" => $resultado_alumnos[$key]['Nombres'], "apP" => $resultado_alumnos[$key]['Apellido_Paterno'],
                    "apM" => $resultado_alumnos[$key]['Apellido_Materno'], "Perfil" => $resultado_alumnos[$key]['Nombre']);
                }
            }
            if($resultado_docentes)
            {
                foreach($resultado_docentes as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_docentes[$key]["Num_Control"],"Nombres" => $resultado_docentes[$key]['Nombres'], "apP" => $resultado_docentes[$key]['Apellido_Paterno'],
                    "apM" => $resultado_docentes[$key]['Apellido_Materno'], "Perfil" => $resultado_docentes[$key]['Nombre']);
                }
            }
            if($resultado_directores)
            {
                foreach($resultado_directores as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_directores[$key]["Num_Control"],"Nombres" => $resultado_directores[$key]['Nombres'], "apP" => $resultado_directores[$key]['Apellido_paterno'],
                    "apM" => $resultado_directores[$key]['Apellido_materno'], "Perfil" => $resultado_directores[$key]['Nombre']);
                }
            }
            if($resultado_administrativos){
                foreach($resultado_administrativos as $key => $value){
                    $buscador_resultados[] = array("ID" => $resultado_administrativos[$key]["Num_Control"],"Nombres" => $resultado_administrativos[$key]['Nombres'], "apP" => $resultado_administrativos[$key]['Apellido_paterno'],
                    "apM" => $resultado_administrativos[$key]['Apellido_materno'], "Perfil" => $resultado_administrativos[$key]['Nombre']);
                }
            }
        }
    }
    $total_registros = count($buscador_resultados);
    $por_pagina = 4;
    $total_paginas = ceil($total_registros / $por_pagina);

    $inicio_pagina = ($pagina-1) * $por_pagina;
    $fin_pagina = ($pagina) * $por_pagina;

        $this->view->buscador_resultados = $buscador_resultados;
        $this->view->por_pagina = $por_pagina;
        $this->view->total_paginas = $total_paginas;
        $this->view->inicio_pagina = $inicio_pagina;
        $this->view->fin_pagina = $fin_pagina;
        $this->view->total_registros = $total_registros;
        //
        $this->view->perfil = $perfil;
        $this->view->carrera = $carrera;
        $this->view->buscar = $buscar;
        $this->view->pagina = $pagina;


        $this->view->render('perfil_administrador/buscador');
    }


}
?>