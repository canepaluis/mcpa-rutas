<?php
include_once 'models/asignatura.php';
include_once 'models/unidad.php';
class planesModel extends Model {
    
    public function __construct(){
        parent::__construct();
    }
    public function get($datos)
    {
        $items = [];
        try
        {
            $sql = "SELECT a.Clave_Materia, a.Nombre_Asig,a.Creditos,a.Unidades,a.Hrs_Totales,p.Cod_Revision 
            FROM asignatura as a 
            INNER JOIN plan_de_estudio as p 
            ON a.Clave = p.Clave 
            WHERE p.Cod_Revision = :getplan AND p.ID_Carrera = :id_carrera";
            $consulta=$this->db->connect()->prepare($sql);
            $consulta->execute(['getplan'=>$datos['getplan'],'id_carrera'=>$datos['id_carrera']]);
            while($row = $consulta->fetch())
            {
                $item = new Asignatura();
                $item->Clave_Materia = $row['Clave_Materia'];
                $item->Nombre_Asig = $row['Nombre_Asig'];
                $item->Creditos = $row['Creditos'];
                $item->Unidades = $row['Unidades'];
                $item->Hrs_Totales = $row['Hrs_Totales'];
                $item->Cod_Revision = $row['Cod_Revision'];
                array_push($items,$item);
            }     
            return $items;
        }
        catch(PDOException $e)
        {
            return [];
        }
    }
    public function getPlanes($id)
    {
        $sql="SELECT p.Clave_Oficial,p.Cod_Revision,p.Total_Materias,p.Per_Duracion,p.Creditos_Total,p.Per_Max,c.Nom_Carrera
        FROM plan_de_estudio as p
        INNER JOIN carrera as c
        on c.ID_Carrera = p.ID_Carrera
        WHERE p.ID_Carrera = :id_carrera AND p.Cod_Revision =:plan";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(['id_carrera'=>$id['id_carrera'],'plan'=>$id['plan']]); 
        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }
    public function autoIncrement()
    {
        $sql="SELECT Clave
        FROM plan_de_estudio
        ORDER BY Clave DESC
        LIMIT 1";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(); 
        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    } 

    public function setPlanes($datos) //especificar datos de entrada
    {
        $query = $this->db->connect()->prepare("INSERT INTO plan_de_estudio(Clave,ID_Carrera,Cod_Revision,Clave_Oficial,Per_Duracion,Creditos_Total,Per_Max,Total_Materias)
        VALUES(:clave,:id_carrera,:plan,:clave_oficial,:periodo_duracion,:creditos_totales,:periodo_maximo,:total_materias)");
        $resultado2 = $query->execute(['clave'=>$datos['clave'],'id_carrera'=>$datos['id_carrera'],'plan'=> $datos['plan'],'clave_oficial'=> $datos['clave_oficial'],
                'periodo_duracion' => $datos['periodo_duracion'],'creditos_totales' => $datos['creditos_totales'],
                'periodo_maximo'   => $datos['periodo_maximo'],'total_materias'   => $datos['total_materias']]);
        if($resultado2){
            return "SI";
        }
    }
     public function actualizarPlan($datos)
    {
        $query = $this->db->connect()->prepare("UPDATE plan_de_estudio SET Cod_Revision=:plan,Clave_Oficial=:clave_oficial,
        Per_Duracion=:periodo_duracion,Creditos_Total=:creditos_totales,Per_Max=:periodo_maximo,Total_Materias=:total_materias
        WHERE ID_Carrera = :id_carrera AND Cod_Revision = :getplan");
        $resultado = $query->execute([
            'plan' =>$datos['plan'],
            'clave_oficial' =>$datos['clave_oficial'],
            'periodo_duracion' =>$datos['periodo_duracion'],
            'creditos_totales' =>$datos['creditos_totales'],
            'periodo_maximo' =>$datos['periodo_maximo'],
            'total_materias' =>$datos['total_materias'],
            'id_carrera' => $datos['id_carrera'],
            'getplan'=>$datos['getplan']
        ]);

        if($resultado){
            return "SI";
        }


    } 
    public function rellenarSelect($id)
    {
            $sql="SELECT Cod_Revision FROM plan_de_estudio WHERE ID_Carrera = ? ORDER BY Cod_Revision";
            //$query = $this->db->connect()->prepare($sql);
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 
    
            return $consulta->fetchAll(PDO::FETCH_OBJ);
    }

    /*FUNCIONES DE ENLACE ENTRE PLANES Y ASIGNATURAS*/
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

    public function getIDAsignatura($id)
    {
        $sql = "SELECT ID_Asig FROM asignatura WHERE Clave_Materia = ?";
        $consulta=$this->db->connect()->prepare($sql);
        $consulta->execute(array($id));
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

    /*TERMINAN FUNCIONES DE ENLACE ENTRE PLANES Y ASIGNATURAS*/
}