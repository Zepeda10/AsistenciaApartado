 <?php 

class modelo{

	private $db;
	private $objeto;

	public function __construct(){
		$this->db = Conectar::conexion();//almacenas la conexion 
		$this->objeto = array();
	}

	/* --------------- OPERACIONES CON DOCENTES ----------------- */

	//muestra todos los docentes
	public function getDocentes(){
		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraDocentes");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM empleados ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM empleados LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de docentes
	public function getPaginacionDocentes(){

			$filasPagina = 7;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraDocentes");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM empleados ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;


		}

	//Inserta un docente
	public function insertarDocente($nombre,$apellidos,$email,$telefono,$entrada,$salida){
		$sql = " INSERT INTO empleados (nombre, apellidos, email, telefono, hora_entrada, hora_salida) VALUES ('$nombre' , '$apellidos' , '$email' , '$telefono' , '$entrada' , '$salida' ) ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraDocentes");
			
	}

	//Modificar un docente
	public function modificarDocente($id,$nombre,$apellidos,$email,$telefono,$entrada,$salida){
		$sql = " UPDATE empleados SET nombre = '$nombre' , apellidos = '$apellidos' , email = '$email' , telefono = '$telefono' , hora_entrada = '$entrada' ,  hora_salida = '$salida'  WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraDocentes");
	}

	//mostrando un proveedor en la vista "modificarDocente", para actualizar los datos
	public function getDocente($id){
		$sql = " SELECT * FROM empleados WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Eliminar un docente
	public function eliminarDocente($id){
		$resultado = $this->db->query(" DELETE FROM empleados WHERE id = '$id' ");
	}

	//Busca un docente
	public function buscarDocente($buscar){
		$sql = " SELECT * FROM empleados WHERE id LIKE '%".$buscar."%' OR nombre LIKE UPPER('%".$buscar."%') OR apellidos LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}



	/* --------------- OPERACIONES CON GRUPOS ----------------- */

	//muestra todos los grupos
	public function getGrupos(){
		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraGrupos");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM grupos ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM grupos LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de asistencias
	public function getPaginacionGrupos(){

			$filasPagina = 10;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraGrupos");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM grupos ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;


		}



	public function modificarGrupo($id,$nombre){
		$sql = " UPDATE grupos SET nombre_grupo = '$nombre' WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraGrupos");
	}

	public function getGrupo($id){
		$sql = " SELECT * FROM grupos WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Inserta un grupos
	public function insertarGrupos($nombre){
		$sql = " INSERT INTO grupos (nombre_grupo) VALUES ('$nombre' ) ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraGrupos");
			
	}

	//Eliminar un grupo
	public function eliminarGrupo($id){
		$resultado = $this->db->query(" DELETE FROM grupos WHERE id = '$id' ");
	}

	//Busca un grupo
	public function buscarGrupo($buscar){
		$sql = " SELECT * FROM grupos WHERE id LIKE '%".$buscar."%' OR nombre_grupo LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}


	/* --------------- OPERACIONES CON SALONES ----------------- */

	//muestra todos los salones
	public function getSalones(){
		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraSalones");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM salones ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM salones LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de asistencias
	public function getPaginacionSalones(){

			$filasPagina = 7;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraSalones");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM salones ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;


		}


	public function modificarSalon($id,$nombre){
		$sql = " UPDATE salones SET nombre_salon = '$nombre' WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraSalones");
	}


	public function getSalon($id){
		$sql = " SELECT * FROM salones WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Inserta un grupos
	public function insertarSalones($nombre){
		$sql = " INSERT INTO salones (nombre_salon) VALUES ('$nombre' ) ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraSalones");
			
	}

	//Eliminar un grupo
	public function eliminarSalon($id){
		$resultado = $this->db->query(" DELETE FROM salones WHERE id = '$id' ");
	}

	//Busca un grupo
	public function buscarSalon($buscar){
		$sql = " SELECT * FROM salones WHERE id LIKE '%".$buscar."%' OR nombre_salon LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}


	/* --------------- OPERACIONES CON USUARIOS ----------------- */

	//muestra todos los docentes
	public function getUsuarios(){
		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraUsuarios");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM usuarios ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM usuarios LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de usuarios
	public function getPaginacionUsuarios(){

			$filasPagina = 7;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraUsuarios");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM usuarios ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;

		}

	//Inserta un docente
	public function insertarUsuario($tipo,$apodo,$pass){
		$sql = " INSERT INTO usuarios (tipo_usuario, apodo, pass) VALUES ('$tipo' , '$apodo' , '$pass') ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraUsuarios");
			
	}

	//Modificar un docente
	public function modificarUsuario($id,$tipo,$apodo,$pass){
		$sql = " UPDATE usuarios SET tipo_usuario = '$tipo' , apodo = '$apodo' , pass = '$pass' WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraUsuarios");
	}

	//mostrando un proveedor en la vista "modificarDocente", para actualizar los datos
	public function getUsuario($id){
		$sql = " SELECT * FROM usuarios WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Eliminar un docente
	public function eliminarUsuario($id){
		$resultado = $this->db->query(" DELETE FROM usuarios WHERE id = '$id' ");
	}

	//Busca un docente
	public function buscarUsuario($buscar){
		$sql = " SELECT * FROM usuarios WHERE id LIKE '%".$buscar."%' OR apodo LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}


	/* --------------- OPERACIONES CON APARTADOS ----------------- */

	//muestra todos los docentes
	public function getApartados(){

		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraApartados");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM apartados ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM apartados LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de apartados
	public function getPaginacionApartados(){

			$filasPagina = 7;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraApartados");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM apartados ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;


		}

	//Inserta un docente
	public function insertarApartado($idDocente,$nombreSalon,$fecha,$inicio,$fin,$nomDocente,$apeDocente,$motivo,$observ){
		$sql2 = $this->db->query(" SELECT id FROM salones WHERE nombre_salon = '$nombreSalon' ");
		$idSal = $sql2->fetch(PDO::FETCH_ASSOC);
		$idSalon = $idSal['id'];

		$sql = " INSERT INTO apartados (id_salon, id_docente, nombre_salon, fecha, hora_inicio, hora_fin, nombre_docente, apellido_docente, motivo, observaciones) VALUES ( '$idSalon' , '$idDocente' , '$nombreSalon' , '$fecha' , '$inicio' , '$fin' , '$nomDocente' , '$apeDocente' , '$motivo' , '$observ' ) ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraApartados");
			
	}

	//Modificar un docente
	public function modificarApartado($id,$idSalon,$idDocente,$nombreSalon,$fecha,$inicio,$fin,$nomDocente,$apeDocente,$motivo,$observ){
		$sql = " UPDATE apartados SET id_salon = '$idSalon' , id_docente = '$idDocente' , nombre_salon = '$nombreSalon' , fecha = '$fecha' , hora_inicio = '$inicio' , hora_fin = '$fin' ,  nombre_docente = '$nomDocente' , apellido_docente = '$apeDocente' , motivo = '$motivo' , observaciones = '$observ' WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraApartados");
	}

	//mostrando un proveedor en la vista "modificarDocente", para actualizar los datos
	public function getApartado($id){
		$sql = " SELECT * FROM apartados WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Eliminar un docente
	public function eliminarApartado($id){
		$resultado = $this->db->query(" DELETE FROM apartados WHERE id = '$id' ");
	}

	//Busca un docente
	public function buscarApartado($buscar){
		$sql = " SELECT * FROM apartados WHERE id LIKE '%".$buscar."%' OR nombre_salon LIKE UPPER('%".$buscar."%') OR nombre_docente LIKE UPPER('%".$buscar."%') OR apellido_docente LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}

	/* --------------- OPERACIONES CON ASISTENCIAS (ADMIN) ----------------- */


	//muestra todas las asistencias
	public function getAsistencias(){
		$filasPagina = 10;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraAsistencias");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM asistencia ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM asistencia LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de asistencias
	public function getPaginacionAsistencias(){

			$filasPagina = 10;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraAsistencias");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM asistencia ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;

		}


	//Busca asistencias
	public function buscarAsistencia($buscar){
		$sql = " SELECT * FROM asistencia WHERE id LIKE '%".$buscar."%' OR tipo LIKE UPPER('%".$buscar."%') OR nombre LIKE UPPER('%".$buscar."%') OR apellidos LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}



	/* --------------- OPERACIONES CON ASISTENCIAS (DOCENTES) ----------------- */
	//Inserta una asistencia
	public function insertarAsistencia($idDocente,$nombre,$apellidos,$hora,$tipo,$fecha,$grupo,$salon){
		$sql = " INSERT INTO asistencia (id_docente, nombre, apellidos, hora, tipo, fecha, grupo, salon) VALUES ('$idDocente' , '$nombre' , '$apellidos' , '$hora' , '$tipo' , '$fecha' , '$grupo' , '$salon' ) ";

		$resultado = $this->db->query($sql);

		$sql2 = " SELECT hora_entrada FROM empleados WHERE id = '$idDocente' LIMIT 1 ";
		$resultado2 = $this->db->query($sql2);//ejecutando la consulta con la conexión establecida

		$row = $resultado2->fetch(PDO::FETCH_ASSOC);

		//Conviertiendo hora de llegada establecida a segundos
		$string = implode(":", $row);
		$entrada = strtotime($string);

		$llega = strtotime($hora); //Hora en la que llegó el empleado a segundos

		$nombreCompleto = $nombre." ".$apellidos;


		if($llega > $entrada){
			$sql3 = "  INSERT INTO incidencias (nombre, hora_inicio, llego_tarde) VALUES ('$nombreCompleto' , '$hora' , 1) ";
			$resultado3 = $this->db->query($sql3);	
		}		
			
		header("Location: principal.php?c=controlador&a=muestraRegistros");
			
	}

	public function llenaGrupos(){
		$sql = " SELECT * FROM grupos ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
	}

	public function llenaSalones(){
		$sql = " SELECT * FROM salones ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
	}


	public function getNombreDocente($id){
		$sql = "SELECT nombre,apellidos FROM empleados WHERE id = '$id' LIMIT 1 ";
		$sql2 = $this->db->query(" SELECT COUNT(*) FROM asistencia WHERE id_docente = '$id' ");

		$datos = $this->db->query($sql)->fetch();//ejecutando la consulta con la conexión establecida

		$num_rows = $sql2->fetchColumn();

		$res['existe'] = false;
		$res['error'] = '';
		$res['datos'] = '';
		$res['tipo'] = '';

		$e = '';

		if($num_rows%2==0){
			 $e = 'Entrada';
		}else{
			$e = 'Salida';	 
		}

				
		if($datos){
			$res['datos'] = $datos;
			$res['existe'] = true;
			$res['tipo']= $e;
			
		} else{
			$res['error'] = 'No existe ese docente';
			$res['existe'] = false;
		}

		echo json_encode($res);
	}



	/* --------------- OPERACIONES CON INCIDENCIAS ----------------- */

	//muestra todos los docentes
	public function getIncidencias(){
		$filasPagina = 7;//registros mostrados por página

		if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1; 
				header("Location: principal.php?c=controlador&a=muestraIncidencias");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM incidencias ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

		//------------------------- Consulta para mostrar los resultados ---------------------------

			$sql_limite = " SELECT * FROM incidencias LIMIT $empezarDesde , $filasPagina ";

			$resultado = $this->db->query($sql_limite);//ejecutando la consulta con la conexión establecida

			while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
				$this->objeto[] = $row;//llenando array con valores de la consulta
			}

		return $this->objeto;
	}

	//Paginación de docentes
	public function getPaginacionIncidencias(){

			$filasPagina = 7;//registros mostrados por página

			if(isset($_GET['pagina'])){//si le pasamos el valor "pagina" de la url (si el usuario da click en la paginación)
				if($_GET['pagina']==1){
				$pagina=1;
				header("Location: principal.php?c=controlador&a=muestraIncidencias");
				}else{
					$pagina=$_GET['pagina'];//índice que indica página actual
				}
			}else{
				$pagina=1;//índice que indica página actual
			}

			$empezarDesde = ($pagina-1) * $filasPagina;

			$sql = " SELECT * FROM incidencias ";

			$resultado = $this->db->query($sql);

			$resultado->execute(array());

			$numFilas = $resultado->rowCount();//número de registos totales de la consulta

			//ceil — Redondear fracciones hacia arriba
			$totalPaginas = ceil($numFilas / $filasPagina);//calcula cuántas páginas serán en total para mostrar todos los registros

			$resultado->closeCursor();

			return $totalPaginas;


		}


	//Modificar un docente
	public function modificarIncidencia($id,$noAsistio,$salioAntes,$cambioAula,$noClases,$observaciones){
		$sql = " UPDATE incidencias SET no_asistio = '$no_asistio' , salio_antes = '$salioAntes' , cambio_aula = '$cambioAula' , no_clases = '$noClases' , observaciones = '$observaciones' WHERE id = '$id' ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraIncidencias");
	}

	//mostrando un proveedor en la vista "modificarDocente", para actualizar los datos
	public function getIncidencia($id){
		$sql = " SELECT * FROM incidencias WHERE id = '$id' LIMIT 1 ";
		$resultado = $this->db->query($sql);//ejecutando la consulta con la conexión establecida

		$row = $resultado->fetch(PDO::FETCH_ASSOC);
				
		return $row;

	}

	//Eliminar un docente
	public function eliminarIncidencia($id){
		$resultado = $this->db->query(" DELETE FROM incidencias WHERE id = '$id' ");
	}

	//Busca un docente
	public function buscarIncidencia($buscar){
		$sql = " SELECT * FROM incidencias WHERE id LIKE '%".$buscar."%' OR nombre LIKE UPPER('%".$buscar."%') ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}

		return $this->objeto;
	}


	public function agregaIncidencia($nombreCompleto,$inicio,$fin,$asistio,$antes,$aula,$clase,$obs){

		$sql3 = "  INSERT INTO incidencias (nombre,hora_inicio,hora_fin,no_asistio,salio_antes,cambio_aula,no_clases,observaciones) VALUES ('$nombreCompleto' , '$inicio' , '$fin' , '$asistio' , '$antes' , '$aula' , '$clase' , '$obs') ";
			$resultado3 = $this->db->query($sql3);

		header("Location: principal.php?c=controlador&a=muestraIncidencias");
	}





}



?>