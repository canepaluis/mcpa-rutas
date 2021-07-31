<?php

class carrerasModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function insertar($datos){
        //insertar datos a la bd
        //echo "insertardatos xd";
        $query = $this->db->connect()->prepare('INSERT INTO carrera (Nom_Carrera, ID_Niv, ID_Sit, Inicio, Terminacion, Cordinador) 
        VALUES(:carrera, :grado, :situacion, :inicio, :termino, :coordinador)');
        $query->execute(['carrera' =>$datos['carrera'], 'inicio'=>$datos['inicio'], 'termino'=>$datos['termino'],
       'grado'=>$datos['grado'], 'situacion'=>$datos['situacion'], 'coordinador'=>$datos['coordinador']]);
       }
    
}