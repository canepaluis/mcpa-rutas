<?php
class Carreras extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        //header("Location: ".URL."asignaturas/director");
        $this->view->render('carreras/director');
    }
}


?>