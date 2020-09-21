<?php
require_once("include/GameVO.php");

class GameDAO {
	
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
		$sql = "SELECT * FROM T_Game";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new GameVO();
			$vo->setAll_InsertId($fila['ID_rally']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
		$sql = "INSERT INTO T_Game (start_hour, ID_rally) VALUES (CURTIME(), ".$vo->getId_rally().");";
		$resultado=mysqli_multi_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }

    function selectAll_Update() {
		$sql1 = "SELECT * FROM T_Game";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new GameVO();
			$vo1->setAll_UpEnd($fila1['ID_game']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}

    function Update($vo1) {
		$sql1 = "UPDATE T_Game SET end_hour = CURTIME() WHERE ID_game = ".$vo1->getId_game()."";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
    }
    
    function selectAll_UpdateTime() {
		$sql1 = "SELECT * FROM T_Game";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new GameVO();
			$vo1->setAll_Up($fila1['ID_category_reward'],$fila1['ID_game']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}

    function UpdateTime($vo1) {
		$sql1 = "UPDATE T_Game SET time_played = end_hour - start_hour, ID_category_reward = ".$vo1->getId_reward()."  WHERE ID_game = ".$vo1->getId_game()."";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
	}

	function selectAllTime($vartime) {
		$sql4 = "SELECT * FROM T_Game WHERE ID_game = $vartime LIMIT 1";
		$resultado4 = mysqli_query($this->conn,$sql4);
		while($fila4 = mysqli_fetch_assoc($resultado4)) {
			$vo4 = new GameVO();
			$vo4->setAllSelectTime($fila4['ID_game'],$fila4['time_played']);
		}
		if(!empty($vo4))
			return $vo4;
		else
			return false;
    }



	


}


?>