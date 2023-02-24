<?php
   header('Content-type: application/json');
   header("Access-Control-Allow-Origin: *");
   ob_end_flush();
   
require_once "../controladores/usuario.controller.php";

require_once "../modelos/usuario.model.php";

if (isset( $_GET['usser'])){

$usuario= $_GET['usser'];

}

if(isset($_GET['pass'])){

$pass= $_GET['pass'];

}

if(isset($_GET['ID'])){

    $id= $_GET['ID'];
    
}

if(isset($_GET['rut'])){

    $rut= $_GET['rut'];
    
}
if(isset($_GET['userId'])){

    $userId= $_GET['userId'];
    
}
//URL http://localhost/omrservice/servicios/usuarios.php?usser=1-9&pass=1234&session
/*=============================================
INICIAR SESIÓN
=============================================*/
if (isset($_GET['session'])){

$sesion= new ControladorPlantilla();
$sesion->iniciarSesion($usuario, $pass);

}

//URL http://localhost/omrservice/servicios/usuarios.php?newuser
/*=============================================
NUEVO USUARIO
=============================================*/
if (isset($_GET['newuser'])){
    

header('Content-type: application/json');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$datos = ($request);
//$datos = json_encode($request);


 $newuser= new ControladorPlantilla();
 $newuser->newUser($datos);
    
}
//URL http://localhost/omrservice/servicios/usuarios.php?newuserpos
/*=============================================
NUEVO USUARIO POS SESION
=============================================*/
if (isset($_GET['newuserpos'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $newuser= new ControladorPlantilla();
     $newuser->newUsePosSesion($datos);
        
    }

//URL http://localhost/omrservice/servicios/usuarios.php?usser=1-9&pass=1234&session&consultaUser
/*=============================================
CONSULTA USUARIO (LLAMAR SESIÓN)
=============================================*/
if (isset($_GET['consultaUser'])){
    
    $alluser= new ControladorPlantilla();
    $alluser->consultaUserCTR($usuario);
        
    }

//URL http://localhost/omrservice/servicios/usuarios.php?ID=1&consultaUserEdit
/*=============================================
CONSULTA USUARIO PARA LLENAR LOS CAMPOS
=============================================*/
if (isset($_GET['consultaUserEdit'])){
    
    $user= new ControladorPlantilla();
    $user->consultaPredefinidosCTR($id);
        
    }
//URL http://localhost/omrservice/servicios/usuarios.php?ID=1&consultaPredefinido
/*=============================================
CONSULTA USUARIO PARA LLENAR LOS CAMPOS
=============================================*/
if (isset($_GET['consultaPredefinido'])){
    
    $user= new ControladorPlantilla();
    $user->consultaPredefinidosCTR();
        
    }
//URL http://localhost/omrservice/servicios/usuarios.php?upadateUser
/*=============================================
UPADATE USUARIO POS SESION
=============================================*/
if (isset($_GET['upadateUser'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $updateUser= new ControladorPlantilla();
     $updateUser->updateUsePosSesionCTR($datos);
        
    }

//URL http://localhost/omrservice/servicios/usuarios.php?getAll
/*=============================================
LLAMAR A TODOS LOS USUARIOS
=============================================*/
if (isset($_GET['getAll'])){

   $alluser= new ControladorPlantilla();
   $alluser->allUserCTR();
   
   }

//URL http://localhost/omr/omrservice/servicios/usuarios.php?getAllPre
/*=============================================
LLAMAR A TODOS LOS PREDEFINIDOS
=============================================*/
if (isset($_GET['getAllPre'])){

    $predefinido= new ControladorPlantilla();
    $predefinido->allPredCTR();
    
    }

//URL http://localhost/omrservice/servicios/usuarios.php?newuserpos
/*=============================================
NUEVO DETALLE DE REPORTE
=============================================*/
if (isset($_GET['nuevoReportepos'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $newuser= new ControladorPlantilla();
     $newuser->newUseReporte($datos);
        
    }

//URL http://localhost/omrservice/servicios/usuarios.php?rut=1-9&consultaUserReporte
/*=============================================
CONSULTA ID DE REPORTE PARA FOTO
=============================================*/
if (isset($_GET['consultaUserReporte'])){
    
    $alluser= new ControladorPlantilla();
    $alluser->consultaUserReportCTR($rut);
        
    }
//URL http://localhost/omrservice/servicios/usuarios.php?rut=1-9&consultaSolFoto
/*=============================================
CONSULTA ID DE REPORTE PARA FOTO
=============================================*/
if (isset($_GET['consultaSolFoto'])){
    
    $alluser= new ControladorPlantilla();
    $alluser->consultaSolFotoCTR($rut);
        
    }
 //URL http://localhost/omrservice/servicios/usuarios.php?addFotoReporte
/*=============================================
NUEVa FOTO DETALLE DE REPORTE
=============================================*/
if (isset($_GET['addFotoReporte'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $newuser= new ControladorPlantilla();
     $newuser->reporteFotoCTR($datos);
        
    }
//URL http://localhost/omrservice/servicios/usuarios.php?addFotoSolucion
/*=============================================
NUEVa FOTO DETALLE DE REPORTE
=============================================*/
if (isset($_GET['addFotoSolucion'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $newuser= new ControladorPlantilla();
     $newuser->solucionFotoCTR($datos);
        
    }
 //URL http://localhost/omrservice/servicios/usuarios.php?nuevoSolucionpos
/*=============================================
NUEVO DETALLE DE REPORTE
=============================================*/
if (isset($_GET['nuevoSolucionpos'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $newuser= new ControladorPlantilla();
     $newuser->newUseSolucion($datos);
        
    }
//URL http://localhost/omrservice/servicios/usuarios.php?rut=1-9&consultaReporte
/*=============================================
CONSULTA DE REPORTE PARA SOLUCIÓN
=============================================*/
if (isset($_GET['consultaReporte'])){
    
    $user= new ControladorPlantilla();
    $user->consultaReporteCTR($rut);
        
    }
//URL http:/localhost//omrservice/servicios/usuarios.php?usuario=1-9&userId=jksahdjhsahg123Id&updateEquipo'
/*=============================================
CONSULTA USUARIO PARA LLENAR LOS CAMPOS
=============================================*/
if (isset($_GET['updateEquipo'])){
    
    $user= new ControladorPlantilla();
    $user->consultaUserEditNotiCTR($usuario, $userId);
        
    }
//URL http:/localhost//omrservice/servicios/usuarios.php?rut=1-9&consultaUserNot
/*=============================================
CONSULTA USUARIO (LLAMAR SESIÓN)
=============================================*/
if (isset($_GET['consultaUserNot'])){
    
    $alluser = ControladorPlantilla::consultaUserNotCTR($rut);
    }

 