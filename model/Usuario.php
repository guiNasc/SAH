<?php
class Usuario{

	private $mail;
	private $pass;
	private $profile;
	private $id;


	public function setMail($mail){
		$this->mail = $mail;
	}
	public function getMail(){
		return $this->mail;
	}

	public function setPass($pass){
		$this->pass = $pass;
	}
	public function getPass(){
		return $this->pass;
	}
	
	public function setProfile($profile){
		$this->profile = $profile;
	}
	public function getProfile(){
		return $this->profile;
	}

	public function getId(){
		return $this->id;
	}

}
?>