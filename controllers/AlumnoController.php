<?php
require_once 'models/usuario.php';
require_once 'models/caja.php';
require_once 'models/alumno.php';
require_once 'models/profesor.php';
require_once 'models/instrumento.php';

class alumnoController{
	

	public function registrar(){
		Utils::isIdentity();
			$alumno=new Alumno();
			$alumno->setNombre($_POST['nombre']);
			$alumno->setDni($_POST['dni']);
			$alumno->setFechaNacimiento($_POST['fecha_nacimiento']);
			$alumno->setEstado("activo");
			$alumno->setUltimoPago("NULL");
			$alumno->setEmail($_POST['email']);
			$alumno->setTelefono($_POST['telefono']);
			$alumno->guardar();
			$alumnos=$alumno->obtenertodosalumnos();


			$profesor=new Profesor();
			$profesores=$profesor->obtenertodos();
			
		require_once 'views/administrador/alumnos.php';
		
	}
	public function inscribir(){
		Utils::isIdentity();
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		$alumno=new Alumno();
		$id=$_POST['alumno'];
		$instrumentosalumno=$_POST['instrumentos'];
		$profesor=$_POST['profesor'];
		$alumno->guardar();
		$alumnosactivos=$alumno->alumnosactivos();
		$alumnosinactivos=$alumno->alumnosdesactivados();
		
		foreach($instrumentosalumno as $instrumento => $index){
		$r=$alumno->inscribiraclase($id,$index,$profesor);
		if($r==false){
		$mensaje="El alumno ya se encuentra inscripto";
		}
		}
		$clases=$alumno->obtenertodosclases();
		$objinstrumento=new Instrumento();
		$estadisticas=$objinstrumento->alumnosporinstrumento();

		
	require_once 'views/administrador/clases.php';
	}
	public function desactivar(){
		Utils::isIdentity();
			$id=$_GET['id'];
		$objalumno=new Alumno();
		$dardebaja=$objalumno->desactivar($id);
		$alumnosactivos=$objalumno->alumnosactivos();
		$alumnosinactivos=$objalumno->alumnosdesactivados();
		$alumnos=$objalumno->obtenertodosalumnos();
		$objinstrumento=new Instrumento();
		$estadisticas=$objinstrumento->alumnosporinstrumento();
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
		require_once 'views/administrador/alumnos.php';

	}
	public function editaralumno(){
		Utils::isIdentity();
		$alumno=new Alumno();
			$alumno->setNombre($_POST['nombre']);
			$alumno->setDni($_POST['dni']);
			$alumno->setFechaNacimiento($_POST['fecha_nacimiento']);
			$alumno->setEstado($_POST['estado']);
			$alumno->setFechaInscripcion($_POST['fecha_inscripcion']);
			$alumno->setEmail($_POST['email']);
			$alumno->setTelefono($_POST['telefono']);
			$id=$_POST['editarid'];
			$alumno->editaralumno($id);
			$alumnosactivos=$alumno->alumnosactivos();
			$alumnosinactivos=$alumno->alumnosdesactivados();
			
			$alumnos=$alumno->obtenertodosalumnos();
			
		$profesor=new Profesor();
		$profesores=$profesor->obtenertodos();
			require_once 'views/administrador/alumnos.php';
		}

	public function dardebaja(){
		Utils::isIdentity();
		$alumno=new Alumno();
		$clase=$_GET['id'];
		$objinstrumento=new Instrumento();
		$alumno->dardebajaclase($clase);
		$estadisticas=$objinstrumento->alumnosporinstrumento();

		$alumnos=$alumno->obtenertodosclases();
		require_once 'views/administrador/clases.php';

	}
	public function pagarcuota(){
		Utils::isIdentity();
		$alumno=new Alumno();
		$id=$_POST['alumno'];
		$ingreso=$_POST['total'];
		$detalle=$_POST['detalle'];
		$clase=$_POST['instrumento'];
		$objinstrumento=new Instrumento();
		$alumno->pagarcuota($id,$clase);
		$caja=new Caja();
		if(isset($_POST['descuento']) && ($_POST['descuento']>0)){
			$descuento=(($ingreso*$_POST['descuento'])/100);
			$ingreso=$ingreso-$descuento;

		}
		$caja->setIngreso($ingreso);
		$moneda="EFECTIVO";
		if(isset($_POST['posnet'])){
			$moneda="POSNET";
		}
		$caja->setMoneda($moneda);
		$caja->setDescripcion($detalle);
		$caja->setEgreso(0.00);
		$caja->guardarmovimiento();
	

		$movimientos=$caja->obtenercaja();
		$posnet=$caja->totalposnet();
		$efectivo=$caja->totalefectivo();
		$total=$posnet+$efectivo;
		require_once 'views/administrador/movimientos.php';

	}
}