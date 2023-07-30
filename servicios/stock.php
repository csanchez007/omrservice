<?php   
require_once "../controladores/stock.controller.php";

require_once "../modelos/stock.model.php";

/*=============================================
STOCK EQUIPAMIENTO
=============================================*/


//URL http://localhost/omrservice/servicios/stock.php?newstock
/*=============================================
NUEVO STOCK - EQUIPAMIENTO
=============================================*/
if (isset($_GET['newstock'])){
    

header('Content-type: application/json');
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$datos = ($request);
//$datos = json_encode($request);


 $newuser= new StockPlantilla();
 $newuser->newStock($datos);
    
}

//URL http://localhost/omrservice/servicios/stock.php?tipo=1&getAlStock
/*=============================================
LLAMAR A TODOS LOS stock
=============================================*/
if (isset($_GET['getAllStock'])){

    $tipo = $_GET['tipo'];
    $alluser= new StockPlantilla();
    $alluser->allStockCTR($tipo);
    
    }


//URL http://localhost/omr/omrservice/servicios/stock.php?ID=1&tipo=1&consultaPorStock
/*=============================================
CONSULTAR POR STOCK EQUIPAMIENTO
=============================================*/
if (isset($_GET['consultaPorStock'])){

    $id = $_GET['id'];
    $tipo = $_GET['tipo'];

    $user= new StockPlantilla();
    $user->consultaPorStockCTR($id, $tipo);
        
    }

//URL http://localhost/omrservice/servicios/stock.php?upadateStock
/*=============================================
UPDATE STOCK EQUIPAMIENTO
=============================================*/
if (isset($_GET['upadateStock'])){
    
    header('Content-type: application/json');
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $datos = ($request);
    //$datos = json_encode($request);
    
    //echo $datos;
     $updateUser= new StockPlantilla();
     $updateUser->updateStockCTR($datos);
        
    }

 //URL http://localhost/omrservice/servicios/stock.php?ID=1&deleteStock
/*=============================================
CONSULTAR POR STOCK EQUIPAMIENTO
=============================================*/
if (isset($_GET['deleteStock'])){
    
    $id = $_GET['id'];
    
    $user= new StockPlantilla();
    $user->deleteStockCTR($id);
        
    }

    header("Access-Control-Allow-Origin: *");
    ob_end_flush();

 