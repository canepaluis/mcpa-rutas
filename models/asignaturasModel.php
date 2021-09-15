<?php
include_once 'models/unidad.php';
class asignaturasModel extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function setAsignaturas($datos) //las no sabemos los datos que van a ingresar, son variables
    {
        $query = $this->db->connect()->prepare("INSERT INTO asignatura
        (Clave_Materia, Nombre_Asig, Nombre_Corto, Creditos, Hrs_Clase, Hrs_Practicas, Hrs_Totales, Clave, Ruta_Descarga, Caracterizacion, Objetivos,
        Com_Especifica,ID_Area_Aca, ID_Cuat)
        VALUES
        (:clave_asig, :Nombre_asignatura, :Nombre_Corto, :Creditos, :Horas_teoricas, :Horas_Practicas, :Horas_Totales, :clave, :ruta, :caracterizacion, :intuicion,
        :competencia, :areaaca, :cuatrimestre)");
        $query->execute([
            'clave_asig' => $datos['clave_asig'], 
            'Nombre_asignatura' => $datos['Nombre_asignatura'],
            'Nombre_Corto' => $datos['Nombre_Corto'],
            'Creditos' => $datos['Creditos'],
            'Horas_teoricas' => $datos['Horas_teoricas'], 
            'Horas_Practicas' => $datos['Horas_Practicas'],
            'Horas_Totales' => $datos['Horas_Totales'], 
            'clave' => $datos['clave'], 
            'ruta' => $datos['ruta'], 
            'caracterizacion' => $datos['caracterizacion'],
            'intuicion' => $datos['intuicion'],
            'competencia'=>$datos['competencia'], 
            'areaaca' => $datos['areaaca'], 
            'cuatrimestre' => $datos['cuatrimestre']]);
    }

    public function setUnidades($datos){
        $query = $this->db->connect()->prepare("INSERT INTO unidades
        (Num_unidad, Sub_Unidad, Titulo_Unidad, Competencia, Actividades, ID_Asig)
        VALUES
        (:num_unidad, :sub_unidad, :titulo_unidad, :competencia, :actividades, :id_asig)");
        $query->execute(['num_unidad' => $datos['num_unidad'], 'sub_unidad' => $datos['sub_unidad'], 'titulo_unidad' => $datos['titulo_unidad'],
        'competencia' => $datos['competencia'], 'actividades' => $datos['actividades'], 'id_asig' => $datos['id_asig']]);
    }

    public function getAsignaturas($datos)
    {
        $sql = "SELECT a.Clave_Materia,a.Nombre_Asig, a.Nombre_Corto, a.ID_Cuat, a.Creditos, a.Hrs_Clase, a.Hrs_Practicas, a.Hrs_Totales, p.Cod_Revision, a.Clave, a.ID_Area_Aca, a.Unidades, a.Caracterizacion, a.Objetivos, a.Com_Especifica
        FROM asignatura as a
        INNER JOIN plan_de_estudio as p
        ON a.Clave = p.Clave
        WHERE a.Clave_Materia = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($datos));
        return !empty($consulta) ? $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function getCuatrimestre()
    {
        $sql="SELECT * FROM cuatrimestre";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array());
        return !empty($consulta) ? $consulta->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function getPlanestudio()
    {
        $sql="SELECT * FROM plan_de_estudio";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array());
        return !empty($consulta) ? $consulta->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function getAreaAcademica()
    {
        $sql="SELECT * FROM area_academica";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array());
        return !empty($consulta) ? $consulta->fetchAll(PDO::FETCH_OBJ) : false;
    }

    public function getIDAsignatura($id)
    {
        $sql = "SELECT ID_Asig FROM asignatura WHERE Clave_Materia = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id));
        return !empty($consulta) ? $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function getUnidad($id, $unidad)
    {
        $sql = "SELECT * FROM unidades WHERE ID_Asig = ? AND Num_unidad = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id, $unidad));
        return !empty($consulta) ? $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function getUnidades($id)
    {
        $items = [];
        try {
            $sql = "SELECT * FROM unidades WHERE ID_Asig = ? ORDER BY Num_unidad ASC";
            $consulta=$this->db->connect()->prepare($sql);
            $consulta->execute(array($id));
            while ($row = $consulta->fetch())
            {
                $item = new Unidad();
                $item->Num_unidad= $row["Num_unidad"];
                $item->Sub_Unidad= $row["Sub_Unidad"];
                $item->Titulo_Unidad= $row["Titulo_Unidad"];
                $item->Competencia= $row["Competencia"];
                $item->Actividades= $row["Actividades"];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
        
    }

    public function getUnidadesCount($id){
        $sql = "SELECT COUNT(*) FROM unidades WHERE ID_Asig = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id));
        return !empty($consulta) ? $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function deleteAsignatura($id)
    {
        $sql = "DELETE FROM asignatura WHERE ID_Asig = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id));
        return !empty($consulta) ? true : false;
    }

    public function deleteUnidadesmodal($id, $nounidad)
    {
        $sql = "DELETE FROM unidades WHERE ID_Asig = ? AND Num_unidad = ?";
        $consulta = $this->db->connect()->prepare($sql);
        $consulta->execute(array($id, $nounidad));
        return !empty($consulta) ? true : false;
    }

    public function deleteUnidades($id)
    {
        $sql = "DELETE FROM unidades WHERE ID_Asig = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id));
        return !empty($consulta) ? true : false;
    }
    
    public function updateAsignatura($datos)
    {
        $query = $this->db->connect()->prepare(
        'UPDATE asignatura 
        SET 
        Clave_Materia=:clavemateria,
        Nombre_Asig=:nombreasig, 
        Nombre_Corto=:nombrecorto, 
        ID_Area_Aca=:idareaaca, 
        Creditos=:creditos, 
        Hrs_Clase=:hrsclase, 
        Hrs_Practicas=:hrspracticas, 
        Hrs_Totales=:hrstotales,
        Caracterizacion=:caracterizacion, 
        Objetivos=:objetivos, 
        Com_Especifica=:comespecifica, 
        Ruta_Descarga=:rutadescarga, 
        ID_Cuat=:idcuat,
        Clave=:clave  
        WHERE ID_Asig=:idasig');
        
        $chequeo = $query->execute([
            'clavemateria' => $datos['clavemateria'],
            'nombreasig' => $datos['nombreasig'],
            'nombrecorto' => $datos['nombrecorto'],
            'idareaaca' => $datos['idareaaca'],
            'creditos' => $datos['creditos'],
            'hrsclase' => $datos['hrsclase'],
            'hrspracticas' => $datos['hrspracticas'],
            'hrstotales' => $datos['hrstotales'],
            'caracterizacion' => $datos['caracterizacion'],
            'objetivos' => $datos['objetivos'],
            'comespecifica' => $datos['comespecifica'],
            'rutadescarga' => $datos['rutadescarga'],
            'idcuat' => $datos['idcuat'],
            'clave' => $datos['clave'],
            'idasig' => $datos['idasig']
        ]);

        return !empty($chequeo) ? true : false;
    }

    public function updateUnidad($datos)
    {
        $query = $this->db->connect()->prepare(
            'UPDATE unidades 
            SET Sub_Unidad=:subunidad, Titulo_Unidad=:titulounidad,
            Competencia=:competencia, Actividades=:actividades
            WHERE ID_Asig=:idasig AND Num_unidad=:numunidad');

        $chequeo = $query->execute([
            'numunidad' => $datos['numunidad'],
            'subunidad' => $datos['subunidad'],
            'titulounidad' => $datos['titulounidad'],
            'competencia' => $datos['competencia'],
            'actividades' => $datos['actividades'],
            'idasig' => $datos['idasig']
        ]);

        return !empty($chequeo) ? true : false;
    }

    
}