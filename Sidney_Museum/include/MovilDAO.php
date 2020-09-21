<?php
require_once("include/MovilVO.php");

class MovilDAO {
	
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
		$sql = "SELECT * FROM T_Person WHERE f_deleted=0";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new MovilVO();
			$vo->setAll_Insert($fila['ID_user_type'],$fila['firstname'],$fila['f_last_name'],$fila['m_last_name']);
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
    }
	
	function Insert_User($vo) {
        $sql = "INSERT INTO T_Person (ID_user_type, firstname, f_last_name, m_last_name) VALUES (".$vo->getId().",'".$vo->getFirstname()."',
        '".$vo->getF_last_name()."', '".$vo->getM_last_name()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
    }

    function selectMail($varmail) {
		$sql = "SELECT * FROM T_Person WHERE mail= $varmail AND ID_user_type=2 LIMIT 1 ";
		$resultado = mysqli_query($this->conn,$sql);
		$fila = mysqli_fetch_assoc($resultado);
		$vo = new MovilVO();
		$vo->setAll_Select($fila['firstname'],$fila['mail']);
		
		if(!empty($vo))
			return $vo;
		else
			return false;
	}


}


?>