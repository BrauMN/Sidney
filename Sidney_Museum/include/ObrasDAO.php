<?php
require_once("include/ObrasVO.php");

class ObrasDAO {
	
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
		$sql = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new ObrasVO();
			$vo->setAll_Insert_Obras($fila['ID_painting_sculpture'],$fila['name'],$fila['author'],$fila['year'],$fila['descr'],$fila['theme'],$fila['img'],$fila['created_by']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
        $sql = "INSERT INTO C_Painting_Sculpture (name, author, year, descr, theme, img, created_by) VALUES ('".$vo->getName_obra()."','".$vo->getAuthor_obra()."',".$vo->getYear_obra().",'".$vo->getDes_obra()."',
        '".$vo->getTheme_obra()."','".$vo->getImg_obra()."','".$vo->getCreated_by_obra()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }

    function selectAll_Update() {
		$sql1 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new ObrasVO();
			$vo1->setAll_Update_Obras($fila1['ID_painting_sculpture'],$fila1['name'],$fila1['author'],$fila1['year'],$fila1['descr'],$fila1['theme'],$fila1['img'],$fila1['updated_by']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}

    function Update($vo1) {
        $sql1 = "UPDATE C_Painting_Sculpture SET ID_painting_sculpture = ".$vo1->getId_painting_sculpture().", name = '".$vo1->getName_obra()."', author = '".$vo1->getAuthor_obra()."', year = ".$vo1->getYear_obra().",
        descr = '".$vo1->getDes_obra()."', theme = '".$vo1->getTheme_obra()."', img = '".$vo1->getImg_obra()."', updated = CURRENT_TIMESTAMP, updated_by = '".$vo1->getUpdated_by_obra()."' WHERE ID_painting_sculpture = ".$vo1->getId_painting_sculpture()."";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
    }
    
    function selectAll_Update_2() {
		$sql2 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0";
		$resultado2 = mysqli_query($this->conn,$sql2);
		while($fila2 = mysqli_fetch_assoc($resultado2)) {
			$vo2 = new ObrasVO();
			$vo2->setAll_Update_Obras_2($fila2['ID_painting_sculpture'],$fila2['name'],$fila2['author'],$fila2['year'],$fila2['descr'],$fila2['theme'],$fila2['updated_by']);
			$listadoVO2[] = $vo2;
		}
		if(!empty($listadoVO2))
			return $listadoVO2;
		else
			return false;
	}

    function Update_2($vo2) {
        $sql2 = "UPDATE C_Painting_Sculpture SET ID_painting_sculpture = ".$vo2->getId_painting_sculpture().", name = '".$vo2->getName_obra()."', author = '".$vo2->getAuthor_obra()."', year = ".$vo2->getYear_obra().",
        descr = '".$vo2->getDes_obra()."', theme = '".$vo2->getTheme_obra()."', updated = CURRENT_TIMESTAMP, updated_by = '".$vo2->getUpdated_by_obra()."' WHERE ID_painting_sculpture = ".$vo2->getId_painting_sculpture()."";
		$resultado2=mysqli_query($this->conn,$sql2);
		if($resultado2)
			return true;
		else
			return false;		
    }
    

    function selectAll_Delete() {
		$sql2 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0";
		$resultado2 = mysqli_query($this->conn,$sql2);
		while($fila2 = mysqli_fetch_assoc($resultado2)) {
			$vo2 = new ObrasVO();
			$vo2->setAll_Delete_Obras($fila2['ID_painting_sculpture'], $fila2['deleted_by']);
			$listadoVO2[] = $vo2;
		}
		if(!empty($listadoVO2))
			return $listadoVO2;
		else
			return false;
	}

    function Delete($vo2) {
		$sql2 = "UPDATE C_Painting_Sculpture SET ID_painting_sculpture = ".$vo2->getId_painting_sculpture().", deleted = CURRENT_TIMESTAMP, deleted_by = '".$vo2->getDeleted_by_obra()."', f_deleted = 1 WHERE ID_painting_sculpture = ".$vo2->getId_painting_sculpture()."";
		$resultado2=mysqli_query($this->conn,$sql2);
		if($resultado2)
			return true;
		else
			return false;		
    }

    function selectAll() {
		$sql3 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0 ORDER BY theme";
		$resultado3 = mysqli_query($this->conn,$sql3);
		while($fila3 = mysqli_fetch_assoc($resultado3)) {
			$vo3 = new ObrasVO();
			$vo3->setAll_Select_Obras($fila3['ID_painting_sculpture'],$fila3['name'],$fila3['author'],$fila3['year'],$fila3['descr'],$fila3['theme'],$fila3['img']);
			$listadoVO3[] = $vo3;
		}
		if(!empty($listadoVO3))
			return $listadoVO3;
		else
			return false;
	}
	
	function selectAllTheme($vartheme) {
		$sql4 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0 AND theme = '$vartheme'";
		$resultado4 = mysqli_query($this->conn,$sql4);
		while($fila4 = mysqli_fetch_assoc($resultado4)) {
			$vo4 = new ObrasVO();
			$vo4->setAll_Select_Obras_Rally($fila4['ID_painting_sculpture'],$fila4['name'],$fila4['author'],$fila4['year'],$fila4['descr'],$fila4['theme'],$fila4['img']);
			$listadoVO4[] = $vo4;
		}
		if(!empty($listadoVO4))
			return $listadoVO4;
		else
			return false;
	}
	
	function selectAllName($varname) {
		$sql4 = "SELECT * FROM C_Painting_Sculpture WHERE f_deleted=0 AND name = '$varname' LIMIT 1";
		$resultado4 = mysqli_query($this->conn,$sql4);
		while($fila4 = mysqli_fetch_assoc($resultado4)) {
			$vo4 = new ObrasVO();
			$vo4->setAll_Select_Obras_Rally($fila4['ID_painting_sculpture'],$fila4['name'],$fila4['author'],$fila4['year'],$fila4['descr'],$fila4['theme'],$fila4['img']);
		}
		if(!empty($vo4))
			return $vo4;
		else
			return false;
    }

}



?>