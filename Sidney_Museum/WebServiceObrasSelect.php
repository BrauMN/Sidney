<?php
$vartheme = htmlspecialchars($_GET['theme']);
 include "include/ObrasDAO.php";

 $varDAO = new ObrasDAO();
 $varVO=$varDAO->selectAllTheme($vartheme);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else foreach($varVO as $objeto) {
     $json[]=array('id' => $objeto->getId_painting_sculpture(), 'name' => $objeto->getName_obra(), 'author' => $objeto->getAuthor_obra(), 'year' => $objeto->getYear_obra(), 'descr' => $objeto->getDes_obra()
     , 'theme' => $objeto->getTheme_obra(), 'img' => $objeto->getImg_obra());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>