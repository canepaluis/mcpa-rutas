<?php
class Planes extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        //header("Location: ".URL."asignaturas/director");
        
    }
    function render(){
        $this->view->render('planes/director');
    }
}


?>