<?php
/*
require_once ("Sidney_DAO.php");

$end_time = ($_GET['end_time']);
$descr = ($_GET["descr"]);
$created_by = ($_GET["created_by"]);

$objetoVo = new SidneyVO();
$objetoDAO = new SidneyDAO();

$VO = $objetoVo->setAll(0,$end_time,$descr,$created_by);
$DAO = $objetoDAO->Insert($objetoVo);

if(!$VO){
    $json = array("status" => 1,"msg" => "Se ha agregado un incentivo");
}

header('Content-type: DarIncentivos.php');
echo json_encode($json);
*/

?>