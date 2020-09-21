<?php
$vardes = htmlspecialchars($_GET['des']);
 include "include/RallyDAO.php";

 $varDAO = new RallyDAO();
 $varVO=$varDAO->selectAllRallyDes($vardes);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else {
     $json[]=array('id' => $varVO->getId(), 'des' => $varVO->getDes(), 'time' => $varVO->getTime());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>