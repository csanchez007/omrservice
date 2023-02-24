<?php

require_once "conexion.php";

class ModelSession{
	/*=============================================
	INICIAR SESIÓN
	=============================================*/
    static public function iniciarSesion($tabla, $usuario, $pass){
        // $contrasena= base64_encode($pass);
        $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usser AND clave= :pass");

        $sql -> bindParam(":usser",$usuario, PDO::PARAM_STR);
        $sql -> bindParam(":pass", $pass, PDO::PARAM_STR);

        $sql ->execute();

       if($sql -> fetch() != false){
           return 1;
       }else{
           return 2;
       }
       
    }

	/*=============================================
	INSERTAR USUARIO
	=============================================*/
    static public function newUserMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USUARIO, APELLIDO, NOMBRE, CORREO, CLAVE, RCLAVE, FECHA_CREA) VALUES (:usuario, :apellido, :nombre, :correo, :clave, :rclave, :fecha_crea)");

		$stmt->bindParam(":usuario", $datos->USUARIO, PDO::PARAM_STR);
		$stmt->bindParam(":apellido", $datos->APELLIDO, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos->NOMBRE, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos->CORREO, PDO::PARAM_STR);
		$stmt->bindParam(":clave", $datos->CLAVE, PDO::PARAM_STR);
        $stmt->bindParam(":rclave", $datos->RCLAVE, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

    } 
    /*=============================================
	INSERTAR USUARIO POS SESIÓN
	=============================================*/
    static public function newUserPosSesionMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(USUARIO, TIPO_USUARIO, APELLIDO, NOMBRE, CORREO, CLAVE, RCLAVE, ACTIVO, USUARIO_CREA, FECHA_CREA) VALUES (:usuario, :tp, :apellido, :nombre, :correo, :clave, :rclave, :activo, :uc, :fecha_crea)");

        $stmt->bindParam(":usuario", $datos->USUARIO, PDO::PARAM_STR);
        $stmt->bindParam(":tp", $datos->TIPO_USUARIO, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos->APELLIDO, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos->NOMBRE, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos->CORREO, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos->CLAVE, PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos->ACTIVO, PDO::PARAM_STR);
        $stmt->bindParam(":uc", $datos->USUARIO_CREA, PDO::PARAM_STR);
        $stmt->bindParam(":rclave", $datos->RCLAVE, PDO::PARAM_STR);

        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

    } 

    /*=============================================
	LLAMAR A TODOS LOS USUARIOS
	=============================================*/
    static public function allUserMDL($tabla){

        $sql = Conexion::conectar()->prepare("SELECT *FROM $tabla WHERE estado = 1");

        $sql ->execute();

        return $sql -> fetchAll();
 

    }
    /*=============================================
    LLAMAR A TODOS LOS PREDEFINIDOS
    =============================================*/
    static public function allPredMDL($tabla){

        $sql = Conexion::conectar()->prepare("SELECT ID, DESCRIPCION FROM $tabla WHERE ACTIVO = 1");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }

    /*=============================================
	LLAMAR USUARIOS SESIÓN
	=============================================*/
    static public function consultaUserMDL($tabla, $tablaTipo, $usuario){
       // $contrasena= base64_encode($pass);
        $sql = Conexion::conectar()->prepare("SELECT id, usuario, tipo_usuario, apellido,
         nombre, correo, (SELECT descripcion FROM $tablaTipo 
         WHERE id = tipo_usuario) AS 'Descripcion', estado FROM $tabla WHERE usuario = :usser");

        $sql -> bindParam(":usser",$usuario, PDO::PARAM_STR);

        $sql ->execute();

        return $sql -> fetch();

    }

    /*=============================================
	LLAMAR USUARIOS PARA EDITAR
	=============================================*/
   static public function consultaUserEditMDL($tabla, $tablaTorre, $id){

        $sql = Conexion::conectar()->prepare("SELECT ID, USUARIO, TIPO_USUARIO, APELLIDO,
        NOMBRE, CORREO, TORRE, UNIDAD, ACTIVO, (SELECT DESCRIPCION FROM $tablaTorre WHERE CODIGO = TORRE)
        AS 'TORRES'  FROM $tabla WHERE USUARIO = :id");

        $sql -> bindParam(":id",$id, PDO::PARAM_STR);

        $sql ->execute();

        return $sql -> fetch();

    }

   /*=============================================
	LLAMAR PREDEFINIDOS
	=============================================*/
   static public function consultaPredefinidosMDL($tabla){

    $sql = Conexion::conectar()->prepare("SELECT *FROM $tabla");


    $sql ->execute();

    return $sql -> fetchAll();

}

    /*=============================================
	UPDATE USUARIO POS SESIÓN
	=============================================*/
    static public function updateUsePosSesionMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET TIPO_USUARIO=:tp, APELLIDO=:apellido, NOMBRE=:nombre, CORREO=:correo,
                                             CLAVE=:clave, RCLAVE=:rclave, ACTIVO=:activo, USUARIO_MODI=:uc, FECHA_MODI=:fecha_crea WHERE USUARIO=:usuario");

        $stmt->bindParam(":usuario", $datos->USUARIO, PDO::PARAM_STR);
        $stmt->bindParam(":tp", $datos->TIPO_USUARIO, PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos->APELLIDO, PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos->NOMBRE, PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos->CORREO, PDO::PARAM_STR);
        $stmt->bindParam(":clave", $datos->CLAVE, PDO::PARAM_STR);
        $stmt->bindParam(":activo", $datos->ACTIVO, PDO::PARAM_STR);
        $stmt->bindParam(":uc", $datos->USUARIO_CREA, PDO::PARAM_STR);
        $stmt->bindParam(":rclave", $datos->RCLAVE, PDO::PARAM_STR);

        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }
    
    /*=============================================
	INSERTAR DETALLE DE REPORTE USUARIO
	=============================================*/
    static public function newUserReporteMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idUsuario, unidad, descripcion, idPredef, descripcionQR, fecha, coords) VALUES (:idUsuario, :unidad, :descripcion, :idPredef, :descripcionQR, :fecha_crea, :coords)");

        $stmt->bindParam(":idUsuario", $datos->idCliente, PDO::PARAM_STR);
        $stmt->bindParam(":unidad", $datos->unidad, PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":idPredef", $datos->idPredef, PDO::PARAM_STR);
        $stmt->bindParam(":descripcionQR", $datos->descripcionQR, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":coords", $datos->coords, PDO::PARAM_STR);
		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

    }
    /*=============================================
	LLAMAR ID REPORTE PARA FOTOS
	=============================================*/
    static public function consultaUserReporteMDL($tabla, $rut){

        $sql = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE idUsuario = :rut ORDER BY id DESC LIMIT 1");

        $sql -> bindParam(":rut",$rut, PDO::PARAM_STR);

        $sql ->execute();

        return $sql -> fetch();

    }

    /*=============================================
	 REGISTRO DE REPORTES DE SOLUCION FOTOS
	=============================================*/
    static public function consultaSolFotoMDL($tabla, $rut){

        $sql = Conexion::conectar()->prepare("SELECT id FROM $tabla WHERE usuarios = :rut ORDER BY id DESC LIMIT 1");

        $sql -> bindParam(":rut",$rut, PDO::PARAM_STR);

        $sql ->execute();

        return $sql -> fetch();

    }
    /*=============================================
	INSERTAR FOTO DETALLE DE REPORTE USUARIO
	=============================================*/
    static public function reporteFotoMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idReporte, rutaFoto, usuario_crea, fecha_crea) VALUES (:idReporte, :rutaFoto, :crea, :fecha_crea)");

        $stmt->bindParam(":idReporte", $datos->idReporte, PDO::PARAM_STR);
        $stmt->bindParam(":rutaFoto", $datos->rutaFoto, PDO::PARAM_STR);
        $stmt->bindParam(":crea", $datos->usuario_crea, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

    }

    /*=============================================
	INSERTAR FOTO DETALLE DE SOLUCION USUARIO
	=============================================*/
    static public function solcionFotoMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idSolucion, rutaFoto, usuario_crea, fecha_crea) VALUES (:idSolucion, :rutaFoto, :crea, :fecha_crea)");

        $stmt->bindParam(":idSolucion", $datos->idSolucion, PDO::PARAM_STR);
        $stmt->bindParam(":rutaFoto", $datos->rutaFoto, PDO::PARAM_STR);
        $stmt->bindParam(":crea", $datos->usuario_crea, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);
        
		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}


    }
    /*=============================================
	INSERTAR DETALLE DE REPORTE USUARIO SOLUCION
	=============================================*/
    static public function newUserSolucionMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuarios, idReporte, desde, hasta, descripcion, rutaFoto, fecha_crea, usuario_crea, coords) VALUES (:usuario, :reporte, :desde, :hasta, :descripcion, :rutaFoto, :fecha_crea, :usuario_crea, :coords)");

        $stmt->bindParam(":usuario", $datos->usuario, PDO::PARAM_STR);
        $stmt->bindParam(":reporte", $datos->reporte, PDO::PARAM_STR);
        $stmt->bindParam(":desde", $datos->desde, PDO::PARAM_STR);
        $stmt->bindParam(":hasta", $datos->hasta, PDO::PARAM_STR);       
        $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
        $stmt->bindParam(":rutaFoto", $datos->rutaFoto, PDO::PARAM_STR);
        $stmt->bindParam(":fecha_crea", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":usuario_crea", $datos->usuario_crea, PDO::PARAM_STR);
        $stmt->bindParam(":coords", $datos->coords, PDO::PARAM_STR);


		if($stmt->execute()){

           
            $stmt = Conexion::conectar()->prepare("UPDATE detalle_reporte SET solucionado = 1 WHERE id = :reporte");
            $stmt->bindParam(":reporte", $datos->reporte, PDO::PARAM_STR);
            $stmt->execute();
            return "1";
		}else{

			return "2";
		
		}

		
    }

    /*=============================================
	CONSULTA DE REPORTE PARA SOLUCIÓN
	=============================================*/
    static public function consultaReporteMDL($tabla, $rut){

        $sql = Conexion::conectar()->prepare("SELECT id, descripcion FROM $tabla WHERE idUsuario= :rut  AND solucionado!=1");
        $sql -> bindParam(":rut",$rut, PDO::PARAM_STR);

        $sql ->execute();

        return $sql -> fetchAll();

    }
    /*=============================================
	UPDATE USUARIO POS SESIÓN
	=============================================*/
    static public function consultaUserEditNotiMDL($tabla, $usser, $userId){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET IDNOTIFICACION = '$userId' WHERE USUARIO='$usser'");

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }
    /*=============================================
	LLAMAR USUARIOS SESIÓN
	=============================================*/
    static public function consultaUserNotMDL($tabla, $usuario){
        // $contrasena= base64_encode($pass);
         $sql = Conexion::conectar()->prepare("SELECT IDNOTIFICACION FROM $tabla WHERE USUARIO = :usser");
 
         $sql -> bindParam(":usser",$usuario, PDO::PARAM_STR);
 
         $sql ->execute();
 
         return $sql -> fetch();

     }

}