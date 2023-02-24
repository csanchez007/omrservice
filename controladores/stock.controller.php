<?php
/*=============================================
STOCK EQUIPAMIENTO
=============================================*/
class StockPlantilla{

	/*=============================================
	INSERTAR STOCK EQUIPAMIENTO
	=============================================*/
    static public function newStock($datos){

        $tabla="stock";

        $respuesta = StockModel::newStockMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	LLAMAR A TODOS STOCK EQUIPAMIENTO
	=============================================*/
    static public function allStockCTR($tipo){

        header('Content-type:application/json');
        
        $tabla = "stock";

        $respuesta = StockModel::allStockMDL($tabla, $tipo);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }


    /*=============================================
	CONSULTAR POR STOCK EQUIPAMIENTO
	=============================================*/
    static public function consultaPorStockCTR($id, $tipo){

        header('Content-type:application/json');
        $tabla = "stock";

        $respuesta = StockModel::consultaStockMDL($tabla, $id, $tipo);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }


    /*=============================================
	UPDATE STOCK EQUIPAMIENTO
	=============================================*/
    static public function updateStockCTR($datos){

        $tabla="stock";

        $respuesta = StockModel::updateStockMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	ELIMINAR STOCK EQUIPAMIENTO
	=============================================*/
    static public function deleteStockCTR($id){

        $tabla="stock";

        $respuesta = StockModel::deleteStock($tabla, $id);
    
        echo $respuesta;

        
    }
       
}