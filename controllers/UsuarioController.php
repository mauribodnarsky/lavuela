<?php

require_once 'models/usuario.php';
require_once 'models/alumno.php';
require_once 'models/instrumento.php';
require_once 'models/profesor.php';


class usuarioController{
	
	public function home(){
		
		require_once "views/usuario/login.php";

	}
	
	 public function login(){
			// Identificar al usuario
			// Consulta a la base de datos
		
			$error=false; //se usa para mostrar el mensaje de error 
			$usuario = new Usuario();
			$usuario->setNombre($_POST['name']);
			$usuario->setPassword($_POST['password']);
			
			$identity = $usuario->login();

			if(is_object($identity)){
				$_SESSION['identity'] = $identity;
				
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
			else{
				$error=true;
				$mensaje="DATOS INGRESADOS INCORRECTOS!";
			require_once "views/usuario/login.php";
			}

			
	}
	public function logout(){
		
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		$error=false; // booleano para mostrar mensajes de validacion
		require_once "views/usuario/login.php";

	}

}