<?php

require_once ("include/SesionDAO.php");

$idperson = ($_GET['idperson']);
$message='';

$objetoVo = new SesionVO();
$objetoDAO = new SesionDAO();

$objetoVo->setAll(0, $idperson);
$objetoDAO->Insert($objetoVo);
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