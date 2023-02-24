<?php

class ControladorDatos{
	/*=============================================
	INSERTAR DATOS GENERALES
	=============================================*/
    static public function newDatosGraCRL($datos){

        $tabla="datos_generales";

        $respuesta = ModelDatos::newDatosGralMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	LLAMAR A UN DATO
	=============================================*/
    static public function oneDatosGralCTR($id){

        header('Content-type:application/json');
        
        $tablaUsuario = "usuarios";
        $tabla = "datos_generales";
        $tablaDatos = "estado_datos";
        $tablaMM = "modelo_marca";
        $tablaTM = "tipo_movil";

        $respuesta = ModelDatos::oneDatosGralMDL($tablaUsuario, $tabla, $tablaDatos, $tablaMM, $tablaTM, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	LLAMAR TODOS LOS DATOS
	=============================================*/
    static public function AllDatosCTR(){

        header('Content-type:application/json');
        
        $tablaUsuario = "usuarios";
        $tabla = "datos_generales";
        $tablaDatos = "estado_datos";
        $tablaMM = "modelo_marca";
        $tablaTM = "tipo_movil";

        $respuesta = ModelDatos::AllDatosMDL($tablaUsuario, $tabla, $tablaDatos, $tablaMM, $tablaTM);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
   	/*=============================================
	UPDATE DATOS GENERALES
	=============================================*/
    static public function updateDatosCTR($datos){

        $tabla="datos_generales";

        $respuesta = ModelDatos::updateUDatosGralMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	LLAMAR A UN DATO
	=============================================*/
    static public function deleteDatosCTR($id){

        header('Content-type:application/json');
        
        $tabla = "datos_generales";

        $respuesta = ModelDatos::deleteDatosMDL($tabla, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
}