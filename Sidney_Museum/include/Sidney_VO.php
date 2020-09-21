<?php


class SidneyVO {
	
	//ATRIBUTOS
	
	//INCENTIVOS
	private $id;
	private $min_pts;
	private $max_pts;
    private $descr;
    private $created_by;
    private $updated_by;
	private $deleted_by;

	
	//METODOS
	
	//SET

	//INCENTIVOS------------------------------------------------------------------------------------------------------------------------
	public function setId($valor) {
		$this->id = $valor;
	}
	public function setMin_pts($valor) {
		$this->min_pts = $valor;
	}
	public function setMax_pts($valor) {
		$this->max_pts = $valor;
	}
	public function setDes($valor) {
		$this->descr = $valor;
    }
    public function setCreated_by($valor) {
		$this->created_by = $valor;
    }
    public function setDeleted_by($valor) {
		$this->deleted_by = $valor;
    }
    public function setUpdated_by($valor) {
		$this->updated_by = $valor;
	}
	
	public function setAll($id, $min_pts, $max_pts, $descr, $created_by) {
		$this->id = $id;
		$this->min_pts = $min_pts;
		$this->max_pts = $max_pts;
        $this->descr = $descr;
        $this->created_by = $created_by;
    }
    
    public function setAll_Up($id, $min_pts, $max_pts, $descr, $updated_by) {
		$this->id = $id;
		$this->min_pts = $min_pts;
		$this->max_pts = $max_pts;
        $this->descr = $descr;
        $this->updated_by = $updated_by;
    }
    
    public function setAll_Del($id, $deleted_by) {
        $this->id = $id;
        $this->deleted_by = $deleted_by;
    }
    
    public function setAll_Select($id, $min_pts, $max_pts, $descr) {
        $this->id = $id;
        $this->min_pts = $min_pts;
		$this->max_pts = $max_pts;
        $this->descr = $descr;
	}




	//GET - Recuperar
	
	//INCENTIVOS
	public function getId() {
		return $this->id;
	} 
	
	public function getMin_pts() {
		return $this->min_pts;
	} 

	public function getMax_pts() {
		return $this->max_pts;
	} 
	
	public function getDes() {
		return $this->descr;
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