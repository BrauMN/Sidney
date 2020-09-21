<?php
$vartime = htmlspecialchars($_GET['idgame']);
 include "include/GameDAO.php";

 $varDAO = new GameDAO();
 $varVO=$varDAO->selectAllTime($vartime);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else {
     $json=array('id' => $varVO->getId_game(), 'tiempo' => $varVO->getTimeplayed());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>