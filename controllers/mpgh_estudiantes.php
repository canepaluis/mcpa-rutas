<?php

class Mpgh_Estudiantes extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->session = new Session();
        $this->session->init();
     
    }

    function render()
    {
        $this->view->render('mpgh/estudiantes');
    }
    
    

}


?>