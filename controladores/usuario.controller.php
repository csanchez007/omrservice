<?php

class ControladorPlantilla{
	/*=============================================
	INICIAR SESIÓN
	=============================================*/
    static public function iniciarSesion($usuario, $pass){

    $tabla="usuarios";

    $respuesta = ModelSession::iniciarSesion($tabla, $usuario, $pass);

    echo $respuesta;
    
    }
	/*=============================================
	INSERTAR USUARIO
	=============================================*/
    static public function newUser($datos){

        $tabla="usuarios";

        $respuesta = ModelSession::newUserMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	INSERTAR USUARIO POS SESIÓN
	=============================================*/
    static public function newUsePosSesion($datos){

        $tabla="usuarios";

        $respuesta = ModelSession::newUserPosSesionMDL($tabla, $datos);
    
        echo $respuesta;

        
    }

    /*=============================================
	LLAMAR A TODOS LOS USUARIO
	=============================================*/
    static public function allUserCTR(){

        header('Content-type:application/json');
        $tabla = "usuarios";
        $tablaTipo = "tipos_usuarios";
        $tablaTorre = "torres";

        $respuesta = ModelSession::allUserMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
    LLAMAR A TODOS LOS PREDEFINIDOS
    =============================================*/
    static public function allPredCTR(){

        header('Content-type:application/json');
        $tabla = "operaciones_predef";

        $respuesta = ModelSession::allPredMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	CONSULTAR POR USUARIO
	=============================================*/
    static public function consultaUserCTR($usuario){

        header('Content-type:application/json');
        $tabla = "usuarios";
        $tablaTipo = "tipos_usuarios";

        $respuesta = ModelSession::consultaUserMDL($tabla, $tablaTipo, $usuario);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	CONSULTAR POR USUARIO PARA EDICIÓN
	=============================================*/
    static public function consultaUserEditCTR($id){

        header('Content-type:application/json');
        $tabla = "usuarios";
        $tablaTorre= "torres";
        //$tablaTipo = "usuarios_tipos";

        $respuesta = ModelSession::consultaUserEditMDL($tabla, $tablaTorre, $id);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	CONSULTAR PEDEFINIDOS
	=============================================*/
    static public function consultaPredefinidosCTR(){

        header('Content-type:application/json');
        $tabla = "predefindos";

        $respuesta = ModelSession::consultaPredefinidosMDL($tabla);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	UPDATE USUARIO
	=============================================*/
    static public function updateUsePosSesionCTR($datos){

        $tabla="usuarios";

        $respuesta = ModelSession::updateUsePosSesionMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    
    /*=============================================
	INSERTAR DETALLES DE REPORTE
	=============================================*/
    static public function newUseReporte($datos){

        $tabla="detalle_reporte";

        $respuesta = ModelSession::newUserReporteMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	INSERTAR FOTO DETALLES DE REPORTE
	=============================================*/
    static public function reporteFotoCTR($datos){

        $tabla="foto_reporte";

        $respuesta = ModelSession::reporteFotoMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	INSERTAR FOTO DETALLES DE SOLUCION
	=============================================*/
    static public function solucionFotoCTR($datos){

        $tabla="foto_solucion";

        $respuesta = ModelSession::solcionFotoMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	CONSULTAR ID DE REPORTE PARA FOTO
	=============================================*/
    static public function consultaUserReportCTR($rut){

        header('Content-type:application/json');
        $tabla = "detalle_reporte";

        $respuesta = ModelSession::consultaUserReporteMDL($tabla, $rut);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	CONSULTAR ID DE REPORTE PARA FOTO
	=============================================*/
    static public function consultaSolFotoCTR($rut){

        header('Content-type:application/json');
        $tabla = "detalle_solucion";

        $respuesta = ModelSession::consultaSolFotoMDL($tabla, $rut);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }

    /*=============================================
	INSERTAR DETALLES DE SOLUCION
	=============================================*/
    static public function newUseSolucion($datos){

        $tabla="detalle_solucion";

        $respuesta = ModelSession::newUserSolucionMDL($tabla, $datos);
    
        echo $respuesta;

        
    }
    /*=============================================
	CONSULTA DE REPORTE PARA SOLUCIÓN
	=============================================*/
    static public function consultaReporteCTR($rut){

        header('Content-type:application/json');
        $tabla = "detalle_reporte";

        $respuesta = ModelSession::consultaReporteMDL($tabla, $rut);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	CONSULTA DE REPORTE PARA SOLUCIÓN
	=============================================*/
    static public function consultaUserEditNotiCTR($usser, $userId){

        header('Content-type:application/json');
        $tabla = "usuarios";

        $respuesta = ModelSession::consultaUserEditNotiMDL($tabla, $usser, $userId);
    
        $array=json_encode($respuesta);
        
        echo $array;
    }
    /*=============================================
	LLAMAR A TODOS LOS USUARIO DE NOTIFICACIONESS
	=============================================*/
    static public function allUserNotCTR(){

        $tabla = "usuarios";

        $respuesta = ModelSession::allUserMDL($tabla);
    
        return $respuesta;
    }
    /*=============================================
	CONSULTAR POR USUARIO NOTIFICACION
	=============================================*/
    static public function consultaUserNotCTR($rut){
        header('Content-type:application/json');
        $tabla = "usuarios";

        $respuesta = ModelSession::consultaUserNotMDL($tabla, $rut);
    
        //return ($respuesta);
        $array=json_encode($respuesta);
        
        echo $array;
    }
    
}