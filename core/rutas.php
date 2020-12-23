<?php 

	//generando de forma automática el nombre de la clase y del archivo de los controladores
	function cargarControlador($controlador){
		$nombreControlador = ucwords($controlador); //ucwords para que la primera letra sea mayúscula
		$archivoControlador = 'controlador/'.ucwords($nombreControlador).'.php';

		if(!is_file($archivoControlador)){
			$archivoControlador = 'controlador/'.CONTROLADOR_PRINCIPAL.'.php';
		}

		require_once $archivoControlador;
		$control = new $nombreControlador();
		return $control;
	}	

function cargarAccion($controlador,$accion,$id=null,$pagina=null){

		if(isset($accion) && method_exists($controlador,$accion)){
			if($id==null){
				$controlador->$accion();
			}else if($pagina!=null){
				$controlador->$accion($pagina);
			}else{
				$controlador->$accion($id);
			}			
			
		}else{
			$controlador->ACCION_PRINCIPAL();
		}
	}


 
?>