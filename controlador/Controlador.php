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

		//mandando información del modelo a la vista
		require_once "vista/admin/adm_apartados.php";
	}

     //mostrando vista de agregar docentes
	public function nuevoApartado(){
		$data["titulo"] = "Agregar Apartados";
		require_once "vista/admin/agregarApartados.php";
	}

	//Pasando valores a método insertarDocente del modelo, para agregarlos en la vista de "agregarProveedor"
	public function guardarApartado(){
		$idSalon = $_POST['id_salon'];
		$idDocente = $_POST['id_docente'];
		$nombreSalon = $_POST['nombre_salon'];
		$inicio = $_POST['hora_inicio'];
		$fin = $_POST['hora_fin'];
		$nomDocente = $_POST['nombre_docente'];
		$apeDocente = $_POST['apellido_docente'];

		$objeto = new modelo();
		$objeto->insertarApartado($idSalon,$idDocente,$nombreSalon,$inicio,$fin,$nomDocente,$apeDocente);

		$data["titulo"] = "Agregar Apartado";
			
	}

	//Mostrando vista para modificar proveedor
	public function editarApartado($id){
		$objeto = new modelo();
		$data["id"] = $id;
		$data["titulo"] = "Modificar Apartado";
		$data["objeto"] = $objeto->getApartado($id); //llamando método que muestra un producto en el formulario
		require_once "vista/admin/modificarApartados.php";

	}

	//Llamándo método para actualizar proveedor
	public function actualizaApartado(){
		$id = $_POST['id'];
		$idSalon = $_POST['id_salon'];
		$idDocente = $_POST['id_docente'];
		$nombreSalon = $_POST['nombre_salon'];
		$inicio = $_POST['hora_inicio'];
		$fin = $_POST['hora_fin'];
		$nomDocente = $_POST['nombre_docente'];
		$apeDocente = $_POST['apellido_docente'];

		$objeto = new modelo();
		$objeto->modificarApartado($id,$idSalon,$idDocente,$nombreSalon,$inicio,$fin,$nomDocente,$apeDocente);
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
		$data["titulo"] = "Asistencias";

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




}

?>