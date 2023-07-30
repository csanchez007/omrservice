<?php
ob_start();
require_once "../controladores/servicios.controller.php";

require_once "../modelos/servicios.model.php";

header("Access-Control-Allow-Origin: *");
ob_end_flush();

if (isset( $_GET['idReporte'])){

    $idReporte= $_GET['idReporte'];
    
    }

    if (isset( $_GET['idSolucion'])){

        $idSolucion= $_GET['idSolucion'];
        
    }

//URL http://localhost/appcondominio/servicios/servicios.php?user=1-9&todosServicios
/*=============================================
LLAMAR A TODOS LOS REPORTES POR USUARIO
=============================================*/
if (isset($_GET['todosServicios'])){
    $user = $_GET['user'];
    $alltipouser= new ControladorServicios();
    $alltipouser->allallServiciosCTR($user);
    
    }
//URL http://localhost/appcondominio/servicios/servicios.php?user=1-9&todosSinSolucionServicios
/*=============================================
LLAMAR A TODOS LOS REPORTES POR USUARIO
=============================================*/
if (isset($_GET['todosSinSolucionServicios'])){
    $user = $_GET['user'];
    $alltipouser= new ControladorServicios();
    $alltipouser->allSinSolucionServiciosCTR($user);
    
    }
//URL http://localhost/appcondominio/servicios/servicios.php?user=1-9&getAllServicios
/*=============================================
LLAMAR A TODOS LOS REPORTES POR USUARIO
=============================================*/
if (isset($_GET['getAllServicios'])){
   $user = $_GET['user'];
   $alltipouser= new ControladorServicios();
   $alltipouser->allallServiciosCTR($user);
   
   }
//URL http://localhost/appcondominio/servicios/servicios.php?idReporte=7&getAllServicios
/*=============================================
LLAMAR A UN REPORTE POR ID
=============================================*/
if (isset($_GET['getOneServicios'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneServiciosCTR($idReporte);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?idReporte=7&getOneSolucion
/*=============================================
LLAMAR A UNA SOLUCION
=============================================*/
if (isset($_GET['getOneSolucion'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneSolucionCTR($idReporte);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?idReporte=7&getOneServiciosFotos
/*=============================================
LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
=============================================*/
if (isset($_GET['getOneServiciosFotos'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->oneServiciosFotoCTR($idReporte);
    
    }
//URL http://localhost/appcondominio/servicios/servicios.php?idSolucion=7&getOneSolucionFotos
/*=============================================
LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
=============================================*/
if (isset($_GET['getOneSolucionFotos'])){

    $fotosolucion= new ControladorServicios();
    $fotosolucion->oneSolucionFotoCTR($idSolucion);
    
    }

//URL http://localhost/appcondominio/servicios/servicios.php?user=1-9&getAllSolucion
/*=============================================
LLAMAR A UN REPORTE
=============================================*/
if (isset($_GET['getAllSolucion'])){
    $user = $_GET['user'];
    $alltipouser= new ControladorServicios();
    $alltipouser->allSolucionCTR($user);
    
    }

//URL http://localhost/omr/omrservice/servicios//servicios.php?getAllEstadoD
/*=============================================
LLAMAR TODOS LOS ESTADOS DATOS
=============================================*/
if (isset($_GET['getAllEstadoD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allallEstadoDatoCTR();
    
}
/*=============================================
LLAMAR TODOS LOS TIPOS DATOS
=============================================*/
if (isset($_GET['getAllTipoD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allallTipoDatoCTR();
    
}
/*=============================================
LLAMAR TODOS LOS MODELO MARCA DATOS
=============================================*/
if (isset($_GET['getAllMMD'])){

    $alltipouser= new ControladorServicios();
    $alltipouser->allaMMDCTR();

}

/*=============================================
UPDATE REPORTE DESDE LA WEB
=============================================*/
//URL http://localhost/omr/omrservice/servicios//servicios.php?updateReporte
if (isset($_GET['updateReporte'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);

    $updateReporte= new ControladorServicios();
    $updateReporte->updateReporteCTR($datos);       
}
 //URL http://localhost/omrservice/servicios/servicios.php?addDoc
/*=============================================
NUEVo DOCUMENTO DETALLE DE REPORTE
=============================================*/
if (isset($_GET['addDoc'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);

     $newuser= new ControladorServicios();
     $newuser->docPDFCTR($datos);
        
    }
/*=============================================
LLAMAR TODOS LOS MODELO MARCA DATOS
=============================================*/
//URL http://localhost/omrservice/servicios/servicios.php?getAllMMD
if (isset($_GET['getAllDOC'])){

    $doc= new ControladorServicios();
    $doc->allDocCTR();

}

//URL http://localhost/appcondominio/servicios/servicios.php?id=7&getOneDocument
/*=============================================
LLAMAR A TODAS LAS FOTOS DE REPORTE POR USUARIO
=============================================*/
if (isset($_GET['getOneDocument'])){
    $id = $_GET['id'];
    $doc= new ControladorServicios();
    $doc->oneDocument($id);
    
    }