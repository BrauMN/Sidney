<?php
require_once("include/Sidney_VO.php");

class SidneyDAO {
	
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
		$sql = "SELECT * FROM C_Category_reward WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new SidneyVO();
			$vo->setAll($fila['ID_category_reward'],$fila['min_pts'],$fila['max_pts'],$fila['descr'],$fila['created_by']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
		$sql = "INSERT INTO C_Category_reward (min_pts, max_pts, descr, created_by) VALUES (".$vo->getMin_pts().", ".$vo->getMax_pts().",'".$vo->getDes()."','".$vo->getCreated_by()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }
    

    function selectAll_Update() {
		$sql1 = "SELECT * FROM C_Category_reward WHERE f_deleted=0";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new SidneyVO();
			$vo1->setAll_Up($fila1['ID_category_reward'],$fila1['min_pts'],$fila1['max_pts'],$fila1['descr'],$fila1['updated_by']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}

    function Update($vo1) {
		$sql1 = "UPDATE C_Category_reward SET ID_category_reward = ".$vo1->getId().", min_pts = ".$vo1->getMin_pts().", max_pts = ".$vo1->getMax_pts().", descr = '".$vo1->getDes()."', updated = CURRENT_TIMESTAMP, updated_by = '".$vo1->getUpdated_by()."' WHERE ID_category_reward = ".$vo1->getId()."";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
	}
	
	function selectAll_Delete() {
		$sql2 = "SELECT * FROM C_Category_reward WHERE f_deleted=0";
		$resultado2 = mysqli_query($this->conn,$sql2);
		while($fila2 = mysqli_fetch_assoc($resultado2)) {
			$vo2 = new SidneyVO();
			$vo2->setAll_Del($fila2['ID_category_reward'], $fila2['deleted_by']);
			$listadoVO2[] = $vo2;
		}
		if(!empty($listadoVO2))
			return $listadoVO2;
		else
			return false;
	}

    function Delete($vo2) {
		$sql2 = "UPDATE C_Category_reward SET ID_category_reward = ".$vo2->getId().", delated = CURRENT_TIMESTAMP, deleted_by = '".$vo2->getDeleted_by()."', f_deleted = 1 WHERE ID_category_reward = ".$vo2->getId()."";
		$resultado2=mysqli_query($this->conn,$sql2);
		if($resultado2)
			return true;
		else
			return false;		
    }
    
    function selectAll() {
		$sql3 = "SELECT * FROM C_Category_reward WHERE f_deleted=0 ORDER BY min_pts";
		$resultado3 = mysqli_query($this->conn,$sql3);
		while($fila3 = mysqli_fetch_assoc($resultado3)) {
			$vo3 = new SidneyVO();
			$vo3->setAll_Select($fila3['ID_category_reward'],$fila3['min_pts'],$fila3['max_pts'],$fila3['descr']);
			$listadoVO3[] = $vo3;
		}
		if(!empty($listadoVO3))
			return $listadoVO3;
		else
			return false;
	}
	
	function selectAllRes($vares) {
		$sql3 = "SELECT * FROM C_Category_reward WHERE f_deleted=0 AND min_pts <= $vares AND max_pts >= $vares ORDER BY min_pts";
		$resultado3 = mysqli_query($this->conn,$sql3);
		while($fila3 = mysqli_fetch_assoc($resultado3)) {
			$vo3 = new SidneyVO();
			$vo3->setAll_Select($fila3['ID_category_reward'],$fila3['min_pts'],$fila3['max_pts'],$fila3['descr']);
			$listadoVO3[] = $vo3;
		}
		if(!empty($listadoVO3))
			return $listadoVO3;
		else
			return false;
    }
	


}


?>