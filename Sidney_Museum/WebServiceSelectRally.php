<?php

require 'include/database.php';

$sql = "SELECT DISTINCT c.ID_rally as id, c.descriptionn as descriptionn, c.maximum_time as time, COUNT(t.question) FROM C_Rally c INNER JOIN T_Rally_painting t WHERE c.ID_rally = t.ID_rally AND c.f_deleted = 0 AND t.f_deleted = 0 GROUP BY c.descriptionn ORDER BY COUNT(t.question) ASC";

mysqli_set_charset($conexion , "utf8" );
$result = $conexion->query($sql);
$json = array();
if ($result) {
    
    while($row = $result->fetch_assoc()) {
 
 	$json[] = array("id" => $row['id'], "descriptionn" => $row['descriptionn'], "time" => $row['time']);  
	}
} else {

}


header('Content-type: application/json; charset=utf-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


$conexion->close();
?>



