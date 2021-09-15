<?php
class Asignaturas extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        
    }
    
    function render(){
        
        if($this->session->get("tipo") == "Director" || $this->session->get("tipo") == "Administrador")
        {
            $this->llenadocuatrimestre();
            $this->llenadoplanestudio();
            $this->llenadoareaacademica();
            $this->view->render('asignaturas/director');
        }else{
            $this->view->render('errores/error401');
            
        }

        
    }
    /*Llamado de funciones con variable de búsqueda*/
    function getAsignatura(){
        $busqueda = $_POST["busqueda"];
        $this->session->add("lastsearch",$busqueda);
        $resultadoBusqueda = $this->consultar($busqueda);
        $this->getUnidades($busqueda);

        $countid=$this->getIDAsig($busqueda);
        $this->getUnidadesCuenta($countid);

        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        if($resultadoBusqueda=='NO'){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'Buscar');
            $this->view->render('asignaturas/getAsignatura');
        }
        else{
            $this->view->render('asignaturas/getAsignatura');
        }
    }

    function updateAsignatura(){
        $resultadoActualizar = $this->actualizarAsignatura();
        $this->consultar($this->session->get("lastsearch"));
        $this->getUnidades($this->session->get("lastsearch"));

        $countid=$this->getIDAsig($this->session->get("lastsearch"));
        $this->getUnidadesCuenta($countid);

        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
    
        if($resultadoActualizar=='SI'){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'Actualizar');
            $this->view->render('asignaturas/getAsignatura');
        }else{
            $this->view->render('asignaturas/getAsignatura');
        }
    }

    function setUnidadSearched(){
        $this->registroUnidad();
        $this->consultar($this->session->get("lastsearch"));
        $this->getUnidades($this->session->get("lastsearch"));
        $countid=$this->getIDAsig($this->session->get("lastsearch"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/getAsignatura');
    }

    function eliminarUnidadSearched(){
        $id_row = $_GET['k']; //id del row presionado que pasaremos como el numero de unidad
        $id_asignatura = $this->session->get("idasignatura"); //id de la asignatura a la que pertenece
        $resultadoEliminar=$this->model->deleteUnidadesmodal($id_asignatura, $id_row);
        $this->consultar($this->session->get("lastsearch"));
        $this->getUnidades($this->session->get("lastsearch"));
        $countid=$this->getIDAsig($this->session->get("lastsearch"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        
        if($resultadoEliminar){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'confirmacionEliminar');
            $this->view->render('asignaturas/getAsignatura');
        }else{
            $this->view->render('asignaturas/getAsignatura');
        }
        
    }
    
    function gettoupdateUnidadSearched(){
        $id_row = $_GET['k']; //id del row presionado que pasaremos como el numero de unidad
        $id_asignatura = $this->session->get("idasignatura"); //id de la asignatura a la que pertenece
        $resultado = $this->model->getUnidad($id_asignatura, $id_row);
        if ($resultado){
            $this->view->resultado = $resultado;
        }
        $this->view->render('asignaturas/updateUnidad');
    }

    function getUnidadSearched(){
        $this->consultar($this->session->get("lastsearch"));
        $this->getUnidades($this->session->get("lastsearch"));
        $countid=$this->getIDAsig($this->session->get("lastsearch"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/getAsignatura');
    }

    function updateUnidadSearched(){
        $this->actualizarUnidad();
        $this->getUnidadSearched();
    }


    /*Sin búsqueda*/
    function setAsignatura(){
        $consultaAgregar = $this->registroAsignatura();
        $this->consultar($this->session->get("lastclaveasig"));
        $this->getUnidades($this->session->get("lastclaveasig"));
        $countid=$this->getIDAsig($this->session->get("lastclaveasig"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        if($consultaAgregar){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'Agregar');
            $this->view->render('asignaturas/gettAsignatura');
        }else{
            $this->view->render('asignaturas/gettAsignatura');
        }

    }

    function setUnidad(){
        $this->registroUnidad();
        $this->consultar($this->session->get("lastclaveasig"));
        $this->getUnidades($this->session->get("lastclaveasig"));
        $countid=$this->getIDAsig($this->session->get("lastclaveasig"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/gettAsignatura');
    }

    function eliminarUnidad(){
        $id_row = $_GET['id_objetivo']; //id del row presionado que pasaremos como el numero de unidad
        $id_asignatura = $this->session->get("idasignatura"); //id de la asignatura a la que pertenece
        $this->model->deleteUnidadesmodal($id_asignatura, $id_row);
        $this->consultar($this->session->get("lastclaveasig"));
        $this->getUnidades($this->session->get("lastclaveasig"));
        $countid=$this->getIDAsig($this->session->get("lastclaveasig"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/gettAsignatura');  
    }

    function getUnidad(){
        $this->consultar($this->session->get("lastclaveasig"));
        $this->getUnidades($this->session->get("lastclaveasig"));
        $countid=$this->getIDAsig($this->session->get("lastclaveasig"));
        $this->getUnidadesCuenta($countid);
        $this->llenadocuatrimestre();
        $this->llenadoplanestudio();
        $this->llenadoareaacademica();
        $this->view->render('asignaturas/gettAsignatura');
    }

    function gettoupdateUnidad(){
        $id_row = $_GET['k']; //id del row presionado que pasaremos como el numero de unidad
        $id_asignatura = $this->session->get("idasignatura"); //id de la asignatura a la que pertenece
        $resultado = $this->model->getUnidad($id_asignatura, $id_row);
        if ($resultado){
            $this->view->resultado = $resultado;
        }
        $this->view->render('asignaturas/updatteUnidad');
    }

    function updateUnidad(){
        $this->actualizarUnidad();
        $this->getUnidad();
    }


    /*Sin afiliación*/
    

    function deleteAsignatura(){
        $id_eliminar = $this->session->get("idasignatura");
        $this->model->deleteUnidades($id_eliminar);
        $this->model->deleteAsignatura($id_eliminar);
        $this->session->add("alerta", true);
        $this->session->add("tipoAlerta", 'Eliminar');
        $this->view->render("asignaturas/director");

    }

    function registroAsignatura()
    {
        $Clave           = $_POST['claveasignatura'];
        $Nombre_Asig     = $_POST['nombreasignatura'];
        $Nombre_Corto    = $_POST['nombrecortoasignatura'];
        $Creditos        = $_POST['creditoasignatura'];
        $Hrs_Clase       = $_POST['horasteoricas'];
        $Hrs_Practicas   = $_POST['horaspracticas'];
        $Hrs_Totales     = $_POST['horastotales'];
        $Plan_Academico  = $_POST['planasignatura'];
        $Ruta_Descarga   = $_POST['manual'];
        $Caracterizacion = $_POST['caracterizacion'];
        $intuicion       = $_POST['intuicion'];
        $Com_Especifica  = $_POST['competencia'];
        $ID_Area_Aca     = $_POST['area_asignatura'];
        $ID_Cuat         = $_POST['cuatrimestreasignatura'];
       
       
        $resultadoAgregar = $this->model->setAsignaturas([
            'clave_asig' => $Clave,
            'Nombre_asignatura' => $Nombre_Asig,
            'Nombre_Corto' => $Nombre_Corto,
            'Creditos' => $Creditos,
            'Horas_teoricas' => $Hrs_Clase, 
            'Horas_Practicas' => $Hrs_Practicas,
            'Horas_Totales' => $Hrs_Totales, 
            'clave' => $Plan_Academico, 
            'ruta' => $Ruta_Descarga, 
            'caracterizacion' => $Caracterizacion,
            'intuicion' => $intuicion, 
            'competencia' => $Com_Especifica, 
            'areaaca' => $ID_Area_Aca, 
            'cuatrimestre' => $ID_Cuat]);
        
        $this->session->add("lastclaveasig", $Clave);

        if($resultadoAgregar){
            return "SI";
        }else{
            return "NO"; 
        }
    }

    function registroUnidad()
    {
        $numero_unidad = $_POST['numerounidad'];
        $sub_unidad = $_POST['sub'];
        $titulo_unidad = $_POST['descripcion1'];
        $competencia = $_POST['competenciasgenericas'];
        $actividades = $_POST['actividades'];
        $id_asig = $this->session->get("idasignatura");
    
        $this->model->setUnidades(['num_unidad' => $numero_unidad, 'sub_unidad' => $sub_unidad, 
        'titulo_unidad' => $titulo_unidad, 'competencia' => $competencia, 'actividades' => $actividades, 'id_asig' => $id_asig]);
        $this->session->add("alerta", true);
        $this->session->add("tipoAlerta", 'agregarUnidad');

    }

    function actualizarAsignatura(){
        $Clave           = $_POST['claveasignatura'];
        $Nombre_Asig     = $_POST['nombreasignatura'];
        $Nombre_Corto    = $_POST['nombrecortoasignatura'];
        $ID_Area_Aca     = $_POST['area_asignatura'];
        $Creditos        = $_POST['creditoasignatura'];
        $Hrs_Clase       = $_POST['horasteoricas'];
        $Hrs_Practicas   = $_POST['horaspracticas'];
        $Hrs_Totales     = $_POST['horastotales'];
        $Caracterizacion = $_POST['caracterizacion'];
        $intuicion       = $_POST['intuicion'];
        $Com_Especifica  = $_POST['competencia'];
        $Ruta_Descarga   = $_POST['manual'];
        $ID_Cuat         = $_POST['cuatrimestreasignatura'];
        $planestudio     = $_POST['planasignatura'];
        $ID_Asig         = $this->session->get("idasignatura");

        $resultadoUpdate = $this->model->updateAsignatura([ //La función envía 1 cuando se cumple.
            'clavemateria' => $Clave,
            'nombreasig' => $Nombre_Asig,
            'nombrecorto' => $Nombre_Corto,
            'idareaaca' => $ID_Area_Aca,
            'creditos' => $Creditos,
            'hrsclase' => $Hrs_Clase, 
            'hrspracticas' => $Hrs_Practicas,
            'hrstotales' => $Hrs_Totales,
            'caracterizacion' => $Caracterizacion,
            'objetivos' => $intuicion, 
            'comespecifica' => $Com_Especifica,
            'rutadescarga' => $Ruta_Descarga,
            'idcuat' => $ID_Cuat,   
            'clave' => $planestudio, 
            'idasig' => $ID_Asig
        ]);

        if($resultadoUpdate){
            return "SI";
        }else{
            return "NO"; 
        }

    }

    function actualizarUnidad(){
        $numero_unidad = $_POST['numerounidad'];
        $sub_unidad = $_POST['sub'];
        $titulo_unidad = $_POST['descripcion1'];
        $competencia = $_POST['competenciasgenericas'];
        $actividades = $_POST['actividades'];
        $id_asig = $this->session->get("idasignatura");
    
        $resultadoActualizarUnidad = $this->model->updateUnidad(['numunidad' => $numero_unidad, 'subunidad' => $sub_unidad, 
        'titulounidad' => $titulo_unidad, 'competencia' => $competencia, 'actividades' => $actividades, 'idasig' => $id_asig]);
        if($resultadoActualizarUnidad){
            $this->session->add("alerta", true);
            $this->session->add("tipoAlerta", 'actualizarUnidad');
        }
    }

    function getUnidadesCuenta($id){
        $numero_unidades = $this->model->getUnidadesCount($id);
        $this->view->numero_unidades = $numero_unidades;
    }

    

    function consultar($busqueda){
        $resultado = $this->model->getAsignaturas($busqueda);
        if($resultado){
            $this->view->resultado = $resultado; 
        }else{
            return "NO";
        }  
    }

    function getIDAsig($busqueda){

        $resultado = $this->model->getIDASignatura($busqueda);

        if($resultado){
            $this->session->add("idasignatura",$resultado["ID_Asig"]);
            return $resultado["ID_Asig"];
            
        }  
    }

    function getUnidades($busqueda){
        $resultado = $this->model->getUnidades($this->getIDAsig($busqueda));
        if($resultado){
            $this->view->unidad = $resultado;
        }
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

}

?>