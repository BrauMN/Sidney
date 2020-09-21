<?php


class ObrasVO {
	
	//ATRIBUTOS

	
	//OBRAS
	private $id_painting_sculpture;
	private $name_obra;
    private $author_obra;
    private $year_obra;
    private $descr_obra;
	private $theme_obra;
	private $img_obra;
    private $created_by_obra;
    private $updated_by_obra;
    private $deleted_by_obra;
	
	//METODOS
	
	//SET


	//OBRAS----------------------------------------------------------------------------------------------------------------------
	public function setId_painting_sculpture($valor_obra) {
		$this->id_painting_sculpture = $valor_obra;
	}
	public function setName_obra($valor_obra) {
		$this->name_obra = $valor_obra;
	}
	public function setAuthor_obra($valor_obra) {
		$this->author_obra = $valor_obra;
    }
    public function setYear_obra($valor_obra) {
		$this->year_obra = $valor_obra;
    }
    public function setDes_obra($valor_obra) {
		$this->descr_obra = $valor_obra;
    }
    public function setTheme_obra($valor_obra) {
		$this->theme_obra = $valor_obra;
	}
	public function setImg_obra($valor_obra) {
		$this->img_obra = $valor_obra;
	}
	public function setCreated_by_obra($valor_obra) {
		$this->created_by_obra = $valor_obra;
    }
    public function setUpdated_by_obra($valor_obra) {
		$this->updated_by_obra = $valor_obra;
    }
    public function setDeleted_by_obra($valor_obra) {
		$this->deleted_by_obra = $valor_obra;
	}
	
	
	public function setAll_Insert_Obras($id_painting_sculpture, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $img_obra, $created_by_obra) {
		$this->id_painting_sculpture = $id_painting_sculpture;
		$this->name_obra = $name_obra;
        $this->author_obra = $author_obra;
		$this->year_obra = $year_obra;
		$this->descr_obra = $descr_obra;
		$this->theme_obra = $theme_obra;
		$this->img_obra = $img_obra;
        $this->created_by_obra = $created_by_obra;
    }
    
    public function setAll_Update_Obras($id_painting_sculpture, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $img_obra, $updated_by_obra) {
		$this->id_painting_sculpture = $id_painting_sculpture;
		$this->name_obra = $name_obra;
        $this->author_obra = $author_obra;
		$this->year_obra = $year_obra;
		$this->descr_obra = $descr_obra;
		$this->theme_obra = $theme_obra;
		$this->img_obra = $img_obra;
        $this->updated_by_obra = $updated_by_obra;
    }

    public function setAll_Update_Obras_2($id_painting_sculpture, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $updated_by_obra) {
		$this->id_painting_sculpture = $id_painting_sculpture;
		$this->name_obra = $name_obra;
        $this->author_obra = $author_obra;
		$this->year_obra = $year_obra;
		$this->descr_obra = $descr_obra;
		$this->theme_obra = $theme_obra;
        $this->updated_by_obra = $updated_by_obra;
    }
    
    public function setAll_Delete_Obras($id_painting_sculpture, $deleted_by_obra) {
        $this->id_painting_sculpture = $id_painting_sculpture;
        $this->deleted_by_obra = $deleted_by_obra;
    }
    
    public function setAll_Select_Obras($id_painting_sculpture, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $img_obra) {
        $this->id_painting_sculpture = $id_painting_sculpture;
        $this->name_obra = $name_obra;
        $this->author_obra = $author_obra;
        $this->year_obra = $year_obra;
		$this->descr_obra = $descr_obra;
        $this->theme_obra = $theme_obra;
        $this->img_obra = $img_obra;
	}

	public function setAll_Select_Obras_Rally($id_painting_sculpture, $name_obra, $author_obra, $year_obra, $descr_obra, $theme_obra, $img_obra) {
        $this->id_painting_sculpture = $id_painting_sculpture;
        $this->name_obra = $name_obra;
        $this->author_obra = $author_obra;
        $this->year_obra = $year_obra;
		$this->descr_obra = $descr_obra;
        $this->theme_obra = $theme_obra;
        $this->img_obra = $img_obra;
	}


	//GET - Recuperar
	
	
	//OBRAS
	public function getId_painting_sculpture() {
		return $this->id_painting_sculpture;
	} 
	
	public function getName_obra() {
		return $this->name_obra;
	} 
	
	public function getAuthor_obra() {
		return $this->author_obra;
    } 

    public function getYear_obra() {
		return $this->year_obra;
    }
    
    public function getDes_obra() {
		return $this->descr_obra;
    } 

    public function getTheme_obra() {
		return $this->theme_obra;
	}

	public function getImg_obra() {
		return $this->img_obra;
	}

	public function getCreated_by_obra() {
		return $this->created_by_obra;
    }
    
    public function getUpdated_by_obra() {
		return $this->updated_by_obra;
    }
    
    public function getDeleted_by_obra() {
		return $this->deleted_by_obra;
	}
	
	
}

?>