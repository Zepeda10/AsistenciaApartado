<?php 

    if($_SESSION['tipo']!="Admin"){
        header("Location: index.php");
    }

?>

<?php 
	require_once("db/conexion.php");
	require('FPDF/fpdf.php');

	class PDF extends FPDF{
		// Cabecera de página
		function Header(){
		    // Logo
		    $this->Image('img/SEP.png',10,8,33);
		    $this->Image('img/SEMS.png',50,8,33);
		    $this->Image('img/DGETI.png',90,8,11,10);
		    // Arial bold 15
		    $this->SetFont('Arial','B',13);
		    // Movernos a la derecha
		    $this->Cell(120);
		    // Título
		    $this->Cell(30,10,'REPORTE DE INCIDENCIAS',0,0,'C');
		    $this->SetFont('Arial','',9);
		    $this->Cell(40,20);
		    $this->Cell(15,0,utf8_decode('Centro Bachillerato Tecnológico Industrial y de Servicios No. 107'));
		    $this->Cell(49,10);
		    $this->Cell(0,10,utf8_decode('"Ignacio Zaragoza"'));
		    $this->Ln(1);
		     $this->Cell(254,10);
		    $this->Cell(0,19,utf8_decode('C.C.T.20DCT005Q'));
		    // Salto de línea
		    $this->Ln(20);

			$this->SetFont('Arial','',10);

			$this->Cell(14,0,utf8_decode('Nombre del Prefecto:    _____________________________________'));
			$this->Cell(108,10);
			$this->Cell(0,0,utf8_decode('Turno:    ______________'));
			$this->Cell(-100,10);
			$this->Cell(0,0,utf8_decode('Fecha:    _______________________'));
			$this->Cell(-80,10);
			$this->SetFont('Arial','',7);
			$this->Cell(0,8,utf8_decode(' DD           MM            AAAA'));
			$this->SetFont('Arial','',10);
			$this->Ln(9);
		}

		// Pie de página
		function Footer(){
			$this->Image('img/tabla.PNG',158,163,130);
			$this->Image('img/firma.PNG',37,180,90);
			
		    // Posición: a 1,5 cm del final
		    $this->SetY(-10);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Número de página
		    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
		}
	}

	//-----consulta para mostrar datos----
	$db = Conectar::conexion();//almacenas la conexion
	$sql = " SELECT * FROM incidencias ";
	$resultado = $db->query($sql);

	$pdf = new PDF('L','mm','A4');
	$pdf->SetAutoPageBreak(true,50);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',10);


	//Array de cabecera de tabla
	$header = array('Id', 'Nombre', 'Hora Inicio', 'Hora fin', 'No asistió', 'Llegó tarde', 'Cambio de aula', 'No dio clases', 'Observaciones');

	// Anchuras de las columnas
    $w = array(10, 65, 25, 25, 25, 25, 28, 25, 49);

	// Cabeceras de tabla
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
    $pdf->Ln();

	while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
		$pdf->Cell(10, 10, $row['id'], 1, 0, 'C', 0);
		$pdf->Cell(65, 10, $row['nombre'], 1, 0, 'C', 0);
		$pdf->Cell(25, 10, $row['hora_inicio'], 1, 0, 'C', 0);
		$pdf->Cell(25, 10, $row['hora_fin'], 1, 0, 'C', 0);
		$pdf->Cell(25, 10, $row['no_asistio'], 1, 0, 'C', 0);
		$pdf->Cell(25, 10, $row['llego_tarde'], 1, 0, 'C', 0);
		$pdf->Cell(28, 10, $row['cambio_aula'], 1, 0, 'C', 0);
		$pdf->Cell(25, 10, $row['no_clases'], 1, 0, 'C', 0);
		$pdf->Cell(49, 10, $row['observaciones'], 1, 1, 'C', 0);
	}

	$pdf->output();
?>
