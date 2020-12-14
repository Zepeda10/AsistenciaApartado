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
		$sql = " SELECT * FROM empleados ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
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
		$sql = " SELECT * FROM grupos ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
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
		$sql = " SELECT * FROM salones ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
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
		$sql = " SELECT * FROM usuarios ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
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
		$sql = " SELECT * FROM apartados ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
	}

	//Inserta un docente
	public function insertarApartado($idSalon,$idDocente,$nombreSalon,$inicio,$fin,$nomDocente,$apeDocente){
		$sql = " INSERT INTO apartados (id_salon, id_docente, nombre_salon, hora_inicio, hora_fin, nombre_docente, apellido_docente) VALUES ( '$idSalon' , '$idDocente' , '$nombreSalon' , '$inicio' , '$fin' , '$nomDocente' , '$apeDocente' ) ";

		$resultado = $this->db->query($sql);		
			
		header("Location: principal.php?c=controlador&a=muestraApartados");
			
	}

	//Modificar un docente
	public function modificarApartado($id,$idSalon,$idDocente,$nombreSalon,$inicio,$fin,$nomDocente,$apeDocente){
		$sql = " UPDATE apartados SET id_salon = '$idSalon' , id_docente = '$idDocente' , nombre_salon = '$nombreSalon' , hora_inicio = '$inicio' , hora_fin = '$fin' ,  nombre_docente = '$nomDocente' , apellido_docente = '$apeDocente' WHERE id = '$id' ";

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
		$sql = " SELECT * FROM asistencia ";
		$resultado = $this->db->query($sql);

		while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
			$this->objeto[] = $row;//llenando array con valores de la consulta
		}
		return $this->objeto;
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
		$datos = $this->db->query($sql)->fetch();//ejecutando la consulta con la conexión establecida

		//$datos->fetch();

		$res['existe'] = false;
		$res['error'] = '';
		$res['datos'] = '';
				
		if($datos){
			$res['datos'] = $datos;
			$res['existe'] = true;
		} else{
			$res['error'] = 'No existe ese docente';
			$res['existe'] = false;
		}

		echo json_encode($res);
	}




}



?>