<?php

include_once 'models/horario.php';

class BiomedicModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }

    }

    public function get_2(){
        $items2 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 5, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items2, $item);
            }
            return $items2;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function get_3(){
        $items3 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 4, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items3, $item);
            }
            return $items3;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function get_4(){
        $items4 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 3, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items4, $item);
            }
            return $items4;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function get_5(){
        $items5 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 2, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items5, $item);
            }
            return $items5;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function get_6(){
        $items6 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 6, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items6, $item);
            }
            return $items6;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function get_7(){
        $items7 = [];
        
        try {
            $query = $this->db->connect()->query("SELECT * FROM asignatura LIMIT 7, 5");

            while ($row = $query->fetch()) {
                $item = new Horario();
                $item->Nombre_Asig = $row['Nombre_Asig'];
                array_push($items7, $item);
            }
            return $items7;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>