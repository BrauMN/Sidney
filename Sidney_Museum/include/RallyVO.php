<?php


class RallyVO {
	
	//ATRIBUTOS
	
	//Rally
    private $id;
    private $id_painting_sculpture;
	private $description;
    private $maximum_time;
    private $question;
    private $answer;
    private $created_by;
    private $updated_by;
	private $deleted_by;

	
	//METODOS
	
	//SET

	//Rally------------------------------------------------------------------------------------------------------------------------
	public function setId($r) {
		$this->id = $r;
	}
	public function setTime($r) {
		$this->description = $r;
	}
	public function setDes($r) {
		$this->maximum_time = $r;
    }
    public function setCreated_by($r) {
		$this->created_by = $r;
    }
    public function setUpdated_by($r) {
		$this->updated_by = $r;
    }
    public function setDeleted_by($r) {
		$this->deleted_by = $r;
    }
    public function setId_painting_sculpture($r) {
		$this->id_painting_sculpture = $r;
    }
    public function setQuestion($r) {
		$this->question = $r;
    }
    public function setAnswer($r) {
		$this->answer = $r;
    }
	
	public function setAll($id, $description, $maximum_time, $created_by) {
		$this->id = $id;
		$this->description = $description;
        $this->maximum_time = $maximum_time;
        $this->created_by = $created_by;
    }
    //ID_rally, ID_painting_sculpture, question, answer, created_by
    public function setAll_questions($id, $id_painting_sculpture, $question, $answer, $created_by) {
		$this->id = $id;
		$this->id_painting_sculpture = $id_painting_sculpture;
        $this->question = $question;
        $this->answer = $answer;
        $this->created_by = $created_by;
    }
    
    public function setAll_Up($id, $description, $maximum_time, $updated_by) {
		$this->id = $id;
		$this->description = $description;
        $this->maximum_time = $maximum_time;
        $this->updated_by = $updated_by;
    }
    
    public function setAll_Select_Rally($id, $description, $maximum_time) {
        $this->id = $id;
        $this->description = $description;
        $this->maximum_time = $maximum_time;
    }

    public function setAll_Select_Questions($description, $question, $answer) {
        $this->description = $description;
        $this->question = $question;
        $this->answer = $answer;
    }




	//GET - Recuperar
	
	//Rally
	public function getId() {
		return $this->id;
    } 
    
    public function getId_painting_sculpture() {
		return $this->id_painting_sculpture;
	} 
	
	public function getDes() {
		return $this->description;
	} 
	
	public function getTime() {
		return $this->maximum_time;
    } 

    public function getQuestion() {
		return $this->question;
    } 

    public function getAnswer() {
		return $this->answer;
    } 

    public function getCreated_by() {
		return $this->created_by;
    }
    
    public function getDeleted_by() {
		return $this->deleted_by;
    } 

    public function getUpdated_by() {
		return $this->updated_by;
	}

	
	
}

?>