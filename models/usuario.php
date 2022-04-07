<?php

class Usuario{
	private $nombre;
	private $password;
	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function getNombre() {
		return $this->nombre;
	}
	function setPassword($password) {
		$this->password = $password;
	}

	function getPassword() {
		return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
	}
	public function getAll(){
		$usuarios=array();
		$usuarioss = $this->db->query("SELECT * FROM usuarios;");
		while($filas=$usuarioss->fetch_assoc()){
            $usuarios[]=$filas;
        }

		return $usuarios;
	}


	public function delete($id){
		$sql="DELETE FROM usuarios WHERE id=".$id.";";
		$delete = $this->db->query($sql);
		return $delete;
	}
	public function edit($id){
		$sql = "UPDATE usuarios SET nombre='{$this->getNombre()}' where id=".$id."; ";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		
		return $result;
	}
	public function save(){

		$sql = "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}','{$this->getPassword()}'); ";

		$save = $this->db->query($sql);
		return $save;
	}
	
	public function login(){
		$result = false;
		$nombre = $this->nombre;
		$password = $this->password;
		
		// Comprobar si existe el usuario
		$sql = "SELECT * FROM usuarios WHERE nombre LIKE '%{$this->getNombre()}%'";
		$login = $this->db->query($sql);

		
		if($login && $login->num_rows == 1){
			$usuario = $login->fetch_object();
			// Verificar la contraseña
			$verify = password_verify($password, $usuario->password);
			
			if($verify){
				$result = $usuario;
			}
		}
		
		return $result;
	}
	
}