<?php


require_once("include/ObrasDAO.php");


$varDAO = new ObrasDAO();
$varVO = $varDAO->selectAll();

if(!$varVO){
 $json=array('status' => 0, 'msg' => 'error');
}
else foreach($varVO as $objeto) {
  $json[]=array('id' => $objeto->getId_painting_sculpture(), 'name' => $objeto->getName_obra(), 'author' => $objeto->getAuthor_obra(), 'year' => $objeto->getYear_obra(), 'descr' => $objeto->getDes_obra()
  , 'theme' => $objeto->getTheme_obra(), 'img' => $objeto->getImg_obra());
}

header('Content-type: application/json; charset=utf-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>