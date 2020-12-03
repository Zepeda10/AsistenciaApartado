<?php 

		try{
			//htmlentities - Convierte todos los caracteres a HTML
			//addslashes - Devuelve un string con barras invertidas delante de los caracteres que necesitan ser escapados. Estos caracteres son la comilla simple ('), comilla doble ("), barra invertida (\) y NUL (el byte NULL).
			//Esto para evitar inyeccion sql

			$usuario = htmlentities(addslashes($_POST['apodo']));
			$pass = htmlentities(addslashes($_POST['pass']));


			$conexion = new PDO ("mysql:host=localhost; dbname=asistencia_docentes","root","");

			/*PDO::setAttribute establece un atributo en el identificador de base de datos.
			PDO::ATTR_ERRMODE: este atributo se utiliza para la notificación de errores. Puede tener
			uno de los siguientes valores:

			PDO::ERRMODE_EXCEPTION - Este valor produce excepciones. En el modo de excepción, si hay un error en SQL, PDO producirá excepciones y el script dejará de ejecutarse.
			*/
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = " SELECT * FROM usuarios WHERE apodo = :u AND pass = :c "; //:u y :c son marcadores, en vez del ? 

			$resultado = $conexion->prepare($sql);

			//Especificando a qué variable pertenecen los marcadores de la consulta
			$resultado->bindValue(":u",$usuario);
			$resultado->bindValue(":c",$pass);

			$resultado->execute();

			$numRegistro = $resultado->rowCount();//Cuenta cuántas filas generó la consulta, si existe el usuario, devilverá 1 fila, sino, 0.
			if($numRegistro!=0){

				session_start();//iniciando sesión

				$_SESSION["user"]=$_POST['apodo'];//se almacena el nombre del usuario en la variable super global "$_SESSION['user']"

				header("Location: principal.php");
			}else{
				header("Location: index.php");
			}



		}catch(Exception $e){
			die("Error: ".$e->getMessage());
		}


	?>
	
