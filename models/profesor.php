<?php

class Profesor{
	private $id;
	private $nombre;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}
	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}
	function getNombre() {
		return $this->nombre;
	}

	public function obtenertodos(){
		$profesores = $this->db->query("SELECT * FROM profesores ;");
		return $profesores;
	}
	public function sueldos(){
		$sql="SELECT profesores.nombre,instrumentos.instrumento,ROUND(SUM(instrumentos.cuota)*0.4) as 'profesor',ROUND(SUM(instrumentos.cuota)*0.6) as 'escuela'  from profesores inner join clases on clases.profesor=profesores.id inner join instrumentos on instrumentos.id=clases.instrumento GROUP by profesores.id,clases.instrumento";
		$sql = $this->db->query($sql);
		return $sql;
	
	}
	public function guardar(){
		$sql = "INSERT INTO profesores VALUES(NULL,'{$this->getNombre()}');";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
}