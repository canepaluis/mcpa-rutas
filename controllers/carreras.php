<?php
class Carreras extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        //header("Location: ".URL."asignaturas/director");
        
    }
    function render(){
        if($this->session->get("tipo") == "Director" || $this->session->get("tipo") == "Administrador")
        {
            $this->view->render('carreras/director');
        }else{
            $this->view->render('errores/error401');
        }
    }
    
    function registrarCarrera(){
        //echo "registrarcarrera si funciona xd";
        $nomCarrera = $_POST['carrera'];
        $fecInicio = $_POST['fechainicio'];
        $fecTermino = $_POST['fechatermino'];
        $graAcademico = $_POST['graAcademico'];
        $situación = $_POST['situacion'];
        $nomCoordinador = $_POST['coordinador'];

        $this->model->insertar(['carrera' => $nomCarrera, 'inicio' => $fecInicio, 'termino' => $fecTermino, 'grado' => $graAcademico,
        'situacion' => $situación, 'coordinador' => $nomCoordinador]);

        header("Location: ".URL."carreras");
    }

}


?>