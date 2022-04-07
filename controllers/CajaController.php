<?php
require_once 'models/usuario.php';
require_once 'models/caja.php';
require_once 'models/alumno.php';

class cajaController{
	
	public function index(){

		Utils::isIdentity();
		// renderizar vista
		require_once 'views/administrador/index.php';
	}
	public function guardarpago(){
		Utils::isIdentity();
		$monto=$_POST['monto'];
		$moneda="EFECTIVO";
		if(isset($_POST['POSNET'])){
			$moneda="POSNET";
		}
		$descripcion=$_POST['descripcion'];
		$caja=new Caja();
		$caja->setIngreso(0);
		$caja->setEgreso($monto);
		$caja->setMoneda($moneda);
		$caja->setDescripcion($descripcion);
		$caja->guardarmovimiento();
		$movimientos=$caja->obtenercaja();
		$posnet=$caja->totalposnet();
		$efectivo=$caja->totalefectivo();
		$total=$posnet+$efectivo;
		require_once 'views/administrador/movimientos.php';
	}
	
	public function guardarcobro(){
		Utils::isIdentity();
		$monto=$_POST['monto'];
		$moneda="EFECTIVO";
		if(isset($_POST['POSNET'])){
			$moneda="POSNET";
		}
		$descripcion=$_POST['descripcion'];
		$caja=new Caja();
		$caja->setIngreso($monto);
		$caja->setEgreso(0);
		$caja->setMoneda($moneda);
		$caja->setDescripcion($descripcion);
		$caja->guardarmovimiento();
		$movimientos=$caja->obtenercaja();
		$posnet=$caja->totalposnet();
		$efectivo=$caja->totalefectivo();
		$total=$posnet+$efectivo;
		require_once 'views/administrador/movimientos.php';
	}
	
	

	
}