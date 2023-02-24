<?php

class ControladorServicios{
    /*=============================================
	LLAMAR A TODOS LOS TIPO USUARIO
	=============================================*/
    static public function allallServiciosCTR($usser){

        header('Content-type:application/json');
        
        $usuario = "usuarios";
        $tabla = "detalle_reporte";
        $tablaFoto = "foto_reporte";

        $respuesta = ModelServicios::allallServiciosMDL($usuario, $tabla, $tablaFoto, $usser);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	LLAMAR A TODOS LOS TIPO USUARIO
	=============================================*/
    static public function oneServiciosCTR($idReporte){

        header('Content-type:application/json');
        
        $tablaCliente = "usuarios";
        $tabla = "detalle_reporte";
        $tablaFoto = "foto_reporte";

        $respuesta = ModelServicios::oneServiciosMDL($idReporte, $tablaCliente, $tabla, $tablaFoto);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	LLAMAR A UNA SOLUCION
	=============================================*/
    static public function oneSolucionCTR($idSolucion){

        header('Content-type:application/json');
        
        $tablaCliente = "usuarios";
        $tabla = "detalle_solucion";
        $tablaFoto = "foto_solucion";

        $respuesta = ModelServicios::oneSolucionMDL($idSolucion, $tablaCliente, $tabla, $tablaFoto);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
	=============================================*/
    static public function oneServiciosFotoCTR($idReporte){

        header('Content-type:application/json');

        $tablaFoto = "foto_reporte";

        $respuesta = ModelServicios::oneServiciosFotodMDL($idReporte, $tablaFoto);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    
    /*=============================================
	CONSULTA ALBUM  DE SOLUCION POR USUARIO
	=============================================*/
    static public function oneSolucionFotoCTR($idSolucion){

        header('Content-type:application/json');

        $tablaFoto = "foto_solucion";

        $respuesta = ModelServicios::oneSolucionFotodMDL($idSolucion, $tablaFoto);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	LLAMAR A TODOS LOS TIPO USUARIO
	=============================================*/
    static public function allSolucionCTR($usser){

        header('Content-type:application/json');
        
        $tablaCliente = "usuarios";
        $tabla = "detalle_solucion";
        $tablaFoto = "foto_solucion";

        $respuesta = ModelServicios::allallSolucionMDL($tablaCliente, $tabla, $tablaFoto, $usser);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	LLAMAR A TODOS ESTADOS DATOS
	=============================================*/
    static public function allallEstadoDatoCTR(){

        header('Content-type:application/json');
        
        $tabla = "estado_datos";

        $respuesta = ModelServicios::allEstadoDatoMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
   /*=============================================
	LLAMAR A TODOS TIPO DATOS
	=============================================*/
    static public function allallTipoDatoCTR(){

        header('Content-type:application/json');
        
        $tabla = "tipo_movil";

        $respuesta = ModelServicios::allTipoDatoMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
    LLAMAR TODOS LOS MODELO MARCA DATOS
    =============================================*/
    static public function allaMMDCTR(){

        header('Content-type:application/json');
        
        $tabla = "modelo_marca";

        $respuesta = ModelServicios::allMMDMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
}