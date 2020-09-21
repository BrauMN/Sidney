<?php


class GameAnsVO {
	
	//ATRIBUTOS
	
    //Juegos 
    private $id_game_answer;
    private $id_game;
    private $id_rally;
    private $result;

	
	//METODOS
	
	//SET

	//Juegos------------------------------------------------------------------------------------------------------------------------
    public function setId_game($g) {
		$this->id_game_answer = $g;
	}
    public function setEntry_date($g) {
		$this->id_game = $g;
	}
	public function setStarthour($g) {
		$this->id_rally = $g;
	}
	public function setEndhour($g) {
		$this->result = $g;
    }
	
	public function setAll_InsertId($id_game, $id_rally, $result) {
        $this->id_game = $id_game;
        $this->id_rally = $id_rally;
        $this->result = $result;

    }

  	public function setAll_Select($id_game) {
      $this->id_game = $id_game;
  }



	//GET - Recuperar
	
    //Juegos
    public function getId_game_answer() {
		return $this->id_game_answer;
    } 

    public function getId_game() {
		return $this->id_game;
    } 

    public function getId_rally() {
		return $this->id_rally;
    } 

    public function getResult() {
		return $this->result;
    } 
	
}

?>