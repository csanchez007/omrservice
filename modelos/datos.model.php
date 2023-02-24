<?php

require_once "conexion.php";

class ModelDatos{

    /*=============================================
	INSERTAR DATOS GENERALES
	=============================================*/
    static public function newDatosGralMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (rutUsuario, numPatente, numMotor, revTecnica, perCirculacion, numChasis, modelo_marca, tipo_movil,  fechaCreacion, estado)
         VALUES (:rutUsuario, :numPatente, :numMotor, :revTecnica, :perCirculacion, :numChasis, :modelo_marca, :tipo_movil, :fechaCreacion, :estado)");

        $stmt->bindParam(":rutUsuario", $datos->rutUsuario, PDO::PARAM_STR);
        $stmt->bindParam(":numPatente", $datos->numPatente, PDO::PARAM_STR);
        $stmt->bindParam(":numMotor", $datos->numMotor, PDO::PARAM_STR);
        $stmt->bindParam(":revTecnica", $datos->revTecnica, PDO::PARAM_STR);
        $stmt->bindParam(":perCirculacion", $datos->perCirculacion, PDO::PARAM_STR);
        $stmt->bindParam(":numChasis", $datos->numChasis, PDO::PARAM_STR);
        $stmt->bindParam(":modelo_marca", $datos->modelo_marca, PDO::PARAM_STR);
        $stmt->bindParam(":tipo_movil", $datos->tipo_movil, PDO::PARAM_STR);
        $stmt->bindParam(":fechaCreacion", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
       

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}


    }

    /*=============================================
	LLAMAR A UN DATO
	=============================================*/
    static public function oneDatosGralMDL($tablaUsuario, $tabla, $tablaDatos,  $tablaMM, $tablaTM, $id){

        $sql = Conexion::conectar()->prepare("SELECT id, rutUsuario, numPatente,
        (SELECT nombre FROM $tablaUsuario WHERE usuario = rutUsuario LIMIT 1) AS 'Usuario', 
        rutUsuario, numMotor,
        (SELECT id FROM $tablaDatos WHERE id = revTecnica LIMIT 1) AS 'revTecnica',
        (SELECT id FROM $tablaDatos WHERE id = perCirculacion LIMIT 1) AS 'perCirculacion',
        (SELECT id FROM $tablaMM WHERE id = modelo_marca LIMIT 1) AS 'nomModelo',
        (SELECT id FROM $tablaTM WHERE id = tipo_movil LIMIT 1) AS 'tipo',
        numChasis, fechaCreacion FROM $tabla WHERE id = $id");

        $sql ->execute();

        return $sql -> fetchAll();
 
    }

    /*=============================================
	LLAMAR A TODOS LOS DATOS
	=============================================*/
    static public function AllDatosMDL($tablaUsuario, $tabla, $tablaDatos, $tablaMM, $tablaTM){

        $sql = Conexion::conectar()->prepare("SELECT id, rutUsuario, numPatente,
        (SELECT nombre FROM $tablaUsuario WHERE usuario = rutUsuario LIMIT 1) AS 'Usuario', 
        rutUsuario, numMotor,
        (SELECT nomEstado FROM $tablaDatos WHERE id = revTecnica LIMIT 1) AS 'revTecnica',
        (SELECT nomEstado FROM $tablaDatos WHERE id = perCirculacion LIMIT 1) AS 'perCirculacion',
        (SELECT nomMarca FROM $tablaMM WHERE id = modelo_marca LIMIT 1) AS 'nomMarca',
        (SELECT nomModelo FROM $tablaMM WHERE id = modelo_marca LIMIT 1) AS 'nomModelo',
        (SELECT nomTipoMovil FROM $tablaTM WHERE id = tipo_movil LIMIT 1) AS 'nomTipoMovil',      
        numChasis, fechaCreacion FROM $tabla");

        $sql ->execute();

        return $sql -> fetchAll();

    }

    /*=============================================
	UPDATE DATOS GENERALES
	=============================================*/
    static public function updateUDatosGralMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d");
        
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET rutUsuario=:rutUsuario, numPatente=:numPatente, numMotor=:numMotor, revTecnica=:revTecnica,
                                              perCirculacion=:perCirculacion, numChasis=:numChasis,
                                              modelo_marca=:modelo_marca, tipo_movil=:tipo_movil, fechaCreacion=:fechaCreacion, estado=:estado
                                              WHERE id=:id");

            $stmt->bindParam(":rutUsuario", $datos->rutUsuario, PDO::PARAM_STR);
            $stmt->bindParam(":numPatente", $datos->numPatente, PDO::PARAM_STR);
            $stmt->bindParam(":numMotor", $datos->numMotor, PDO::PARAM_STR);
            $stmt->bindParam(":revTecnica", $datos->revTecnica, PDO::PARAM_STR);
            $stmt->bindParam(":perCirculacion", $datos->perCirculacion, PDO::PARAM_STR);
            $stmt->bindParam(":numChasis", $datos->numChasis, PDO::PARAM_STR);
            $stmt->bindParam(":fechaCreacion", $fecha, PDO::PARAM_STR);
            $stmt->bindParam(":modelo_marca", $datos->modelo_marca, PDO::PARAM_STR);
            $stmt->bindParam(":tipo_movil", $datos->tipo_movil, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos->id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}
		
    }

    /*=============================================
	DELETE DATOS GENERALES
	=============================================*/
    static public function deleteDatosMDL($tabla, $id){
        
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }
}