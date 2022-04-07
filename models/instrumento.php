<?php

class Instrumento{
	private $id;
	private $nombre;
	private $dni;
	private $fecha_inscripcion;
	private $fecha_nacimiento;
	private $estado;
	private $db;
	
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

	function setCuota($cuota) {
		$this->cuota = $cuota;
	}
	function getCuota() {
		return $this->cuota;
	}
	
	public function obtenertodos(){
		$categorias = $this->db->query("SELECT * FROM instrumentos ORDER BY id DESC;");
		return $categorias;
	}
	
	public function obteneruno(){
		$categoria = $this->db->query("SELECT * FROM instrumentos WHERE id={$this->getId()}");
		return $categoria->fetch_object();
	}
	
	public function actualizarcuota(){
		$sql = "UPDATE instrumentos SET cuota={$this->getCuota()}  WHERE id={$this->getId()};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function guardar(){
		$sql = "INSERT INTO instrumentos VALUES(NULL,'{$this->getNombre()}',{$this->getCuota()});";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function cantidadinstrumentos(){
		$alumnos = $this->db->query("SELECT COUNT(id) FROM instrumentos GROUP BY id;");
		return $alumnos;
	}
	public function alumnosporinstrumento(){
		$alumnos = $this->db->query("SELECT DISTINCT instrumentos.instrumento,COUNT(clases.id) as 'total' FROM instrumentos INNER JOIN clases ON clases.instrumento=instrumentos.id GROUP BY clases.instrumento,clases.alumno;");
		return $alumnos;
	}
	
	
}