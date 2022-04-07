<?php
require_once 'models/usuario.php';
require_once 'models/alumno.php';
require_once 'models/caja.php';
require_once 'models/instrumento.php';
require_once 'models/profesor.php';
class administradorController{
	

	public function index(){
		Utils::isIdentity();

		$objusuario=new Usuario();
		$objalumno=new Alumno();
		$alumnos=$objalumno->obtenertodosalumnos();
		$alumnosactivos=$objalumno->alumnosactivos();
		$alumnosinactivos=$objalumno->alumnosdesactivados();
			
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/alumnos.php';
	}
	
	public function alumnos(){
		Utils::isIdentity();
		$objusuario=new Usuario();
		$objalumno=new Alumno();
		$alumnos=$objalumno->obtenertodosalumnos();
		$alumnosactivos=$objalumno->alumnosactivos();
		$alumnosinactivos=$objalumno->alumnosdesactivados();
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/alumnos.php';
	}

	public function clases(){
		Utils::isIdentity();
		$objusuario=new Usuario();
		$objalumno=new Alumno();
		$objinstrumento=new Instrumento();
		$instrumentos=$objinstrumento->obtenertodos();
		$estadisticas=$objinstrumento->alumnosporinstrumento();
		$clases=$objalumno->obtenertodosclases();
		$alumnosformulario=$objalumno->obtenertodosalumnos();
		
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/clases.php';
	}
	public function editarcuota(){
		Utils::isIdentity();
		$objusuario=new Usuario();
		$objalumno=new Alumno();
		$objinstrumento=new Instrumento();
		$objinstrumento->setId($_POST['instrumento']);
		$objinstrumento->setCuota($_POST['cuota']);
		$objinstrumento->actualizarcuota();
		$instrumentos=$objinstrumento->obtenertodos();
		$estadisticas=$objinstrumento->alumnosporinstrumento();
		$clases=$objalumno->obtenertodosclases();
		$alumnosformulario=$objalumno->obtenertodosalumnos();
		
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/clases.php';
	}
	public function registrarprofesor(){
		Utils::isIdentity();
		$profesor=new Profesor();
		$profesor->setNombre($_POST['profesor']);
		$profesor->guardar();
		$sueldos=$profesor->sueldos();
		
	require_once 'views/administrador/sueldos.php';
	
}

	public function movimientos(){
		Utils::isIdentity();
		$objcaja=new Caja();
		$movimientos=$objcaja->obtenercaja();
		$posnet=$objcaja->totalposnet();
		$efectivo=$objcaja->totalefectivo();
		$balanceefectivo=$objcaja->ultimomesefectivo();
		$balanceposnet=$objcaja->ultimomesposnet();

		$total=$posnet+$efectivo;
		require_once 'views/administrador/movimientos.php';
	}
	public function cuotas(){
		Utils::isIdentity();
		$objalumno=new Alumno();
		$objinstrumento=new Instrumento();
		$instrumentos=$objinstrumento->obtenertodos();
		$estadisticas=$objinstrumento->alumnosporinstrumento();
		$alumnos=$objalumno->obtenertodoscuotas();
		$alumnosformulario=$objalumno->obtenertodosalumnos();
		
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/cuotas.php';
	}


	public function sueldos(){
		Utils::isIdentity();
		$objprofesor=new Profesor();
		$sueldos=$objprofesor->sueldos();
		require_once 'views/administrador/sueldos.php';
	}
	public function crearinstrumento(){
		Utils::isIdentity();
		$objinstrumento=new Instrumento();
		$objinstrumento->setNombre($_POST['instrumento']);
		$objinstrumento->setCuota($_POST['cuota']);
		$objinstrumento->guardar();
		$instrumentos=$objinstrumento->obtenertodos();
	}
	public function pagarsueldo(){
		Utils::isIdentity();
		$detalle="Pago a ".$_POST['profesor'];
		$objcaja=new Caja();
		$objcaja->setDescripcion($detalle);
		$objcaja->setEgreso($_POST['pago']);
		$moneda="EFECTIVO";

		if(isset($_POST['posnet'])){
			$moneda="POSNET";
		}
		
		$objcaja->setMoneda($moneda);
		$objcaja->setIngreso(0.00);
		$objcaja->guardarmovimiento();

		$movimientos=$objcaja->obtenercaja();
		$posnet=$objcaja->totalposnet();
		$efectivo=$objcaja->totalefectivo();
		$total=$posnet+$efectivo;
		require_once 'views/administrador/movimientos.php';
	
	}
	public function verclase(){
		Utils::isIdentity();
		$alumno=new Alumno();
		$alumnos=$alumno->verclase($_GET['profesor'],$_GET['clase']);
		require_once 'views/administrador/verclase.php';
	}

	public function borraralumno(){
		Utils::isIdentity();
		$alumno=new Alumno();
		$baja=$alumno->dardebajaclase($_GET['clase']);

		header("Location:".base_url."administrador/clases");
	}



}
	
	
	
