 <?php 

class Controlador{

	public function __construct(){
		require_once "modelo/Modelo.php";
	} 

	/* --------------- MODELO Y VISTA DE DOCENTES ----------------- */

	public function principal(){
		$objeto = new modelo();
		$data["titulo"] = "Inicio";
		$data["objeto"] = $objeto->getDocentes();

		//mandando información del modelo a la vista
		require_once "vista/bienvenidaPrueba.php";
	}

	//mostrando vista de docentes (html) creada en carpeta "vista", haciendo interactuar modelo con vista
	public function muestraDocentes(){
		$objeto = new modelo();
		$data["titulo"] = "Docentes";
		$data["objeto"] = $objeto->getDocentes();
		$data["pagina"] = $objeto->getPaginacionDocentes();

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_docentes.php";
	}

     //mostrando vista de agregar docentes
	public function nuevoDocente(){
		$data["titulo"] = "Agregar Docentes";
		require_once "vista/admin/agregarDocentes.php";
	}

	//Pasando valores a método insertarDocente del modelo, para agregarlos en la vista de "agregarProveedor"
	public function guardarDocente(){
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$entrada = $_POST['hora_entrada'];
		$salida = $_POST['hora_salida'];


		$objeto = new modelo();
		$objeto->insertarDocente($nombre,$apellidos,$email,$telefono,$entrada,$salida);

		$data["titulo"] = "Agregar Docentes";
			
	}

