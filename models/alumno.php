<?php

class Alumno{
	private $id;
	private $nombre;
	private $dni;
	private $fecha_inscripcion;
	private $fecha_nacimiento;
	private $estado;
	private $ultimo_pago;
	private $telefono;
	private $db;
	private $email;
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

	function setDni($dni) {
		$this->dni = $this->db->real_escape_string($dni);
	}
	function getDni() {
		return $this->dni;
	}
	function setFechaNacimiento($fecha_nacimiento) {
		$this->fecha_nacimiento = $this->db->real_escape_string($fecha_nacimiento);
	}
	function getFechaNacimiento() {
		return $this->fecha_nacimiento;
	}
	function setFechaInscripcion($fecha_inscripcion) {
		$this->fecha_inscripcion = $this->db->real_escape_string($fecha_inscripcion);
	}
	function getFechaInscripcion() {
		return $this->fecha_inscripcion;
	}
	function setUltimoPago($ultimo_pago) {
		$this->ultimo_pago = $this->db->real_escape_string($ultimo_pago);
	}
	function getUltimoPago() {
		return $this->ultimo_pago;
	}
	function setEmail($email) {
		$this->email = $this->db->real_escape_string($email);
	}
	function getEmail() {
		return $this->email;
	}
	function setTelefono($telefono) {
		$this->telefono = $this->db->real_escape_string($telefono);
	}
	function getTelefono() {
		return $this->telefono;
	}	
	function setEstado($estado) {
		$this->estado = $this->db->real_escape_string($estado);
	}
	function getEstado() {
		return $this->estado;
	}
	public function obtenertodosalumnos(){
		$alumnos = $this->db->query("SELECT id,nombre,dni,fecha_inscripcion,fecha_nacimiento,estado,DATE_FORMAT(ultimo_pago,'%H :%i hs del %d de %M de %Y') as 'ultimo_pago',email,telefono FROM alumnos ORDER BY estado ASC;");
		return $alumnos;
	}

	public function obtenertodoscuotas(){
		$filas=array();
		$ajustarfecha = $this->db->query("SET lc_time_names = 'es_AR';");
		$alumnos = $this->db->query("SELECT clases.cuotas_pagadas as 'cuotas_pagadas',instrumentos.instrumento,alumnos.id as 'idalumno',alumnos.nombre,instrumentos.cuota,instrumentos.id as 'idinstrumento',clases.fecha_inscripcion,DATE_FORMAT(clases.fecha_inscripcion,'%M %Y') as 'mesinscripcion',DATE_FORMAT(DATE_ADD(clases.fecha_inscripcion, INTERVAL cuotas_pagadas month),'%M %Y') as 'proximo_pago',DATE_FORMAT(DATE_ADD(clases.fecha_inscripcion, INTERVAL cuotas_pagadas month),'%m') as 'mesvencimiento',DATE_FORMAT(DATE_ADD(clases.fecha_inscripcion, INTERVAL cuotas_pagadas month),'%Y') as 'anovencimiento' FROM clases INNER JOIN alumnos ON alumnos.id=clases.alumno INNER JOIN instrumentos on instrumentos.id=clases.instrumento;");
		while($fila=$alumnos->fetch_assoc()){
            $filas[]=$fila;
        }
				return $filas;
	}

