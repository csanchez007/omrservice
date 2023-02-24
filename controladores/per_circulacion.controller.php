<?php

class ControladorPerCirculacion{
    /*=============================================
	INSERTAR DATOS PERMISO DE CIRCULACION
	=============================================*/
    static public function newPerCircCRL($datos){

        $tabla="per_circulacion";

        $respuesta = ModelPerCirculacion::newPerCircMDL($tabla, $datos);
    
        echo $respuesta;
        
    }

    /*=============================================
	CONSULTA DE PERMISO DE CIRCULACION POR ID
	=============================================*/
    static public function oneDatosPerCircCTR($id){

        header('Content-type:application/json');
        
        $tablaDatosGral = "datos_generales";
        $tabla = "per_circulacion";

        $respuesta = ModelPerCirculacion::onePerCirclMDL($tabla, $tablaDatosGral, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	LLAMAR TODOS LOS DATOS
	=============================================*/
    static public function AllPerCircnicaCTR(){

        header('Content-type:application/json');
        
        $tablaDatosGral = "datos_generales";
        $tabla = "per_circulacion";


        $respuesta = ModelPerCirculacion::AllPerCircnicaMDL($tablaDatosGral, $tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
   	/*=============================================
	UPDATE PERMISO DE CIRCULACION
	=============================================*/
    static public function updatePerCircCTR($datos){

        $tabla="per_circulacion";

        $respuesta = ModelPerCirculacion::updatePerCircMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	ELIMINAR PERMISO DE CIRCULACION
	=============================================*/
    static public function deletePerCircTR($id){

        header('Content-type:application/json');
        
        $tabla = "per_circulacion";

        $respuesta = ModelPerCirculacion::deletePerCircMDL($tabla, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
}