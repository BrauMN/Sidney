<?php
$vares = htmlspecialchars($_GET['res']);
 include "include/Sidney_DAO.php";

 $varDAO = new SidneyDAO();
 $varVO=$varDAO->selectAllRes($vares);
 if(!$varVO){
    $json=array('status' => 0, 'msg' => 'error');
   }
   else foreach($varVO as $objeto) {
     $json[]=array('id' => $objeto->getId(), 'min_pts' => $objeto->getMin_pts(), 'max_pts' => $objeto->getMax_pts(), 'des' => $objeto->getDes());
   }
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


?>