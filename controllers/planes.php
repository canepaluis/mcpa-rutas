<?php

class Planes extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        $this->view->asignatura = [];

        //header("Location: ".URL."asignaturas/director");
        
    }
    function render(){
        if($this->session->get("tipo") == "Director" || $this->session->get("tipo") == "Administrador")
        {
            $this->rellenarSelect();
            $this->autoIncrement();
            $this->getPlanes();
            $this->view->render('planes/director');

        }else{
            $this->view->render('errores/error401');
        }
    }
    function mandar()
    {
        $asignatura = $this->model->get(['getplan'=>$this->session->get("plan"),'id_carrera'=>$this->session->get("coorCarrera")]);
        $this->view->asignatura = $asignatura;
   }
    function getPlanes()
    {
        //$carrera = $_GET['buscador'];
        //$plan = $_POST['plan'];
        $resultadoPlan=$this->model->getPlanes(['id_carrera'=>$this->session->get("coorCarrera"),'plan'=>$this->session->get("plan")]);
        //echo $resultado;
        if($resultadoPlan)
        {
            $this->view->resultadoPlan = $resultadoPlan;
        }
    }
    function getBuscador()
    {
        $plan = $_POST['plan'];
        $this->session->add("plan",$plan);
        $resultadoPlan=$this->model->getPlanes(['id_carrera'=>$this->session->get("coorCarrera"),'plan'=>$plan]);
        //echo $plan = $_POST['plan'];
        if($resultadoPlan)
        {
            $this->view->resultadoPlan = $resultadoPlan;
            $this->rellenarSelect();
            $this->mandar();
            $this->view->render('planes/director_select');
        }
    }
    function autoIncrement()
    {
        $autoIncrement = $this->model->autoIncrement();
        $this->view->autoIncrement = $autoIncrement;
        $conversion = intval($autoIncrement["Clave"]);
        $suma=$conversion+1;
        return $suma;
    }
    function insert()
    {
        $autoIncrement = $this->autoIncrement();
        $Cod_Revision   = $_POST['plan'];
        $Clave_Oficial  = $_POST['claveoficial'];
        $Per_Duracion   = $_POST['periododuracion'];
        $Creditos_Total = $_POST['creditostotales'];
        $Per_Max        = $_POST['periodomaximo'];
        $Total_Materias = $_POST['totalmaterias'];
        $res = $this->model->setPlanes(['clave'=>$autoIncrement,'id_carrera'=>$this->session->get("coorCarrera"),'plan'=>$Cod_Revision,'clave_oficial'=>$Clave_Oficial,'periodo_duracion'=> $Per_Duracion,
        'creditos_totales' => $Creditos_Total,'periodo_maximo'=> $Per_Max,'total_materias'=> $Total_Materias]);
       
        if($res == "SI"){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'gregarPlan');
            header("Location: ".URL."planes");
        }else{
            header("Location: ".URL."planes");
        }

    }
    function agregar()
    {
        $this->view->render('planes/director_insert');
    }
    function actualizar()
    {
        $this->view->render('planes/director_select');
    }
    function actualizarPlan()
    {
        $Cod_Revision   = $_POST['plan'];
        $Clave_Oficial  = $_POST['claveoficial'];
        $Per_Duracion   = $_POST['periododuracion'];
        $Creditos_Total = $_POST['creditostotales'];
        $Per_Max        = $_POST['periodomaximo'];
        $Total_Materias = $_POST['totalmaterias'];
        $res2 = $this->model->actualizarPlan(['id_carrera'=>$this->session->get("coorCarrera"),'plan'=>$Cod_Revision,'clave_oficial'=>$Clave_Oficial,'periodo_duracion'=> $Per_Duracion,
        'creditos_totales' => $Creditos_Total,'periodo_maximo'=> $Per_Max,'total_materias'=> $Total_Materias,'getplan'=>$this->session->get("plan")]);
        if($res2 == "SI"){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'actualizarPlan');
            header("Location: ".URL."planes");
        }else{
            header("Location: ".URL."planes");
        }
    }
    function rellenarSelect()
    {
        $select=$this->model->rellenarSelect($this->session->get("coorCarrera"));
        if($select)
        {
            $this->view->select = $select;
        }
    }

    /* FUNCIONES ENLACE ENTRE PLANES Y ASIGNATURAS */

    function gettoAsignatura(){
        $idasignatura=$_GET['k'];
        $asignatura = $this->model->get(['getplan'=>$this->session->get("plan"),'id_carrera'=>$this->session->get("coorCarrera")]);
        $this->session->add('lastsearch',$asignatura[$idasignatura]->Clave_Materia);
        $busqueda = $this->session->get("lastsearch");
        $this->consultar($busqueda);
        $this->getUnidades($busqueda); //No identifica la clase UNIDAD
        $countid=$this->getIDAsig($busqueda);
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/getAsignatura');
    }

    function consultar($busqueda){
        $resultado = $this->model->getAsignaturas($busqueda);
        if($resultado){
            $this->view->resultado = $resultado; 
        }else{
            return "NO";
        }  
    }

    function getUnidades($busqueda){
        $resultado = $this->model->getUnidades($this->getIDAsig($busqueda));
        if($resultado){
            $this->view->unidad = $resultado;
        }
    }

    function getIDAsig($busqueda){

        $resultado = $this->model->getIDASignatura($busqueda);

        if($resultado){
            $this->session->add("idasignatura",$resultado["ID_Asig"]);
            return $resultado["ID_Asig"];
            
        }  
    }

    function getUnidadesCuenta($id){
        $numero_unidades = $this->model->getUnidadesCount($id);
        $this->view->numero_unidades = $numero_unidades;
    }

    function llenadocuatrimestre(){
        $cuatrimestre=$this->model->getCuatrimestre();
        if($cuatrimestre){
            $this->view->cuatrimestre = $cuatrimestre;
        }
    }

    function llenadoplanestudio(){
        $planestudio=$this->model->getPlanestudio();
        if($planestudio){
            $this->view->planestudio = $planestudio;
        }

    }

    function llenadoareaacademica(){
        $areaacademica=$this->model->getAreaAcademica();
        if($areaacademica){
            $this->view->areaacademica = $areaacademica;
        }
    }
    /* TERMINAN FUNCIONES ENLACE ENTRE PLANES Y ASIGNATURAS */
}


?>