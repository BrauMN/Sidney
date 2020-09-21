<?php


class GameVO {
	
	//ATRIBUTOS
	
    //Juegos 
    private $id_game;
    private $entry_date;
    private $start_hour;
	private $end_hour;
    private $time_played;
    private $id_rally;
    private $id_reward;

	
	//METODOS
	
	//SET

	//Juegos------------------------------------------------------------------------------------------------------------------------
    public function setId_game($g) {
		$this->id_game = $g;
	}
    public function setEntry_date($g) {
		$this->entry_date = $g;
	}
	public function setStarthour($g) {
		$this->start_hour = $g;
	}
	public function setEndhour($g) {
		$this->end_hour = $g;
    }
    public function setTimeplayed($g) {
		$this->time_played = $g;
    }
    public function setId_rally($g) {
		$this->id_rally = $g;
    }
    public function setId_reward($g) {
		$this->id_reward = $g;
    }

	
	public function setAll_InsertId($id_rally) {

        $this->id_rally = $id_rally;

    }

    public function setAll_Up($id_reward,$id_game) {
		$this->id_reward = $id_reward;
		$this->id_game = $id_game;
	}
	
	public function setAll_UpEnd($id_game) {
		$this->id_game = $id_game;
	}
	
	public function setAllSelectTime($id_game, $time_played) {
		$this->id_game = $id_game;
		$this->time_played = $time_played;
    }



	//GET - Recuperar
	
    //Juegos
    public function getId_game() {
		return $this->id_game;
    } 

	public function getEntry_date() {
		return $this->entry_date;
    } 
    
    public function getStarthour() {
		return $this->start_hour;
	} 
	
	public function getEndhour() {
		return $this->end_hour;
	} 
	
	public function getTimeplayed() {
		return $this->time_played;
    } 

    public function getId_rally() {
		return $this->id_rally;
    } 

    public function getId_reward() {
		return $this->id_reward;
    } 
	
}

?>