<?php
Class DB {
	private $host = 'localhost';
	private $username = 'root'; //nom d'utilisateur de la bd
	private $password = '';//mdp
	private $database = 'bd_doc_administrative'; // Nom de la base de données
	
	private $db;
	
	public function __construct($host = null, $username = null, $password = null, $database = null){
		if($host != null){
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
		}
		try{ $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password,
									array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}catch (Exception $e) {
			die('<h1>Impossible de se connecter à la base de données</h1> : '.$e->getMessage());
		}
	}
	private function getDB(){
		// if ($this->DB == null) {
			$DB= new PDO('mysql:dbname=plateforme;charset=utf8;host=localhost','root','');
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->DB = $DB;
		// }
		return $DB;
	}
	public function querym($requete){

		$req= $this->getDB()->query($requete);
		$data=$req->fetchAll(PDO::FETCH_OBJ);
		$req->closeCursor();
		return $data;
	}
	public function query($sql, $data = array(), $close = 1){
		$query = $this->db->prepare($sql);
		$query->execute($data);
		if($close == 1) $query->closeCursor();
		return $query;	
	}
	public function fetchAllObject($query, $close = 1){
		$result = $query->fetchAll(PDO::FETCH_OBJ);
		if($close == 1) $query->closeCursor();
		return $result;	
	}
	public function fetchAllArray($query, $close = 1){
		$result = $query->fetchAll();
		if($close == 1) $query->closeCursor();
		return $result;	
	}
	public function prepare($sql){
		return $this->db->prepare($sql);
		 	
	}
	public function executePrepared($prepare, $data = array()){
		return $prepare->execute($data);
	}
	public function isExisteLogin($login){
		$req=$this->prepare("select login from personnes where login = :login limit 1");
		$req->execute(array('login'=>$login));
		$resultat = $req->fetch();	$req->closeCursor();
		return $resultat['login'] == $login;
	}
	public function isCorrectPassword($login,$password){
		$req=$this->prepare("select password from personnes where login = :login limit 1");
		$req->execute(array('login'=>$login));
		$resultat = $req->fetch();	$req->closeCursor();
		return $resultat['password'] == $password ;
	}
	
	public function isExistenomprod($nom_prod){
		$req=$this->prepare("select nom_prod from produit where nom_prod = :nom_prod limit 1");
		$req->execute(array('nom_prod'=>$nom_prod));
		$resultat = $req->fetch();	$req->closeCursor();
		return $resultat['nom_prod'] == $nom_prod;
	}
	public function securiteform($donnees){
			$donnees=htmlspecialchars($donnees);
			$donnees=trim($donnees);
			$donnees=stripslashes($donnees);
			$donnees=strip_tags($donnees);
				return $donnees;
		}
		public function Majuscule($nom) {
			return strtoupper($nom) ;
		}
		public function validEmail($login){
			if (filter_var($login,FILTER_VALIDATE_EMAIL)) {
			return $login;
		}else{
			return false;
		}
	}
	public function withZero($nbr) {
		if(($nbr < 0) || ($nbr > 10))
			return 0 ;
		else return $nbr;
	}
}