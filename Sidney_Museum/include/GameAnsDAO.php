<?php
require_once("include/GameAnsVO.php");

class GameAnsDAO {
	
	private $host = "nemonico.com.mx";
	private $user = "sepherot_daniela";
	private $password = "4sp54mHXgk";
	private $database = "sepherot_danielaBD";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	} 
	
	function connectDB() {
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		return $conn;
	}
    
    function selectAll_Insert() {
		$sql = "SELECT * FROM T_Game_answer";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new GameAnsVO();
			$vo->setAll_InsertId($fila['ID_game'], $fila['ID_rally'], $fila['result']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
		$sql = "INSERT INTO T_Game_answer (ID_game, ID_rally, result) VALUES (".$vo->getId_game().", ".$vo->getId_rally().", ".$vo->getResult().");";
		$resultado=mysqli_multi_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
	}


}


?>