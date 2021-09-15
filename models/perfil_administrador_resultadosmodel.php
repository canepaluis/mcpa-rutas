<?php

class Perfil_Administrador_ResultadosModel extends Model{

    public function __construct(){
        parent::__construct();
    }

            //Informacion del alumno
            public function getAlumno($id){
                $sql="SELECT * FROM alumnos WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getPlanEstudio($id){
                $sql="SELECT Clave_Oficial FROM plan_de_estudio WHERE Clave= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getDescripcionPeriodo($id){
                $sql="SELECT ID_Descripcion, Anio FROM periodos WHERE ID_Periodo= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getDescripcion($id){
                $sql="SELECT Descripcion FROM descripcion WHERE ID_Descripcion= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getIngreso($id){
                $sql="SELECT Nombre FROM tipo_ingreso WHERE ID_Ingreso= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getGrupo($id){
                $sql="SELECT Clave FROM grupos WHERE ID_Grupos= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
        //Informacion procedencia
            public function getProcedencia($id){
                $sql="SELECT * FROM procedencia WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBachilleres($id){
                $sql="SELECT Nombre FROM bachilleres WHERE ID_Bachiller= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBachilleresArea($id){
                $sql="SELECT Nombre FROM bachilleres_areas WHERE ID_Bach_Area= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
            
        //Informacion adicional
            public function getAdicionales($id){
                $sql="SELECT * FROM datos_adicionales WHERE Matricula= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getIndigena($id){
                $sql="SELECT * FROM datos_indigena WHERE ID_Indigena= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getGrupoIndigena($id){
                $sql="SELECT Nombre FROM grupo_indigena WHERE ID_Grupo_Indigena= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getLenguaIndigena($id){
                $sql="SELECT Nombre FROM lengua_indigena WHERE ID_Lengua= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getBeca($id){
                $sql="SELECT Nombre FROM becas WHERE ID_Beca= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            public function getDiscapacidad($id){
                $sql="SELECT Nombre FROM discapacidades WHERE ID_Discapacidad= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }

        //Informacion general
            public function getDatosGeneralesUsuario($id){
                $sql="SELECT * FROM datos_generales WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
         
            public function getCarreraUsuario($id){
                $sql="SELECT Nom_Carrera FROM carrera WHERE ID_Carrera= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }
    
            //Un resultado 
            public function getOrigenUsuario($id){
                $sql="SELECT * FROM origen WHERE ID_Origen= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }       
    
            //Un resultado 
            public function getPaisUsuario($id){
                $sql="SELECT Nombre FROM paises WHERE ID_Pais= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }      
    
            //Un resultado 
            public function getEstadoUsuario($id){
                $sql="SELECT Nombre FROM estados WHERE ID_Estado= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
            
            //Un resultado 
            public function getMunicipioUsuario($id){
                $sql="SELECT Nombre FROM municipios WHERE ID_Municipio= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
            
        //Informacion de contacto
            public function getContactoUsuario($id){
                $sql="SELECT * FROM contacto WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }  
            
        //Informacion del servicio medico
            public function getServicioMedicoUsuario($id){
                $sql="SELECT * FROM servicio_medico WHERE ID_Mt_Ctl= ?";//Se hace la consulta para validar los datos
                $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
                $consulta->execute(array($id)); 
    
                return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
            }   
    
        //Informacion de los documentos
            public function getDocumentosUsuario($id){
                $sql = "SELECT d.Nombre AS documento, Ruta, d.Estatus, td.Nombre AS tipo_documento FROM documentos d 
                INNER JOIN tipo_documentos td ON td.ID_Tipo_Doc = d.ID_Tipo_Doc WHERE ID_Mt_Ctl=?";
                $consulta= $this->db->connect()->prepare($sql);
                $consulta->execute(array($id));
    
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

            public function getTiposDocumentos(){
                $sql = "SELECT ID_Tipo_Doc, Nombre AS nombre_tipo_documento FROM tipo_documentos";
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

    //INFORMACION DEL DOCENTE
        public function getDocente($id){
            $sql="SELECT * FROM docentes WHERE Num_Control= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getGrado($id){
            $sql="SELECT Nombre FROM grados WHERE ID_Grado= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id)); 

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        public function getEstatus($id){
            $sql="SELECT Nombre FROM estatus_perfil WHERE ID_Estatus_Perfil= ?";//Se hace la consulta para validar los datos
            $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
            $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

    //Informacion laborales

        //Un resultado
        public function getLaboral($id){
            $sql = "SELECT * FROM datos_laborales WHERE Num_Control=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getLaboralArea($id){
            $sql = "SELECT Nombre FROM areas WHERE ID_Area=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

         //Un resultado
        public function getLaboralDepartamento($id){
            $sql = "SELECT Nombre FROM departamentos WHERE ID_Departamento=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

        //Un resultado
        public function getLaboralPuesto($id){
            $sql = "SELECT Nombre FROM puestos WHERE ID_Puesto=?";
            $consulta= $this->db->connect()->prepare($sql);
            $consulta->execute(array($id));

            return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
        }

    //INFORMACION DEL HISTORIAL
    public function getHistorial($id){
        $sql = "SELECT p.Anio, d.Descripcion, a.Nombre_Asig, c.Nom_Carrera FROM historial_docente hs 
        INNER JOIN periodos p ON p.ID_Periodo = hs.Periodo INNER JOIN descripcion d ON d.ID_Descripcion = p.ID_Descripcion 
        INNER JOIN asignatura a ON a.ID_Asig = hs.ID_Asig INNER JOIN carrera c ON c.ID_Carrera = hs.ID_Carrera
        WHERE Num_Control = ?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute(array($id));

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

    public function getAsignaturas($id){
        $sql = "SELECT a.Nombre_Asig, c.Nom_Carrera, ad.Estatus FROM asignaturas_docente ad 
        INNER JOIN asignatura a ON a.ID_Asig = ad.ID_Asignatura INNER JOIN carrera c ON c.ID_Carrera = ad.ID_Carrera 
        WHERE Num_Control=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute(array($id));

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

    //INFORMACION DEL DIRECTOR
    public function getDirector($id){
        $sql="SELECT * FROM director_carrera WHERE Num_Control= ?";//Se hace la consulta para validar los datos
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(array($id)); 

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    //INFORMACION ADMINISTRATIVO
    public function getAdministrativo($id){
        $sql="SELECT * FROM administrativos WHERE Num_Control= ?";//Se hace la consulta para validar los datos
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(array($id)); 

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }


    //INFORMACION PARA ACTUALIZAR 
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

    public function getImagen($id){
        $sql="SELECT Imagen FROM alumnos WHERE Matricula= ?";//Se hace la consulta para validar los datos
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute(array($id));//se utiliza el metodo execute para ejecutar la consulta

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function getOrigen($origen){
        $sql="SELECT ID_Origen FROM Origen WHERE ID_Pais= ? AND ID_Estado = ? AND ID_Municipio = ? ";//Se hace la consulta para validar los datos
        $consulta=$this->db->connect()->prepare($sql);//se asigna una variable para usar el metodo prepare
        $consulta->execute([$origen['pais'],$origen['estado'], $origen['municipio']]); 

        return !empty($consulta) ? $fila = $consulta->fetch(PDO::FETCH_ASSOC) : false;
    }

    public function updateDocumentos($data){
        $sql = "UPDATE documentos SET Nombre = ?, Ruta = ? , Estatus = ? , ID_Tipo_Doc = ? WHERE ID_Mt_Ctl = ?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['nombre'], $data['ruta'],$data['estatus'],$data['tipo'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function insertDocumentos($data){
        $sql = "INSERT INTO documentos (ID_Mt_Ctl, Nombre, Ruta, Estatus, ID_Tipo_Doc) 
        VALUES (?,?,?,?,?)";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['usuario'],$data['nombre'],$data['ruta'],$data['estatus'],$data['tipo_doc']]);

        return !empty($consulta) ? true : false;
    }

    public function deleteDocumento($data){
        $sql = "DELETE FROM documentos WHERE ID_Mt_Ctl = ? AND Nombre = ?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['usuario'],$data['nombre']]);

        return !empty($consulta) ? true : false;
    }

    public function updateAlumno($data){
        $sql = "UPDATE alumnos SET Nombres=?, Apellido_Materno=?, Apellido_Paterno=?, ID_Carrera=?, Plan_estudio=?, Creditos_Acumulados=?, 
        Periodo_Ingreso=?, Periodo_Actual=?, Imagen=?, Estatus=?, Tipo_Ingreso=?, 
        Grupo=? WHERE Matricula=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['nombres'], $data['ap_P'],$data['ap_M'],$data['carrera'],$data['plan_estudio'],$data['creditos'],$data['periodo_ingreso'],$data['periodo_actual']
        ,$data['imagen'],$data['estatus'],$data['tipo_ingreso'],$data['grupo'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }
    
    public function updateDocente($data){
        $sql = "UPDATE docentes SET Nombres=?, Apellido_materno=?, Apellido_paterno=?, 
        Imagen=?, Estatus=?, ID_Grado=?, Periodo_Actual=? WHERE Num_Control=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['nombres'], $data['ap_M'],$data['ap_P'],$data['imagen'],$data['estatus'], $data['grado'],$data['periodo_ingreso'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateDirector($data){
        $sql = "UPDATE director_carrera SET Nombres=?, Apellido_materno=?, Apellido_paterno=?,
         Imagen=?, Estatus=?, ID_Carrera=? WHERE Num_Control=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['nombres'], $data['ap_M'],$data['ap_P'],$data['imagen'],$data['estatus'], $data['carrera'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateAdministrativo($data){
        $sql = "UPDATE administrativos SET Nombres=?, Apellido_materno=?, Apellido_paterno=?, Imagen=?, Estatus=?, ID_Carrera=? WHERE Num_Control=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['nombres'], $data['ap_M'],$data['ap_P'],$data['imagen'],$data['estatus'], $data['carrera'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateGeneral($data){
        $sql = "UPDATE datos_generales SET ID_Origen=?, Fecha_Nac=?, CURP=?, RFC=?, Estado_Civil=?, Genero=? WHERE ID_Mt_Ctl=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['origen'], $data['nacimiento'],$data['curp'],$data['rfc'],$data['estado_civil'],$data['genero'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateContacto($data){
        $sql = "UPDATE contacto SET Domicilio=?, Tel_Domicilio=?, Celular=?, 
        Nombre_Emergencia=?, Tel_Emergencia=? WHERE ID_Mt_Ctl=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['domicilio'], $data['tel_domi'],$data['celular'],$data['nombre_emergencia'],$data['numero_emergencia'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateMedico($data){
        $sql = "UPDATE servicio_medico SET Nombre=?, Num_Afiliacion=?, Estatus=?, Tipo_Sangre=? WHERE ID_Mt_Ctl=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['empresa_afiliada'], $data['nss'],$data['estatus'],$data['tipo_sangre'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }
    
    public function updateProcedencia($data){
        $sql = "UPDATE procedencia SET ID_Bachiller=?, Fecha_egreso=?, ID_Bach_Area=?, Prom_Gral=?, Prom_Exani_2=?, Prom_EGEL=?, Prom_TOEFL=? WHERE Matricula=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['bachiller'], $data['fecha_egreso'],$data['area_bachiller'],$data['general'],$data['exani'],$data['egel'],$data['toeftl'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updateAdicional($data){
        $sql = "UPDATE datos_adicionales SET ID_Indigena=?, ID_Beca=?, ID_Discapacidad=? WHERE Matricula=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['grupo_indigena'], $data['beca'],$data['discapacidad'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    
    public function updateLaboral($data){
        $sql = "UPDATE datos_laborales SET ID_Area=?, ID_Departamento=?, Fecha_ingreso=?, ID_Puesto=? WHERE Num_Control=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['area_academica'], $data['departamento'],$data['fecha_ingreso'],$data['puestos'],$data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    public function updatePassword($data){
        $sql = "UPDATE cuenta SET Passw=? WHERE ID_Mt_Ctl=?";
        $consulta= $this->db->connect()->prepare($sql);
        $consulta->execute([$data['pass'], $data['usuario']]);

        return !empty($consulta) ? true : false;
    }

    
}
?>