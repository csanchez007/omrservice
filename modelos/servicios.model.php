<?php

require_once "conexion.php";

class ModelServicios{
    /*=============================================
	LLAMAR A TODOS LOS TIPO USUARIOS
	=============================================*/
    static public function allallServiciosMDL($usuario, $tabla, $tablaFoto, $usser){

        $sql = Conexion::conectar()->prepare("SELECT id, idUsuario,id_numPatente,
        (SELECT nombre FROM $usuario WHERE id = idUsuario LIMIT 1) AS 'Usuario',
        (SELECT numPatente FROM modelo_marca WHERE id = id_numPatente LIMIT 1) AS 'numPatente', 
        descripcion, descripcionQR, fecha, (CASE estado WHEN  '1' THEN 'Activo' ELSE 'Inactivo' END) as 'est',
        (SELECT rutaFoto FROM $tablaFoto WHERE idReporte = id LIMIT 1) AS 'rutaFoto',
        (CASE solucionado WHEN  '1' THEN 'Si' ELSE 'No' END) as 'solucions'
        FROM $tabla WHERE solucionado!=1 AND idUsuario= '$usser' ORDER BY fecha DESC");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }
    /*=============================================
	LLAMAR UNO REPORTE POR USUARIOS 
	=============================================*/
    static public function oneServiciosMDL($idReporte, $tablaCliente, $tabla, $tablaFoto){

        $sql = Conexion::conectar()->prepare("SELECT id, idUsuario, id_numPatente,
        (SELECT nombre FROM $tablaCliente WHERE id = idUsuario LIMIT 1) AS 'Usuario', 
        idPredef, descripcion, descripcionQR, fecha, estado, coords, solucionado AS IDSolucionado,
        (SELECT rutaFoto FROM $tablaFoto WHERE idReporte = id LIMIT 1) AS 'rutaFoto',
        (CASE solucionado WHEN  '1' THEN 'Si' ELSE 'No' END) as 'solucions' FROM $tabla WHERE id = $idReporte");

        $sql ->execute();

        return $sql -> fetch();

    }
    /*=============================================
	LLAMAR A UNO LOS TIPO USUARIOS OARA REPORTE
	=============================================*/
    static public function oneSolucionMDL($idSolucion, $tablaCliente, $tabla, $tablaFoto){

        $sql = Conexion::conectar()->prepare("SELECT id, idReporte, idUsuario,
        (SELECT nombre FROM $tablaCliente WHERE id = idUsuario LIMIT 1)AS 'Clientes', 
        desde, hasta, descripcion,coords, 
        (SELECT rutaFoto FROM $tablaFoto WHERE idSolucion = id LIMIT 1) AS 'rutaFoto'
         FROM $tabla WHERE id = $idSolucion");

        $sql ->execute();

        return $sql -> fetchAll();

    }

    /*=============================================
	LLAMAR A UNO LOS TIPO USUARIOS PARA REPORTE
	=============================================*/
    static public function oneServiciosFotodMDL($idReporte, $tablaFoto){

        $sql = Conexion::conectar()->prepare("SELECT rutaFoto FROM $tablaFoto WHERE idReporte = $idReporte AND activo=1");

        $sql ->execute();

        return $sql -> fetchAll();

    }
    /*=============================================
	CONSULTA ALBUM  DE SOLUCION POR USUARIO
	=============================================*/
    static public function oneSolucionFotodMDL($idSolucion, $tablaFoto){

        $sql = Conexion::conectar()->prepare("SELECT rutaFoto FROM $tablaFoto WHERE idSolucion = $idSolucion AND activo=1");

        $sql ->execute();

        return $sql -> fetchAll();


    }
    /*=============================================
	LLAMAR A TODAS LAS SOLUCIONES
	=============================================*/
    static public function allallSolucionMDL($tablaCliente, $tabla, $tablaFoto, $usser){

        $sql = Conexion::conectar()->prepare("SELECT id,
        (SELECT NOMBRE FROM $tablaCliente WHERE USUARIO = usuarios LIMIT 1) AS 'Clientes', 
        desde, hasta, descripcion,
        (SELECT rutaFoto FROM $tablaFoto WHERE idSolucion = id LIMIT 1) AS 'rutaFoto' 
        FROM $tabla WHERE usuarios= '$usser' ORDER BY fecha_crea DESC");

        $sql ->execute();

        return $sql -> fetchAll();
    }

    /*=============================================
	LLAMAR A TODOS ESTADOS DATOS
	=============================================*/
    static public function allEstadoDatoMDL($tabla){

        $sql = Conexion::conectar()->prepare("SELECT *FROM $tabla");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }
    
    /*=============================================
	LLAMAR A TODOS TIPO DATOS
	=============================================*/
    static public function allTipoDatoMDL($tabla){

        $sql = Conexion::conectar()->prepare("SELECT *FROM $tabla");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }
    
    /*=============================================
	LLAMAR A TODOS TIPO DATOS
	=============================================*/
    static public function allMMDMDL($tabla){

        $sql = Conexion::conectar()->prepare("SELECT *FROM $tabla");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }

    /*=============================================
	UPDATE REPORTE DESDE LA WEB
	=============================================*/
    static public function updateReporteMDL($tabla, $datos){

        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET idPredef=:idPredef, descripcion=:descripcion WHERE id=:id");

            $stmt->bindParam(":idPredef", $datos->idPredef, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos->id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}
		
    }

}