<?php
class Asignaturas extends Controller{
    private $session;
    
    function __construct(){
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
        $this->view->render('asignaturas/director');
    }
}


?>