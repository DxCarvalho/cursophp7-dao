<?php

class usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;


	public function getIdusuario(){
		return $this->idusuario;
	}
	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}
	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}
	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public static function getList(){
		$sql = new sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

	}

	public static function search($login){

		$sql = new sql();

		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH;", array(":SEARCH"=>"%".$login."%"));
		
	}

	public function login($login, $password){

		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :USER AND dessenha = :PASS;", array(":USER"=>$login, ":PASS"=> $password));

		if(count($results) > 0){

			$row = $results[0];

				$this->setIdusuario($row["idusuario"]);
				$this->setDeslogin($row["deslogin"]);
				$this->setDessenha($row["dessenha"]);
				$this->setDtcadastro(new Datetime($row["dtcadastro"]));

		}else{

			throw new Exception("Usuário ou/a Senha inválida!");
			
		}

	}


	public function loadByID($id){

		$sql = new sql();

		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

		if(count($results) > 0){

			$row = $results[0];

			$this->setIdusuario($row["idusuario"]);
			$this->setDeslogin($row["deslogin"]);
			$this->setDessenha($row["dessenha"]);
			$this->setDtcadastro(new Datetime($row["dtcadastro"]));

		}
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")

		));
	}

}

?>