	//Mostrando vista para modificar proveedor
	public function editarDocente($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Docente";
		$data["objeto"] = $objeto->getDocente($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarDocentes.php";

	}

	//Llamándo método para actualizar proveedor
	public function actualizaDocente(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$entrada = $_POST['hora_entrada'];
		$salida = $_POST['hora_salida'];

		$objeto = new modelo();
		$objeto->modificarDocente($id,$nombre,$apellidos,$email,$telefono,$entrada,$salida);
	}

	//llamando función eliminar un proveedor
	public function borraDocente($id){
		$objeto = new modelo();
		$objeto->eliminarDocente($id);
		header("Location: principal.php?c=controlador&a=muestraDocentes");

	}

	//Llamando método para buscar proveedor
	public function buscaDocente(){
		$buscar = $_POST['buscarDocente'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarDocente($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_docentes.php";
	}


	/* --------------- MODELO Y VISTA DE GRUPOS ----------------- */

	//mostrando vista de grupos (html) creada en carpeta "vista", haciendo interactuar modelo con vista
	public function muestraGrupos(){
		$objeto = new modelo();
		$data["titulo"] = "Grupos";
		$data["objeto"] = $objeto->getGrupos();
		$data["pagina"] = $objeto->getPaginacionGrupos();

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_grupos.php";
	}

     //mostrando vista de agregar grupos
	public function nuevoGrupo(){
		$data["titulo"] = "Agregar Grupos";
		require_once "vista/admin/agregarGrupos.php";
	}

	//Pasando valores a método insertarDocente del modelo, para agregarlos en la vista de "agregarProveedor"
	public function guardarGrupo(){
		$nombre = $_POST['nombre_grupo'];

		$objeto = new modelo();
		$objeto->insertarGrupos($nombre);

		$data["titulo"] = "Agregar Grupos";
			
	}

	public function actualizaGrupo(){
		$objeto = new modelo();
		$id = $_POST['id'];
		$nombre = $_POST['nombre_grupo'];

		$objeto->modificarGrupo($id,$nombre);
	}

	public function editarGrupo($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Grupo";
		$data["objeto"] = $objeto->getGrupo($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarGrupos.php";

	}



	//llamando función eliminar un proveedor
	public function borraGrupo($id){
		$objeto = new modelo();
		$objeto->eliminarGrupo($id);
		header("Location: principal.php?c=controlador&a=muestraGrupos");

	}

	//Llamando método para buscar proveedor
	public function buscaGrupo(){
		$buscar = $_POST['buscarGrupo'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarGrupo($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_grupos.php";
	}


	/* --------------- MODELO Y VISTA DE SALONES ----------------- */

	//mostrando vista de salones (html) creada en carpeta "vista", haciendo interactuar modelo con vista
	public function muestraSalones(){
		$objeto = new modelo();
		$data["titulo"] = "Salones";
		$data["objeto"] = $objeto->getSalones();
		$data["pagina"] = $objeto->getPaginacionSalones();

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_salon.php";
	}

     //mostrando vista de agregar grupos
	public function nuevoSalon(){
		$data["titulo"] = "Agregar Salones";
		require_once "vista/admin/agregarSalon.php";
	}

	//Pasando valores a método insertarDocente del modelo, para agregarlos en la vista de "agregarProveedor"
	public function guardarSalon(){
		$nombre = $_POST['nombre_salon'];

		$objeto = new modelo();
		$objeto->insertarSalones($nombre);

		$data["titulo"] = "Agregar Salones";
			
	}

	public function editarSalon($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Salón";
		$data["objeto"] = $objeto->getSalon($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarSalones.php";

	}

	public function actualizaSalon(){
		$objeto = new modelo();
		$id = $_POST['id'];
		$nombre = $_POST['nombre_salon'];

		$objeto->modificarSalon($id,$nombre);
	}

	//llamando función eliminar un salones
	public function borraSalon($id){
		$objeto = new modelo();
		$objeto->eliminarSalon($id);
		header("Location: principal.php?c=controlador&a=muestraSalones");

	}

	//Llamando método para buscar salones
	public function buscaSalon(){
		$buscar = $_POST['buscarSalon'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarSalon($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_salon.php";
	}


	/* --------------- MODELO Y VISTA DE USUARIOS ----------------- */

	//mostrando vista de docentes (html) creada en carpeta "vista", haciendo interactuar modelo con vista
	public function muestrausuarios(){
		$objeto = new modelo();
		$data["titulo"] = "Usuarios";
		$data["objeto"] = $objeto->getUsuarios();
		$data["pagina"] = $objeto->getPaginacionUsuarios();

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_usuarios.php";
	}

     //mostrando vista de agregar docentes
	public function nuevoUsuario(){
		$data["titulo"] = "Agregar Usuarios";
		require_once "vista/admin/agregarUsuarios.php";
	}

	//Pasando valores a método insertarDocente del modelo, para agregarlos en la vista de "agregarProveedor"
	public function guardarUsuario(){
		$tipo = $_POST['tipo_usuario'];
		$apodo = $_POST['apodo'];
		$pass = $_POST['pass'];

		$objeto = new modelo();
		$objeto->insertarUsuario($tipo,$apodo,$pass);

		$data["titulo"] = "Agregar Usuario";
			
	}

	//Mostrando vista para modificar proveedor
	public function editarUsuario($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Usuario";
		$data["objeto"] = $objeto->getUsuario($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarUsuarios.php";

	}

	//Llamándo método para actualizar proveedor
	public function actualizaUsuario(){
		$id = $_POST['id'];
		$tipo = $_POST['tipo_usuario'];
		$apodo = $_POST['apodo'];
		$pass = $_POST['pass'];

		$objeto = new modelo();
		$objeto->modificarUsuario($id,$tipo,$apodo,$pass);
	}

	//llamando función eliminar un proveedor
	public function borraUsuario($id){
		$objeto = new modelo();
		$objeto->eliminarUsuario($id);
		header("Location: principal.php?c=controlador&a=muestraUsuarios");

	}

	//Llamando método para buscar proveedor
	public function buscaUsuario(){
		$buscar = $_POST['buscarUsuario'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarUsuario($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_usuarios.php";
	}


	/* --------------- MODELO Y VISTA DE APARTADOS ----------------- */

	//mostrando vista de docentes (html) creada en carpeta "vista", haciendo interactuar modelo con vista
	public function muestraApartados(){
		$objeto = new modelo();
		$data["titulo"] = "Apartar Aulas";
		$data["objeto"] = $objeto->getApartados();
		$data["pagina"] = $objeto->getPaginacionApartados();
	
		//mandando información del modelo a la vista
		require_once "vista/admin/adm_apartados.php";
	}

     //mostrando vista de agregar apartado
	public function nuevoApartado(){
		$objeto = new modelo();
		$data["titulo"] = "Agregar Apartados";
		$data["objeto2"] = $objeto->llenaSalones();
		require_once "vista/admin/agregarApartados.php";
	}

	//Pasando valores a método insertarApartado del modelo, para agregarlos en la vista de "agregarApartado"
	public function guardarApartado(){
		$idDocente = $_POST['id_docente'];
		$nombreSalon = $_POST['nombre_salon'];
		$fecha = $_POST['fecha'];
		$inicio = $_POST['hora_inicio'];
		$fin = $_POST['hora_fin'];
		$nomDocente = $_POST['nombre_docente'];
		$apeDocente = $_POST['apellido_docente'];
		$motivo = $_POST['motivo'];
		$observ = $_POST['observaciones'];

		$objeto = new modelo();
		$objeto->insertarApartado($idDocente,$nombreSalon,$fecha,$inicio,$fin,$nomDocente,$apeDocente,$motivo,$observ);

		$data["titulo"] = "Agregar Apartado";
			
	}

	//Mostrando vista para modificar apartado
	public function editarApartado($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Apartado";
		$data["objeto"] = $objeto->getApartado($id); //llamando método que muestra un producto en el formulario
		$data["objeto2"] = $objeto->llenaSalones();
		require_once "vista/admin/modificarApartados.php";

	}

	//Llamándo método para actualizar proveedor
	public function actualizaApartado(){
		$id = $_POST['id'];
		$idSalon = $_POST['id_salon'];
		$idDocente = $_POST['id_docente'];
		$nombreSalon = $_POST['nombre_salon'];
		$fecha = $_POST['fecha'];
		$inicio = $_POST['hora_inicio'];
		$fin = $_POST['hora_fin'];
		$nomDocente = $_POST['nombre_docente'];
		$apeDocente = $_POST['apellido_docente'];
		$motivo = $_POST['motivo'];
		$observ = $_POST['observaciones'];

		$objeto = new modelo();
		$objeto->modificarApartado($id,$idSalon,$idDocente,$nombreSalon,$fecha,$inicio,$fin,$nomDocente,$apeDocente,$motivo,$observ);
	}

	//llamando función eliminar un proveedor
	public function borraApartado($id){
		$objeto = new modelo();
		$objeto->eliminarapartado($id);
		header("Location: principal.php?c=controlador&a=muestraApartados");

	}

	//Llamando método para buscar proveedor
	public function buscaApartado(){
		$buscar = $_POST['buscarApartado'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarApartado($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_apartados.php";
	}

	/* --------------- MODELO Y VISTA DE ASISTENCIAS (ADMIN) ----------------- */

	public function muestraAsistencias(){
		$objeto = new modelo();
		$data["titulo"] = "Asistencias";
		$data["objeto"] = $objeto->getAsistencias();
		$data["pagina"] = $objeto->getPaginacionAsistencias();

		//mandando información del modelo a la vista
		require_once "vista/admin/asistencias.php";
	}

	//Llamando método para buscar proveedor
	public function buscaAsistencia(){
		$buscar = $_POST['buscarAsistencia'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarAsistencia($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/asistencias.php";
	}

	/* --------------- MODELO Y VISTA DE ASISTENCIAS (DOCENTES) ----------------- */
 
	public function muestraRegistros(){ //Muestra el formulario inicio del docente
		$objeto = new modelo();
		$objeto2 = new modelo();
		$data["titulo"] = "Asistencias";
		$data["objeto"] = $objeto->llenaGrupos();
		$data["objeto2"] = $objeto2->llenaSalones();
		//mandando información del modelo a la vista
		require_once "vista/registro.php";
	}

	//Pasando valores a método insertarAsistencia del modelo, para agregarlos en la vista de "agregarAsistencia"
	public function guardarAsistencia(){ //docente
		$id = $_POST['id_docente'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$hora = $_POST['hora'];
		$tipo = $_POST['tipo'];
		$fecha = $_POST['fecha'];
		$grupo = $_POST['grupo'];
		$salon = $_POST['salon'];

		$objeto = new modelo();
		$objeto->insertarAsistencia($id,$nombre,$apellidos,$hora,$tipo,$fecha,$grupo,$salon);

		$data["titulo"] = "Agregar Asistencia";
			
	}

	public function muestraNombre($id){
		$objeto = new modelo();
		$objeto->getNombreDocente($id);
	}




	/* --------------- MODELO Y VISTA DE INCIDENCIAS ----------------- */

	public function muestraIncidencias(){ //Muestra el formulario inicio de la incidencia
		$objeto = new modelo();
		$data["titulo"] = "Incidencias";
		$data["objeto"] = $objeto->getIncidencias();
		$data["pagina"] = $objeto->getPaginacionIncidencias();
		//mandando información del modelo a la vista
		require_once "vista/admin/adm_incidencias.php";
	}


	//Mostrando vista para modificar incidencia
	public function editarIncicendia($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Incidencia";
		$data["objeto"] = $objeto->getIncidencia($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarIncidencia.php";

	}

	//Llamándo método para actualizar proveedor
	public function actualizaIncidencia(){
		$id = $_POST['id'];
		$noClases = $_POST['no_clases'];
		$noAsistio =  $_POST['no_asistio'];
		$salioAntes =  $_POST['salio_antes'];
		$cambioAula =  $_POST['cambio_aula'];
		$observaciones = $_POST['observaciones'];

		$objeto = new modelo();
		$objeto->modificarIncidencia($id,$noAsistio,$salioAntes,$cambioAula,$noClases,$observaciones);
	}

	//llamando función eliminar un proveedor
	public function borraIncidencia($id){
		$objeto = new modelo();
		$objeto->eliminarIncidencia($id);
		header("Location: principal.php?c=controlador&a=muestraIncidencias");

	}

	//Llamando método para buscar proveedor
	public function buscaIncidencia(){
		$buscar = $_POST['buscarIncidencia'];
		$productos = new modelo();
		$data["objeto"] = $productos->buscarIncidencia($buscar);

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_incidencias.php";
	}


	public function muestraReporte(){ //Muestra el formulario inicio de la incidencia
		$objeto = new modelo();
		$data["titulo"] = "Reporte de Incidencias";
		require_once "vista/admin/reporteIncidencia.php";
	}


	public function guardarIncidencia(){
		$nombreCompleto = $_POST['nombre'];
		$inicio = $_POST['hora_inicio'];
		$fin = $_POST['hora_fin'];
		$asistio = $_POST['no_asistio'];
		$antes = $_POST['salio_antes'];
		$aula = $_POST['cambio_aula'];
		$clase = $_POST['no_clases'];
		$obs = $_POST['observaciones'];

		if(isset($asistio) == '1'){
			$asistio = 1;
		}else{
			$asistio = 0;
		}

		if(isset($antes) == '1'){
			$antes = 1;
		}else{
			$antes = 0;
		}

		if(isset($asistio) == '1'){
			$asistio = 1;
		}else{
			$asistio = 0;
		}

		if(isset($aula) == '1'){
			$aula = 1;
		}else{
			$aula = 0;
		}

		if(isset($clase) == '1'){
			$clase = 1;
		}else if(!isset($clase) == '1'){
			$clase = 0;
		}


		$objeto = new modelo();
		$objeto->agregaIncidencia($nombreCompleto,$inicio,$fin,$asistio,$antes,$aula,$clase,$obs);

		$data["titulo"] = "Agregar Incidencia";
	}


	public function nuevaIncidencia(){
		$objeto = new modelo();
		$data["titulo"] = "Agregar Incidencia";
		require_once "vista/admin/agregarIncidencia.php";
	}

	public function borraAsistencia($id){
		$objeto = new modelo();
		$objeto->eliminarAsistencia($id);
		header("Location: principal.php?c=controlador&a=muestraAsistencias");

	}




}

?>