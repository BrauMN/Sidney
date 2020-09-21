<?php


class SesionVO {
	
	//ATRIBUTOS
	
    //SESION
    private $id_sesion;
	private $id_person;

	
	//METODOS
	
	//SET

	//SESION------------------------------------------------------------------------------------------------------------------------
	public function setId_sesion($s) {
		$this->id_sesion = $s;
    }
    public function setId_person($s) {
		$this->id_person = $s;
	}

	public function setAll($id_sesion,$id_person) {
        $this->id_sesion = $id_sesion;
        $this->id_person = $id_person;
    }
    



	//GET - Recuperar
	
	//SESION
	public function getId_sesion() {
		return $this->id_sesion;
    } 
    
    public function getId_person() {
		return $this->id_person;
	} 


	
	
}

?>