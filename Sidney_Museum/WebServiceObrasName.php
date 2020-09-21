<?php
$varname = htmlspecialchars($_GET['name']);
 include "include/ObrasDAO.php";

 $varDAO = new ObrasDAO();
 $varVO=$varDAO->selectAllName($varname);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else {
     $json[]=array('id' => $varVO->getId_painting_sculpture(), 'name' => $varVO->getName_obra(), 'author' => $varVO->getAuthor_obra(), 'year' => $varVO->getYear_obra(), 'descr' => $varVO->getDes_obra()
     , 'theme' => $varVO->getTheme_obra(), 'img' => $varVO->getImg_obra());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>