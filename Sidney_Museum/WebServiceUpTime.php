<?php
require_once ("include/GameDAO.php");

$id_game = ($_GET['idgame']);
$id_reward = ($_GET['idreward']);

$message='';

$objetoVo = new GameVO();
$objetoDAO = new GameDAO();

$objetoVo->setAll_Up( $id_reward,$id_game);
$objetoDAO->UpdateTime($objetoVo);
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