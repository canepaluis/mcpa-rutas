<?php
    class Perfil_AdministradorModel extends Model{

        public function __construct(){
            parent::__construct();
        }

        public function getAlumnosSinBuscar(){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscar(){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscar(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscar(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosSinBuscarPerfil(){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarPerfil(){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarPerfil(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarPerfil(){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarPerfilCarrera($carrera){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarPerfilCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo", "$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }


        public function getAlumnosSinBuscarCarrera($carrera){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM alumnos a INNER JOIN cuenta c 
            ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesSinBuscarCarrera($carrera){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre  FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresSinBuscarCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM director_carrera dc INNER JOIN cuenta c 
            ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosSinBuscarCarrera($carrera){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE ca.Nom_Carrera = ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscar($buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM  
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ? ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscar($buscar){
            $sql="SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscar($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscar($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ? ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarPerfil($buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM 
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarPerfil($buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ?  AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarPerfil($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarPerfil($buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarPerfilCarrera($carrera, $buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre, ca.Nom_Carrera FROM 
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Alumno","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarPerfilCarrera($carrera,$buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre, ca.Nom_Carrera FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Docente", "$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarPerfilCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE p.nombre= ? AND ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Director","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarPerfilCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE p.nombre = ? AND ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("Administrativo","$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAlumnosConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Matricula, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM  
            alumnos a INNER JOIN cuenta c ON a.Matricula = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = a.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (Matricula LIKE ? OR Nombres LIKE ? OR Apellido_Materno LIKE ? OR Apellido_Paterno LIKE ?) ORDER BY Matricula";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDocentesConBuscarCarrera($carrera,$buscar){
            $sql=   "SELECT DISTINCT d.Num_Control, Nombres, Apellido_Materno, Apellido_Paterno, p.Nombre FROM docentes d 
            INNER JOIN cuenta c ON d.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil 
            INNER JOIN asignaturas_docente ad ON d.Num_Control = ad.Num_Control INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (d.Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY d.Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getDirectoresConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM 
            director_carrera dc INNER JOIN cuenta c ON dc.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = dc.ID_Carrera
            WHERE ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getAdministrativosConBuscarCarrera($carrera,$buscar){
            $sql="SELECT Num_Control, Nombres, Apellido_materno, Apellido_paterno, p.Nombre FROM administrativos ad INNER JOIN cuenta c  
            ON ad.Num_Control = c.ID_Mt_Ctl INNER JOIN perfiles p ON p.ID_Perfil = c.ID_Perfil INNER JOIN carrera ca ON ca.ID_Carrera = ad.ID_Carrera 
            WHERE ca.Nom_Carrera = ? AND (Num_Control LIKE ? OR Nombres LIKE ? OR Apellido_materno LIKE ? OR Apellido_paterno LIKE ?) ORDER BY Num_Control";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array("$carrera","%$buscar%","%$buscar%","%$buscar%","%$buscar%")); 

            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        //INSERT 
        public function getCarreras(){
            $sql = "SELECT ID_Carrera, Nom_Carrera FROM carrera";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }

        public function getAsignaturas(){
            $sql = "SELECT ID_Asig, Nombre_Asig FROM asignatura";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getPaises(){
            $sql = "SELECT ID_Pais, Nombre FROM paises";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getEstados(){
            $sql = "SELECT ID_Estado, Nombre FROM estados";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getMunicipios(){
            $sql = "SELECT ID_Municipio, Nombre FROM municipios";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
    
        public function getPlanesEstudios(){
            $sql = "SELECT Clave, Clave_Oficial FROM plan_de_estudio";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getPeriodos(){
            $sql = "SELECT ID_Periodo, Anio, Descripcion FROM periodos p INNER JOIN descripcion d ON p.ID_Descripcion = d.ID_Descripcion";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getTiposIngresos(){
            $sql = "SELECT ID_Ingreso, Nombre FROM tipo_ingreso";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getGrupos(){
            $sql = "SELECT ID_Grupos, Clave FROM grupos";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        //PROCEDENCIA
        public function getAreasBachilleres(){
            $sql = "SELECT ID_Bach_Area, Nombre FROM bachilleres_areas";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getBachilleresActualizar(){
            $sql = "SELECT ID_Bachiller, Nombre FROM bachilleres";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getGruposIndigenas(){
            $sql = "SELECT ID_Indigena, gi.Nombre AS grupo , li.Nombre AS lengua FROM datos_indigena di INNER JOIN grupo_indigena gi ON gi.ID_Grupo_Indigena = di.ID_Grupo_Indigena 
            INNER JOIN lengua_indigena li ON li.ID_Lengua = di.ID_Lengua";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getDiscapacidades(){
            $sql = "SELECT ID_Discapacidad, Nombre FROM discapacidades";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getBecas(){
            $sql = "SELECT ID_Beca, Nombre FROM becas";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
    
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getEstatusActualizar(){
            $sql = "SELECT * FROM estatus_perfil";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getGrados(){
            $sql = "SELECT ID_Grado, Nombre FROM grados";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getPuestos(){
            $sql = "SELECT ID_Puesto, Nombre FROM puestos";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getAreasAcademicas(){
            $sql = "SELECT ID_Area, Nombre FROM areas";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }
    
        public function getDepartamentos(){
            $sql = "SELECT ID_Departamento, Nombre FROM departamentos";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            if(!empty($consulta))
            {
                $resultado = array();
                while($fila =$consulta->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $fila;
                }
                return $resultado;
            }
            return false;
        }

        public function getPerfil($nombre){
            $sql = "SELECT ID_Perfil FROM perfiles WHERE Nombre= ?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($nombre));
            
            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function getOrigen($origen){
            $sql="SELECT ID_Origen FROM Origen WHERE ID_Pais= ? AND ID_Estado = ? AND ID_Municipio = ? ";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute([$origen['pais'],$origen['estado'], $origen['municipio']]); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function insertAlumno($data){
            $sql = "INSERT INTO alumnos (Matricula, Nombres, Apellido_Materno, Apellido_Paterno, ID_Carrera, Plan_estudio, Creditos_Acumulados, Periodo_Ingreso, Periodo_Actual, Imagen, Estatus, Tipo_Ingreso, Grupo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?,?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['nombres'], $data['ap_P'],$data['ap_M'],$data['carrera'],$data['plan_estudio'],$data['creditos'],$data['periodo_ingreso'],
            $data['periodo_actual'],$data['imagen'],$data['estatus'],$data['tipo_ingreso'], $data['grupo']]);

            return !empty($consulta) ? true : false;
        }

        public function insertDocente($data){
            $sql = "INSERT INTO docentes (Num_Control, Nombres, Apellido_materno, Apellido_paterno, Imagen, Estatus, ID_Grado, Periodo_Actual) 
            VALUES (?,?, ?,?,?, ?,?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['nombres'], $data['ap_P'],$data['ap_M'],$data['imagen'],$data['estatus'],$data['grado'],$data['periodo_ingreso']]);

            return !empty($consulta) ? true : false;
        }

        public function insertDirector($data){
            $sql = "INSERT INTO director_carrera (Num_Control, Nombres, Apellido_materno, Apellido_paterno, Imagen, Estatus, ID_Carrera, ID_Periodo) 
            VALUES (?,?, ?,?, ?, ?, ?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['nombres'], $data['ap_P'],$data['ap_M'],$data['imagen'],$data['estatus'],$data['carrera'],$data['periodo_ingreso']]);

            return !empty($consulta) ? true : false;
        }

        public function insertAdministrativo($data){
            $sql = "INSERT INTO administrativos (Num_Control, Nombres, Apellido_materno, Apellido_paterno, Imagen, Estatus, ID_Carrera) 
            VALUES (?, ?, ?, ?, ?,?, ?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['nombres'], $data['ap_P'],$data['ap_M'],$data['imagen'],$data['estatus'],$data['carrera']]);

            return !empty($consulta) ? true : false;
        }

        public function insertLaboral($data){
            $sql = "INSERT INTO datos_laborales (Num_Control, ID_Area, ID_Departamento, Fecha_ingreso, ID_Puesto) 
            VALUES (?, ?, ?, ?, ?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['area_academica'], $data['departamento'],$data['fecha_ingreso'],$data['puestos']]);

            return !empty($consulta) ? true : false;
        }

        public function insertGenerales($data){
            $sql = "INSERT INTO datos_generales (ID_Mt_Ctl, ID_Origen, Fecha_Nac, CURP, RFC, Estado_Civil, Genero) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['origen'], $data['nacimiento'],$data['curp'],$data['rfc'],$data['estado_civil'],$data['genero']]);

            return !empty($consulta) ? true : false;
        }

        public function insertContacto($data){
            $sql = "INSERT INTO contacto (ID_Mt_Ctl, Domicilio, Tel_Domicilio, Celular, Nombre_Emergencia, Tel_Emergencia) 
            VALUES (?,?, ?, ?,?, ?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['direccion'], $data['tel_fijo'],$data['celular'],$data['nombre_emergencia'],$data['num_emergencia']]);

            return !empty($consulta) ? true : false;
        }

        public function insertMedico($data){
            $sql = "INSERT INTO servicio_medico (ID_Mt_Ctl, Nombre, Num_Afiliacion, Estatus, Tipo_Sangre) VALUES (?,?,?, ?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['empresa_afiliada'], $data['nss'],$data['estatus_medico'],$data['tipo_sangre']]);

            return !empty($consulta) ? true : false;
        }

        public function insertProcedencia($data){
            $sql = "INSERT INTO procedencia (ID_Bachiller, Fecha_egreso, ID_Bach_Area, Prom_Gral, Prom_Exani_2, Prom_EGEL, Prom_TOEFL, Matricula) 
            VALUES (?,?,?,?,?,?,?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['bachiller'],$data['fecha_egreso'],$data['area_bachiller'], $data['general'],$data['exani'],$data['egel'],$data['toeftl'],$data['usuario']]);

            return !empty($consulta) ? true : false;
        }

        public function insertAdicional($data){
            $sql = "INSERT INTO datos_adicionales (Matricula, ID_Indigena, ID_Beca, ID_Discapacidad) 
            VALUES (?, ?,?, ?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['grupo_indigena'],$data['beca'], $data['discapacidad']]);

            return !empty($consulta) ? true : false;
        }

        public function insertCuenta($data){
            $sql = "INSERT INTO cuenta (ID_Mt_Ctl, Passw, ID_Perfil) 
            VALUES (?, ?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['password'],$data['perfil']]);

            return !empty($consulta) ? true : false;
        }

        public function insertDocumentos($data){
            $sql = "INSERT INTO documentos (Num_Control, ID_Carrera, ID_Asignatura, Estatus) 
            VALUES (?,?,?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['carrera'],$data['asignatura'],$data['estatus']]);

            return !empty($consulta) ? true : false;
        }

        public function insertAsignaturas($data){
            $sql = "INSERT INTO asignaturas_docente (Num_Control, ID_Carrera, ID_Asignatura, Estatus) 
            VALUES (?,?,?,?)";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute([$data['usuario'],$data['carrera'],$data['asignatura'],$data['estatus']]);

            return !empty($consulta) ? true : false;
        }

        public function getTiposDocumentos(){
            $sql = "SELECT ID_Tipo_Doc, Nombre FROM tipo_documentos";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }

        public function getEstatusDocumentos(){
            $sql = "SELECT ID_Tipo_Doc, Nombre FROM tipo_documentos";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute();
            
            return !empty($consulta) ? $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC) : false;
        }
        
    }
?>