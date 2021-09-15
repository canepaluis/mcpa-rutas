<?php



class Biomedic extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->horarios = [];
        $this->view->horarios2 = [];
        $this->view->horarios3 = [];
        $this->view->horarios4 = [];
        $this->view->horarios5 = [];
        $this->view->horarios6 = [];
        $this->view->horarios7 = [];
    }

    function render(){
        $horarios = $this->model->get();
        $this->view->horarios = $horarios;

        $horarios2 = $this->model->get_2();
        $this->view->horarios2 = $horarios2;

        $horarios3 = $this->model->get_3();
        $this->view->horarios3 = $horarios3;

        $horarios4 = $this->model->get_4();
        $this->view->horarios4 = $horarios4;

        $horarios5 = $this->model->get_5();
        $this->view->horarios5 = $horarios5;

        $horarios6 = $this->model->get_6();
        $this->view->horarios6 = $horarios6;

        $horarios7 = $this->model->get_7();
        $this->view->horarios7 = $horarios7;

        $this->view->render('mpgh/biomedica');
    }
}
?>