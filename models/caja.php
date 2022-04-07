<?php
class Caja{
	private $id;
	private $ingreso;
	private $egreso;
	private $descripcion;
	private $fecha;
	private $tipo;
	private $moneda;
	public function __construct() {
		$this->db = Database::connect();
	}

	function getId() {
		return $this->id;
	}

	function getIngreso() {
		return $this->ingreso;
	}

	function getEgreso() {
		return $this->egreso;
	}
	function getDescripcion() {
		return $this->detalle;
	}
	function getTipo() {
		return $this->tipo;
	}

	function getFecha() {
		return $this->fecha;
	}


	function getMoneda() {
		return $this->moneda;
	}

	
	function setId($id) {
		$this->ingreso = $id;
	}

	function setIngreso($ingreso) {
		$this->ingreso = $ingreso;
	}


	function setTipo($tipo){
		$this->tipo=	$tipo;
	}
	function setFecha($fecha){
		$this->fecha=	$fecha;
	}
	function setEgreso($egreso) {
		$this->egreso = $egreso;
	}
	function setDescripcion($detalle){
		$this->detalle=$detalle;
	}
	
	function setMoneda($moneda){
		$this->moneda=$moneda;
	}
	
	//metodos 
	
	//** */
	public function borrarmovimiento($id){
		$sql = $this->db->query("DELETE FROM caja  WHERE id =".$id." ");
		
		return $sql;
	}
	public function guardarmovimiento(){
		$consulta="INSERT INTO caja VALUES(NULL,{$this->getIngreso()},{$this->getEgreso()},'{$this->getDescripcion()}',CURRENT_TIMESTAMP(),'{$this->getMoneda()}');";
		
		$sql = $this->db->query($consulta);
		return $sql;
	}
	
	public function obtenercaja(){
		$caja=array();
		$ajustarfecha = $this->db->query("SET lc_time_names = 'es_AR';");
		$sql ="SELECT id,ingreso,egreso,descripcion,moneda,DATE_FORMAT(fecha,'%H :%i hs del %d de %M de %Y') as 'fecha' from caja ORDER BY fecha desc;";
		$filassql = $this->db->query($sql);
		while($filas=$filassql->fetch_assoc()){
            $caja[]=$filas;
        }
		return $caja;
	}
	public function buscarmovimiento($busqueda){
		$caja=array();
		$ajustarfecha = $this->db->query("SET lc_time_names = 'es_AR';");

		$sql ="SELECT * from caja WHERE descripcion LIKE '%".$busqueda."%';";
		$filassql = $this->db->query($sql);

		while($filas=$filassql->fetch_assoc()){
            $caja[]=$filas;
        }

		return $caja;
	}
	public function totalposnet(){
		$sql ="SELECT (sum(ingreso)-(sum(egreso))) as 'POSNET' FROM caja where moneda='POSNET';";
		$filassql = $this->db->query($sql);
		$posnet=$filassql->fetch_assoc();
		$posnet=$posnet['POSNET'];
		return $posnet;
	}
	public function totalefectivo(){
		$sql ="SELECT (sum(ingreso)-(sum(egreso))) as 'EFECTIVO' FROM caja where moneda='EFECTIVO';";
		$filassql = $this->db->query($sql);
		$efectivo=$filassql->fetch_assoc();
		$efectivo=$efectivo['EFECTIVO'];
		return $efectivo;
	}
	public function ultimomesefectivo(){
		$ajustarfecha = $this->db->query("SET lc_time_names = 'es_AR';");
		$sql ="SELECT SUM(caja.ingreso) AS 'ingreso', SUM(caja.egreso) as 'egreso',DATE_FORMAT(caja.fecha,'%M') as 'mes'  FROM caja WHERE caja.moneda='EFECTIVO' AND YEAR(caja.fecha)=YEAR(CURRENT_DATE()) 
				AND MONTH(caja.fecha)  = MONTH(CURRENT_DATE())-1";
		$filassql = $this->db->query($sql);
		$ultimomes=$filassql->fetch_assoc();
		
		return $ultimomes;
	}
	
	public function ultimomesposnet(){
		$ajustarfecha = $this->db->query("SET lc_time_names = 'es_AR';");
		$sql ="SELECT SUM(caja.ingreso) AS 'ingreso', SUM(caja.egreso) as 'egreso',DATE_FORMAT(caja.fecha,'%M') as 'mes'  FROM caja WHERE caja.moneda='POSNET' AND YEAR(caja.fecha)=YEAR(CURRENT_DATE()) 
				AND MONTH(caja.fecha)  = MONTH(CURRENT_DATE())-1";
		$filassql = $this->db->query($sql);
		$ultimomes=$filassql->fetch_assoc();
		
		return $ultimomes;
	}
}



	