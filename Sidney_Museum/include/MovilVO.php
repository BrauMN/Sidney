<?php


class MovilVO {
	
	//ATRIBUTOS
	
    //INCENTIVOS 
    private $id_person;
    private $id_user_type;
    private $firstname;
	  private $f_last_name;
    private $m_last_name;
    private $phone;
    private $direction;
    private $mail;
    private $password;

	
	//METODOS
	
	//SET

	//INCENTIVOS------------------------------------------------------------------------------------------------------------------------
    public function setId_person($r) {
		$this->id_person = $r;
	}
    public function setId($r) {
		$this->id_user_type = $r;
	}
	public function setFirstname($r) {
		$this->firstname = $r;
	}
	public function setF_last_name($r) {
		$this->f_last_name = $r;
    }
    public function setM_last_name($r) {
		$this->m_last_name = $r;
    }
    public function setPhone($r) {
		$this->phone = $r;
    }
    public function setDirection($r) {
		$this->direction = $r;
    }
    public function setMail($r) {
		$this->mail = $r;
    }
    public function setPassword($r) {
		$this->password = $r;
    }
	
	public function setAll_Insert($id, $firstname, $f_last_name, $m_last_name) {
		$this->id_user_type = $id;
		$this->firstname = $firstname;
        $this->f_last_name = $f_last_name;
        $this->m_last_name = $m_last_name;

    }

    public function setAll_Select($mail, $password) {
		$this->mail = $mail;
        $this->password = $password;
    }



	//GET - Recuperar
	
    //INCENTIVOS
    public function getId_person() {
		return $this->id_person;
    } 

	public function getId() {
		return $this->id_user_type;
    } 
    
    public function getFirstname() {
		return $this->firstname;
	} 
	
	public function getF_last_name() {
		return $this->f_last_name;
	} 
	
	public function getM_last_name() {
		return $this->m_last_name;
    } 

    public function getPhone() {
		return $this->phone;
    } 

    public function getDirection() {
		return $this->direction;
    } 

    public function getMail() {
		return $this->mail;
    }
    
    public function getPassword() {
		return $this->password;
    } 	
	
}

?>