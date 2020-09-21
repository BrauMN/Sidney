<?php
$name = htmlspecialchars($_GET['name']);
 include "include/RallyDAO.php";

 $varDAO = new RallyDAO();
 $varVO=$varDAO->selectAllRallyQns($name);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else foreach($varVO as $objeto) {
     $json[]=array('name' => $objeto->getDes(), 'question' => $objeto->getQuestion(), 'answer' => $objeto->getAnswer());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>