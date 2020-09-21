<?php

require_once ("include/MovilDAO.php");

$firstname = ($_GET['firstname']);
$f_last_name = ($_GET['f_last_name']);
$n_last_name = ($_GET['m_last_name']);
$message='';

$objetoVo = new MovilVO();
$objetoDAO = new MovilDAO();

$objetoVo->setAll_Insert(2,$firstname,$f_last_name,$n_last_name);
$objetoDAO->Insert_User($objetoVo);
if($objetoDAO){
   $json = array('Alerta: ' => $message='Usuario creado exitosamente.');
}
else
{
    $json = array('Alerta: ' => $message='Hubo un error.');
}
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json);


?>