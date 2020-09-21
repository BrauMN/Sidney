<?php
require_once("include/RallyVO.php");

class RallyDAO {
	
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
		$sql = "SELECT * FROM C_Rally WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new RallyVO();
			$vo->setAll($fila['ID_rally'],$fila['descriptionn'],$fila['maximum_time'],$fila['created_by']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
		$sql = "INSERT INTO C_Rally (descriptionn, maximum_time, created_by) VALUES ('".$vo->getDes()."','".$vo->getTime()."','".$vo->getCreated_by()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }

    function selectAll_Insert_questions() {
		$sql = "SELECT * FROM T_Rally_painting WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new RallyVO();
			$vo->setAll_questions($fila['ID_rally'],$fila['ID_painting_sculpture'],$fila['question'],$fila['answer'],$fila['created_by']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert_questions($vo) {
        $sql = "INSERT INTO T_Rally_painting (ID_rally, ID_painting_sculpture, question, answer, created_by) VALUES (".$vo->getId().",".$vo->getId_painting_sculpture().",
        '".$vo->getQuestion()."', '".$vo->getAnswer()."', '".$vo->getCreated_by()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }
    

    function selectAll_Update() {
		$sql1 = "SELECT * FROM C_Rally WHERE f_deleted=0";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new RallyVO();
			$vo1->setAll_Up($fila1['ID_rally'],$fila1['descriptionn'], $fila1['maximum_time'],$fila1['updated_by']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}

    function Update($vo1) {
		$sql1 = "UPDATE C_Rally SET ID_rally = ".$vo1->getId().", descriptionn = '".$vo1->getDes()."', maximum_time = '".$vo1->getTime()."', updated = CURRENT_TIMESTAMP, updated_by = '".$vo1->getUpdated_by()."' WHERE ID_rally = ".$vo1->getId()."";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
    }
    

    function selectAllRally() {
		$sql = "SELECT * FROM C_Rally WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new RallyVO();
			$vo->setAll_Select_Rally($fila['ID_rally'],$fila['descriptionn'],$fila['maximum_time']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }

    function selectAllRallyQns($name) {
		$sql = "SELECT c.descriptionn AS rally, t.question AS question, t.answer AS answer FROM T_Rally_painting t, C_Rally c WHERE c.ID_rally=t.ID_rally AND t.f_deleted=0 AND c.descriptionn = '$name'";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new RallyVO();
			$vo->setAll_Select_Questions($fila['rally'],$fila['question'],$fila['answer']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }

    function selectAllRallyDes($vardes) {
		$sql = "SELECT * FROM C_Rally WHERE descriptionn = '$vardes' AND f_deleted=0 LIMIT 1";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new RallyVO();
			$vo->setAll_Select_Rally($fila['ID_rally'],$fila['descriptionn'],$fila['maximum_time']);
			if(!empty($vo))
			return $vo;
		else
            return false;
        }
    }



	


}


?>