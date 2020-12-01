<?php 	 

	class Conectar{

		public static function conexion(){
			$user="root";
	    	$pass="";

			try{
		
				$info = 'mysql:host=localhost;dbname=asistencia_docentes;charset=utf8';
				$opc = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
				$miConexion = new PDO ($info,$user,$pass,$opc);
			

			}catch(Exception $e){
				die("Error: ".$e->getMessage());
			}

			return $miConexion;
		}

	}


?>