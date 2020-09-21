<?php
require_once ("include/GameAnsDAO.php");

$id_game = ($_GET['idgame']);
$id_rally = ($_GET['idrally']);
$result = ($_GET['result']);

$message='';

$objetoVo = new GameAnsVO();
$objetoDAO = new GameAnsDAO();

$objetoVo->setAll_InsertId($id_game, $id_rally, $result);
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