<?php
 require 'include/database.php';

$varcount=htmlspecialchars($_GET['idgame']);

$sql = "SELECT COUNT(result) AS res FROM T_Game_answer WHERE ID_game = $varcount AND result = 1";

mysqli_set_charset($conexion , "utf8" );
$result = $conexion->query($sql);
$json = array();
if ($result) {
    
    while($row = $result->fetch_assoc()) {
 
 	$json = array("id" => $row['res']);  
	}
} else {

}


header('Content-type: application/json; charset=utf-8;');
echo json_encode($json, JSON_UNESCAPED_UNICODE);


$conexion->close();
?>