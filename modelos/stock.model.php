<?php

require_once "conexion.php";
/*=============================================
STOCK EQUIPAMIENTO
=============================================*/
class StockModel{

	/*=============================================
	INSERTAR STOCK - EQUIPAMIENTO
	=============================================*/
    static public function newStockMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        $fecha = date("Y-m-d G:i:s");
        
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla
        (nom_producto, cod_producto, descripcion, cantidad_entrante, cantidad_saliente, cantidad_total, precio, ruta_foto, estado, tipo)
         VALUES (:nom_producto, :cod_producto, :descripcion, :cantidad_entrante, :cantidad_saliente, :cantidad_total, :precio, :ruta_foto, :estado, :tipo)");

		$stmt->bindParam(":nom_producto", $datos->nom_producto, PDO::PARAM_STR);
		$stmt->bindParam(":cod_producto", $datos->cod_producto, PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_entrante", $datos->cantidad_entrante, PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_saliente", $datos->cantidad_saliente, PDO::PARAM_STR);
        $stmt->bindParam(":cantidad_total", $datos->cantidad_total, PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos->precio, PDO::PARAM_STR);
        $stmt->bindParam(":ruta_foto", $datos->ruta_foto, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos->tipo, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

    } 
    /*=============================================
	LLAMAR A TODOS STOCK - EQUIPAMIENTO
	=============================================*/
    static public function allStockMDL($tabla, $tipo){

        $sql = Conexion::conectar()->prepare("SELECT id, nom_producto, cod_producto, descripcion,
        cantidad_entrante, cantidad_saliente, cantidad_total, precio, ruta_foto, estado, tipo,
        (CASE estado WHEN  '1' THEN 'Activo' ELSE 'Inactivo' END) as 'est' FROM $tabla WHERE tipo=:tipo");

        $sql -> bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $sql ->execute();

        return $sql -> fetchAll();
 

    }
    /*=============================================
	CONSULTAR POR STOCK EQUIPAMIENTO
	=============================================*/
    static public function consultaStockMDL($tabla, $id, $tipo){
        // $contrasena= base64_encode($pass);
        $sql = Conexion::conectar()->prepare("SELECT id, nom_producto, cod_producto, descripcion,
        cantidad_entrante, cantidad_saliente, cantidad_total, precio, ruta_foto, estado, tipo,
        (CASE estado WHEN  '1' THEN 'Activo' ELSE 'Inactivo' END) as 'est' FROM $tabla WHERE id=:id AND tipo= :tipo");

        $sql -> bindParam(":id", $id, PDO::PARAM_STR);  
        $sql -> bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $sql ->execute();

 
         $sql ->execute();
 
         return $sql -> fetch();

     }


    /*=============================================
	UPDATE STOCK EQUIPAMIENTO
	=============================================*/
    static public function updateStockMDL($tabla, $datos){
        date_default_timezone_set("America/Santiago");
        // $fecha = date("Y-m-d G:i:s");
       // var_dump($datos);
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nom_producto=:nom_producto, cod_producto=:cod_producto, descripcion=:descripcion, 
                                               cantidad_entrante=:cantidad_entrante, cantidad_saliente=:cantidad_saliente, 
                                               cantidad_total=:cantidad_total, precio=:precio, ruta_foto=:ruta_foto, estado=:estado, tipo=:tipo
                                               WHERE id=:id");

            $stmt->bindParam(":nom_producto", $datos->nom_producto, PDO::PARAM_STR);
            $stmt->bindParam(":cod_producto", $datos->cod_producto, PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos->descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_entrante", $datos->cantidad_entrante, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_saliente", $datos->cantidad_saliente, PDO::PARAM_STR);
            $stmt->bindParam(":cantidad_total", $datos->cantidad_total, PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos->precio, PDO::PARAM_STR);
            $stmt->bindParam(":ruta_foto", $datos->ruta_foto, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $datos->estado, PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $datos->tipo, PDO::PARAM_STR);

            $stmt->bindParam(":id", $datos->id, PDO::PARAM_STR);

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }

    /*=============================================
	DELETE STOCK EQUIPAMIENTO
	=============================================*/
    static public function deleteStock($tabla, $id){
        
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id='$id'");

		if($stmt->execute()){

			return "1";

		}else{

			return "2";
		
		}

		
		
    }

}