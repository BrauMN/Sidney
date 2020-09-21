<?php
require_once("include/SesionVO.php");

class SesionDAO {
	
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
		$sql = "SELECT * FROM T_sesion";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new SesionVO();
			$vo->setAll($fila['ID_sesion'],$fila['ID_person']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert($vo) {
		$sql = "INSERT INTO T_sesion (ID_person) VALUES (".$vo->getId_person().")";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }
}
