<?php
require_once ("include/GameDAO.php");

$id_rally = ($_GET['id']);

$message='';

$objetoVo = new GameVO();
$objetoDAO = new GameDAO();

$objetoVo->setAll_InsertId($id_rally);
$objetoDAO->Insert($objetoVo);
if($objetoDAO){
   $json = array('Alerta' => $message='Usuario creado exitosamente.');
}
else
{
    $json = array('Alerta: ' => $message='Hubo un error.');
}
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json);


?>