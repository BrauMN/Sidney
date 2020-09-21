<?php
 require 'include/database.php';

$sql = "SELECT MAX(ID_game) AS id FROM T_Game";

mysqli_set_charset($conexion , "utf8" );
$result = $conexion->query($sql);
$json = array();
if ($result) {
    
    while($row = $result->fetch_assoc()) {
 
 	$json = array("id" => $row['id']);  
	}
} else {

}


header('Content-type: application/json; charset=utf-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


$conexion->close();
?>