	public function obtenertodosclases(){
		$alumnos = $this->db->query("
		SELECT DISTINCT  clases.profesor as 'idprofesor',instrumentos.id as 'idinstrumento',instrumentos.instrumento,profesores.nombre as 'profesor',COUNT(clases.instrumento) as 'alumnos',instrumentos.cuota as 'valorcuota',instrumentos.id as 'instrumentoid'  FROM profesores INNER JOIN clases ON clases.profesor=profesores.id INNER JOIN instrumentos on instrumentos.id=clases.instrumento GROUP BY clases.instrumento,clases.profesor");
		return $alumnos;
	}
	
	public function obteneruno(){
		$alumno = $this->db->query("SELECT * FROM alumnos WHERE dni={$this->getDni()}");
		return $alumno->fetch_object();
	}
	
	public function guardar(){
		$sql = "INSERT INTO alumnos VALUES(NULL,'{$this->getNombre()}','{$this->getDni()}',CURRENT_TIMESTAMP(),'{$this->getFechaNacimiento()}','{$this->getEstado()}',{$this->getUltimoPago()},'{$this->getEmail()}','{$this->getTelefono()}');";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function editaralumno($id){
		$sql = "UPDATE alumnos SET nombre='{$this->getNombre()}',dni='{$this->getDni()}',fecha_nacimiento='{$this->getFechaNacimiento()}',estado='{$this->getEstado()}',email='{$this->getEmail()}',telefono='{$this->getTelefono()}' WHERE id=".$id.";";
		$save = $this->db->query($sql);
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function verclase($profesor,$instrumento){
		$alumnos = $this->db->query("SELECT clases.id as 'claseid', alumnos.nombre,clases.ultimo_pago,clases.cuotas_pagadas as 'cuotas',clases.fecha_inscripcion  FROM alumnos INNER JOIN clases ON clases.alumno=alumnos.id WHERE clases.profesor=".$profesor." AND clases.instrumento=".$instrumento.";");
		return $alumnos;
	}
	public function alumnosdesactivados(){
		$alumno = $this->db->query("SELECT COUNT(id) as 'total' FROM alumnos WHERE estado='desactivado';");
		$objeto=$alumno->fetch_object();
		$respuesta=$objeto->total;
		return $respuesta;
	}
	public function alumnosactivos(){
		$alumno = $this->db->query("SELECT COUNT(id) as 'total' FROM alumnos WHERE estado='activo';");
		$objeto=$alumno->fetch_object();
		$respuesta=$objeto->total;
		return $respuesta;
	}
	public function inscribiraclase($alumno,$instrumento,$profesor){
		$consultaexistencia = "SELECT * FROM clases WHERE alumno=".$alumno." AND instrumento=".$instrumento." AND profesor=".$profesor.";";
		$ejecutar = $this->db->query($consultaexistencia);
		$filas=mysqli_num_rows($ejecutar);
		if($filas==0){
		$sql = "INSERT INTO clases VALUES(NULL,".$alumno.",".$instrumento.",".$profesor.",CURRENT_TIMESTAMP(),NULL,NULL);";
		$save = $this->db->query($sql);	
		if($save){
			$result = true;
		}}
		else{
			$result=false;
		}
	
		return $result;
	}
	public function dardebajaclase($clase){
		$sql = "DELETE FROM clases WHERE id=".$clase.";";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function obtenercuotas(){
		$sql="SELECT alumnos.nombre,instrumentos.instrumento,instrumentos.cuota  FROM instrumentos INNER JOIN clases ON clases.instrumento=instrumentos.id INNER JOIN alumnos ON alumnos.id=clases.alumno GROUP BY alumnos.id";
		$cuotas= $this->db->query($sql);
		return $cuotas;
	}
	
	public function obtenercuotaporalumno($id){
		$sql="SELECT alumnos.nombre,SUM(instrumentos.cuota) as 'cuota' FROM instrumentos INNER JOIN clases ON clases.instrumento=instrumentos.id INNER JOIN alumnos ON alumnos.id=clases.alumno WHERE alumnos.id=".$id." GROUP BY alumnos.id ";
		$cuota= $this->db->query($sql);
		$cuota=$cuota->fetch_assoc();
		$cuota=$cuota['cuota'];
		return $cuota;
	}
	public function pagarcuota($alumno,$clase){
		$consulta="SELECT * from clases where alumno=".$alumno." AND instrumento=".$clase.";";
		$save = $this->db->query($consulta);
		$fila=$save->fetch_assoc();
		if($fila['cuotas_pagadas']==0){
			$sql = "UPDATE alumnos SET ultimo_pago=CURRENT_TIMESTAMP() WHERE id=".$alumno.";";
			$save = $this->db->query($sql);
			$sql = "UPDATE clases SET cuotas_pagadas=1,ultimo_pago=CURRENT_TIMESTAMP() WHERE alumno=".$alumno." and clases.instrumento=".$clase.";";
			$save = $this->db->query($sql);
			$result = false;
			if($save){
				$result = true;
			}
		}else{
			$sql = "UPDATE alumnos SET ultimo_pago=CURRENT_TIMESTAMP() WHERE id=".$alumno.";";
			$save = $this->db->query($sql);
			$sql = "UPDATE clases SET cuotas_pagadas=cuotas_pagadas+1,ultimo_pago=CURRENT_TIMESTAMP() WHERE alumno=".$alumno." and clases.instrumento=".$clase.";";
			$save = $this->db->query($sql);
			$result = false;
			if($save){
				$result = true;
			}
		}
	
		return $result;
	}
	public function desactivar($id){
		$sql="UPDATE alumnos  SET estado='desactivado' WHERE id =".$id.";";

		$borrar = $this->db->query($sql);
		$sql="DELETE from clases  WHERE clases.alumno=".$id.";";
		$borrar = $this->db->query($sql);

		return $borrar;
	}
	
}