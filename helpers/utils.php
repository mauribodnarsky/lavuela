<?php

class Utils{
	

	public static function isIdentity(){
		if(!isset($_SESSION['identity'])){
			header("Location:".base_url."usuario/home");
		}else{
			return true;
		}
	}
	
}
