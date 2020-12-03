<?php  
	
	//desde este index se relaciona la conexión con el controlador, y en el controlador ya está incluída la vista y el
	require_once "db/config.php";
	require_once "core/rutas.php";
	require_once "db/conexion.php";
	require_once "controlador/Controlador.php";


	//EVITA PODER ENTRAR A CUALQUIER PÁGINA SIN LOGEARSE
    session_start();//reanudando sesión

    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }




	/*
	Valdando si existe el controlador y la acción en la URL, para hacerla dinámica, el controlador solo es uno, "VehiculosControlador", y las acciones son las que están en el controlador: index, nuevo, etc.
	*/

	if(isset($_GET['c'])){
		$controlador = cargarControlador($_GET['c']);

		if(isset($_GET['a'])){	
			if(isset($_GET['id'])){
				cargarAccion($controlador,$_GET['a'], $_GET['id']);
			}else{
				cargarAccion($controlador,$_GET['a']);		
			}
		}else{
			cargarAccion($controlador,ACCION_PRINCIPAL);
		}

		
	}else{
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp=ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}

?>