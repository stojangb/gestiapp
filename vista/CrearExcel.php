<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->getTabColor()->setRGB('FF0000');
$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath('extras/logo_elihel.jpg');
$drawing->setCoordinates('A1');
$drawing->setOffsetX(5);
$drawing->setRotation(0);
$drawing->setHeight(90);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(0);
$drawing->setWorksheet($spreadsheet->getActiveSheet());
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(2);
$sheet->setCellValue('B7', 'N° Certificado');
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(17);
$sheet->setCellValue('C7', 'Fecha');
$sheet->setCellValue('D7', 'Desinfección de');
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$sheet->setCellValue('E7', 'Matrícula');
$sheet->setCellValue('F7', 'Vuelta Falsa 50%');
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(23);
$sheet->setCellValue('G7', 'N° Camión');
$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
$spreadsheet->getActiveSheet()->getStyle('B12')
    ->getFill()->getStartColor()->setARGB('FFFF0000');
$spreadsheet->getActiveSheet()->getSheetView()->setZoomScale(115);
//Primero Recibimos los maritimos en un array, solo si existe el valor...
$numeroMarit = 0;
if (isset($_POST["maritimo"])) {
    //Le asignamos la variable maritimo
    $maritimo = $_POST["maritimo"];
    //Contamos el array
    $NumeroMaritimo = count($maritimo);
    //Dividimos el array en varios array de 5 valores
    $numeroMarit = $NumeroMaritimo / 6;
    $data = array();
    $e = array_chunk($maritimo, 6);
    foreach ($e as $row) {
        array_push($data, $row);
    }
    //Se crea el Array....
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $data,
            NULL,
            'B8'
        );
}
$numero = 8 + $numeroMarit;
$filaColumna = "B{$numero}";
$numeroTerr = 0;
if (isset($_POST["terrestre"])) {
    $terrestre = $_POST["terrestre"];
    //Contamos el array
    $NumeroTerrestre = count($terrestre);
    //Dividimos el array en varios array de 6 valores
    $numeroTerr = $NumeroTerrestre / 6;
    $data1 = array();
    $divisionTerrestre = array_chunk($terrestre, 6);
    foreach ($divisionTerrestre as $row1) {
        array_push($data1, $row1);
    }
    //Se crea el Array....
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $data1,
            NULL,
            $filaColumna
        );
}
//Solucion error referencias circulares al no ingresar ningun objeto
if($numeroMarit == 0 && $numeroTerr==0){
    $numeroTerr = 1;
}
$contadorTiposTrabajo = 0;
//Todos los tipos de trabajo
if (isset($_POST["todostipotrabajos"])) {
    $TiposDeTrabajo = $_POST["todostipotrabajos"];
    $contadorTiposTrabajo = count($TiposDeTrabajo);
    for ($i = 0; $i < $contadorTiposTrabajo; $i++) {
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8 + $i, 7, $TiposDeTrabajo[$i]);
    }
}
$contadorOtros = 0;
$comienzoBarraSuperiorOtros = 8 + $contadorTiposTrabajo;
//Todos los Otros
if (isset($_POST["otros"])) {
    $Otros = $_POST["otros"];
    $contadorOtros = count($Otros);
    for ($i = 0; $i < $contadorOtros; $i++) {
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($comienzoBarraSuperiorOtros + $i, 7, $Otros[$i]);
    }
}

$ultimoBordeNumero = $comienzoBarraSuperiorOtros + $contadorOtros;

//Obtenemos los valores de la barra Superior y los ponemos en un arreglo para posteriormente hacer una comparación.
for ($i = 0; $i < $ultimoBordeNumero; $i++) {
    $ValoresBarraSuperior[$i] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow($i + 8, 7)->getValue();
}
//Obtenemos los valores de la barra Lateral Certificado y los ponemos en un arreglo para posteriormente hacer una comparación.
$numTotalFilas = $numeroTerr + $numero;
for ($i = 0; $i < $numTotalFilas; $i++) {
    $ValoresBarraLateralCertificados[$i] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(2, $i + 8)->getValue();
}
//Obtenemos los valores de la barra Lateral Matriculas y los ponemos en un arreglo para posteriormente hacer una comparación.
for ($i = 0; $i < $numTotalFilas; $i++) {
    $ValoresBarraLateralMatriculas[$i] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $i + 8)->getValue();
}
//Comparamos los valores de la barra lateral con 
if (isset($_POST["OtrosDeMaritimos"])) {
    $OtrosDeMaritimos = $_POST["OtrosDeMaritimos"];
    //Cuento valores para ver cuantas veces iterar
    $NumArray = count($OtrosDeMaritimos);
    for ($a = 0; $a < $NumArray; $a++) {
        //Comparar y poner cantidad
        $BusquedaColumna = array_search($OtrosDeMaritimos[$a][2], $ValoresBarraSuperior, false);
        $BusquedaFilaCertificado = array_search($OtrosDeMaritimos[$a][0], $ValoresBarraLateralCertificados, false);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($BusquedaColumna + 8, $BusquedaFilaCertificado + 8, $OtrosDeMaritimos[$a][3]);
    }
}
//Comparamos los valores de la barra lateral con 
if (isset($_POST["OtrosDeTerrestre"])) {
    $OtrosDeTerrestre = $_POST["OtrosDeTerrestre"];
    //Cuento valores para ver cuantas veces iterar
    $NumArray2 = count($OtrosDeTerrestre);
    for ($a = 0; $a < $NumArray2; $a++) {
        //Comparar y poner cantidad
        $BusquedaColumna = array_search($OtrosDeTerrestre[$a][2], $ValoresBarraSuperior, false);
        $BusquedaFilaCertificado = array_search($OtrosDeTerrestre[$a][0], $ValoresBarraLateralCertificados, false);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($BusquedaColumna + 8, $BusquedaFilaCertificado + 8, $OtrosDeTerrestre[$a][3]);
    }
}
//Comparamos los valores de la barra lateral (Certificados) para ingresar los tipos de trabajo correspondientes.
if (isset($_POST["TiposDeTrabajoMaritYTerre"])) {
    $TiposDeTrabajoMaritYTerre = $_POST["TiposDeTrabajoMaritYTerre"];
    //Cuento valores para ver cuantas veces iterar
    $ArraycertifTipoTrab = count($TiposDeTrabajoMaritYTerre);
    for ($a = 0; $a < $ArraycertifTipoTrab; $a++) {
        //Comparar y poner tipos de trabajo
        $BusquedaColumna = array_search($TiposDeTrabajoMaritYTerre[$a][1], $ValoresBarraSuperior, false);
        $BusquedaFilaCertificado = array_search($TiposDeTrabajoMaritYTerre[$a][0], $ValoresBarraLateralCertificados, false);
        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($BusquedaColumna + 8, $BusquedaFilaCertificado + 8, 1);
    }
}
//Parte inferior del EXCEL, es un cotador de Todos los servicios...
//Obtener última fila 
$totalFilasDefinitivo = $numTotalFilas;
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $totalFilasDefinitivo, 'Total: ');
//FIN
//Bordes "parte de 0"
$letras = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
$ultimoBorde = $letras[$ultimoBordeNumero - 2] . 7;
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
            'color' => ['argb' => '00000000'],
        ],
    ],
];
$finColorBorde = $letras[$ultimoBordeNumero - 2] . $numTotalFilas;
$arrayColorBorde = 'B7:' . $finColorBorde;
$sheet->getStyle($arrayColorBorde)->applyFromArray($styleArray);
//Bordes FIN
$finBarraSuperior = $letras[$ultimoBordeNumero - 2] . 7;
$BarraSuperior = 'B7:' . $finBarraSuperior;
$InicioBarraInferior = 'E' . $numTotalFilas;
$finBarraInferior = $letras[$ultimoBordeNumero - 2] . $numTotalFilas;
$BarraInferior = $InicioBarraInferior . ':' . $finBarraInferior;
//Suma Totales Barra inferior
//Vuelta Falsa (Siempre va a ser en la F) y la suma siempre va a empezar en F8
$CeldaSumaVueltaFalsa = 'F' . $totalFilasDefinitivo;
$totalFilasDefinitivoMenosUno = $totalFilasDefinitivo - 1;
$sumaFinVueltaFalsa = 'F' . $totalFilasDefinitivoMenosUno;
$UnionSumaVueltaFalsa = '=SUM(F8:' . $sumaFinVueltaFalsa . ')';
$sheet->setCellValue($CeldaSumaVueltaFalsa, $UnionSumaVueltaFalsa);
//Camiones (Siempre va a ser en la G) y la suma siempre va a empezar en G8
$CeldaSumaCamiones = 'G' . $totalFilasDefinitivo;
$totalFilasDefinitivoMenosUno = $totalFilasDefinitivo - 1;
$sumaFinCamiones = 'G' . $totalFilasDefinitivoMenosUno;
$UnionSumaCamiones = '=SUM(G8:' . $sumaFinCamiones . ')';
$sheet->setCellValue($CeldaSumaCamiones, $UnionSumaCamiones);
//Después de camión hay valores aleatorios...
//Termina en  Totalfilasdefinitivo = cantidad de renglones....
for ($i = 8; $i < $ultimoBordeNumero; $i++) {
    //Inicio suma
    $letra = $letras[$i - 1];
    $ultimasuma = $totalFilasDefinitivo - 1;
    //fin suma
    $UnionSumaValores = '=SUM(' . $letra . 8 . ':' . $letra . $ultimasuma . ')';
    $Celda = $letras[$i - 1] . $totalFilasDefinitivo;
    $sheet->setCellValue($Celda, $UnionSumaValores);
}
$ultimoBordeNumeroMenosUno = $ultimoBordeNumero - 1;
$ultimoBordeNumeroMenosDos = $ultimoBordeNumero - 2;
$totalFilasDefinitivoMenosUno = $totalFilasDefinitivo - 1;
$totalFilasDefinitivoMasUno = $totalFilasDefinitivo + 1;
//Sumando las sumas de todos los valores
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero - 2, $totalFilasDefinitivoMasUno, 'Total Servicios: ');
$UnionSumaValoresTotales = '=SUM(' . $letras[5] . $totalFilasDefinitivo . ':' . $letras[$ultimoBordeNumeroMenosDos] . $totalFilasDefinitivo . ')';
$Celda1 = $letras[$ultimoBordeNumeroMenosDos] . $totalFilasDefinitivoMasUno;
$sheet->setCellValue($Celda1, $UnionSumaValoresTotales);
//Obteniendo letra: 
$letraBarraInferior2 = $letras[$ultimoBordeNumero - 3];
$letra2BarraInferior2 = $letras[$ultimoBordeNumero - 2];
//Obteniendo numeros: 
$totalFilasDefinitivoMas2 = $totalFilasDefinitivoMasUno + 1;
$BarraInferior2 = $letraBarraInferior2 . $totalFilasDefinitivoMasUno . ':' . $letra2BarraInferior2 . $totalFilasDefinitivoMasUno;
//Estilos barra inferior 2
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior2)
    ->getFill()->getStartColor()->setARGB('#CCFFFF');
//Estilos barra inferior 2 FIN
//Estilos barra inferior
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle($BarraInferior)
    ->getFill()->getStartColor()->setARGB('#CCFFFF');
//Estilos barra inferior FIN
//Estilos barra superior
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperior)
    ->getFill()->getStartColor()->setARGB('#CCFFFF');
//Estilos barra superior FIN
//Aquí ya teniendo todos los datos anteriores empieza el Resumen del cobro!
//Texto resumen cobro
$TextoResumenCobro = $letras[$ultimoBordeNumero + 3] . '4';
$letraTextoProductos = $letras[$ultimoBordeNumero];
$TextoProductos = $letras[$ultimoBordeNumero] . '7';
$sheet->setCellValue($TextoResumenCobro, 'RESUMEN COBRO');
$sheet->setCellValue($TextoProductos, 'Productos:');
$ValorFechaInicio = $letras[$ultimoBordeNumero] . '1';
$ValorFechaFin = $letras[$ultimoBordeNumero] . '2';
$sheet->setCellValue($ValorFechaInicio, 'Fecha Inicio:');
$sheet->setCellValue($ValorFechaFin, 'Fecha Fin:');
if (isset($_POST["fechaInicio"])) {
    $TextoFechaInicio = $letras[$ultimoBordeNumero + 1] . '1';
    $fechaInicio = $_POST["fechaInicio"];
    $sheet->setCellValue($TextoFechaInicio, $fechaInicio);
    $spreadsheet->getActiveSheet()->getColumnDimension($letras[$ultimoBordeNumero + 1])->setWidth(7);
}
if (isset($_POST["fechaTermino"])) {
    $TextoFechaFin = $letras[$ultimoBordeNumero + 1] . '2';
    $fechaTermino = $_POST["fechaTermino"];
    $sheet->setCellValue($TextoFechaFin, $fechaTermino);
}
$nombreCliente = "Nombre Cliente";
if (isset($_POST["nombreCliente"])) {
    $TextoCliente = $letras[$ultimoBordeNumero + 5] . '1';
    $nombreCliente = $_POST["nombreCliente"];
    $sheet->setCellValue($TextoCliente, $nombreCliente);
}
//Obtener todas las barcazas y camiones cuando la vuelta falsa = 0;
//Siempre vuelta falsa = F y comienza en 8...
//Obtener valor de la celda y si es 0 obtener nombre y patente 
$NombreParaResumenCobro = [];
$NombreParaResumenCobroVueltaFalsa = [];
$PatenteParaResumenCobro = [];
$PatenteParaResumenCobroVueltaFalsa = [];
$totalFilasDefinitivoMenosUno = $totalFilasDefinitivo - 1;
$totalFilasDefinitivoMenosDos = $totalFilasDefinitivo - 2;
$contadorVueltaFalsaNegativo  = 0;
$contadorVueltaFalsaPositivo  = 0;
for ($i = 6; $i < $totalFilasDefinitivoMenosDos; $i++) {
    $IMenosSeis = $i - 6;
    $ValoresMaritimoYTerrestre[$IMenosSeis] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(6, $i + 2)->getValue();
    //Reviso si es 0 o no para saber si es vuelta falsa o no...
    if ($ValoresMaritimoYTerrestre[$IMenosSeis] == 0) {
        //No es vuelta falsa
        //Obtengo nombre y patente 
        $NombreParaResumenCobro[$contadorVueltaFalsaNegativo] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $i + 2)->getValue();
        $PatenteParaResumenCobro[$contadorVueltaFalsaNegativo] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $i + 2)->getValue();
        $contadorVueltaFalsaNegativo = $contadorVueltaFalsaNegativo + 1;
    }
    if ($ValoresMaritimoYTerrestre[$IMenosSeis] == 1) {
        //Es vuelta falsa
        //Obtengo nombre y patente 
        $NombreParaResumenCobroVueltaFalsa[$contadorVueltaFalsaPositivo] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(4, $i + 2)->getValue();
        $PatenteParaResumenCobroVueltaFalsa[$contadorVueltaFalsaPositivo] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow(5, $i + 2)->getValue();
        $contadorVueltaFalsaPositivo = $contadorVueltaFalsaPositivo + 1;
    }
}
//Borramos Valores duplicados (Matrículas) de ambos array y creamos array nuevo...
//Necesito obtener los valores duplicados...
$PosicionValoresDuplicados = array_diff($PatenteParaResumenCobro, array_diff(array_unique($PatenteParaResumenCobro), array_diff_assoc($PatenteParaResumenCobro, array_unique($PatenteParaResumenCobro))));
$PosicionValoresDuplicadosVueltaFalsa = array_diff($PatenteParaResumenCobroVueltaFalsa, array_diff(array_unique($PatenteParaResumenCobroVueltaFalsa), array_diff_assoc($PatenteParaResumenCobroVueltaFalsa, array_unique($PatenteParaResumenCobroVueltaFalsa))));
$ContadorMatriculasABorrar = 0;
$ContadorMatriculasABorrarVueltaFalsa = 0;
foreach (array_unique($PosicionValoresDuplicadosVueltaFalsa) as $valorVueltaFalsa) {
    $MatriculasduplicadasABorrarVueltaFalsa[$ContadorMatriculasABorrarVueltaFalsa] = implode(', ', array_keys($PosicionValoresDuplicadosVueltaFalsa, $valorVueltaFalsa));
    $ContadorMatriculasABorrarVueltaFalsa = $ContadorMatriculasABorrarVueltaFalsa + 1;
}
foreach (array_unique($PosicionValoresDuplicados) as $valor) {
    $MatriculasduplicadasABorrar[$ContadorMatriculasABorrar] = implode(', ', array_keys($PosicionValoresDuplicados, $valor));
    $ContadorMatriculasABorrar = $ContadorMatriculasABorrar + 1;
}
//Defino un array
$arrayASerBorradoConComas = [];
$arrayASerBorradoConComas2 = [];
$ContadorBorrarComas = 0;
$arrayASerBorradoConComasVueltaFalsa = [];
$arrayASerBorradoConComas2VueltaFalsa = [];
$ContadorBorrarComasVueltaFalsa = 0;
// Posiciones a borrar Con comas VueltaFalsa
for ($i = 0; $i < $ContadorMatriculasABorrarVueltaFalsa; $i++) {
    //Esto da atributos clave/valor donde el primer atributo no debe ser borrado, solo obtener el resto
    //Cadenas con todos los indices a borrar separados por comas...
    $ValoresABorrarMatriculasVueltaFalsa[$i] = substr($MatriculasduplicadasABorrarVueltaFalsa[$i], 2);
    //Reviso si hay comas... y agrego a un array...
    if (strpos($ValoresABorrarMatriculasVueltaFalsa[$i], ',') !== false) {
        // $arrayASerBorradoConComas[$ContadorBorrarComas] = explode(",", $ValoresABorrarMatriculas[$i]);
        $arrayASerBorradoConComasVueltaFalsa = explode(",", $ValoresABorrarMatriculasVueltaFalsa[$i]);
        $arrayASerBorradoConComas2VueltaFalsa = array_merge($arrayASerBorradoConComasVueltaFalsa, $arrayASerBorradoConComas2VueltaFalsa);
        $ContadorBorrarComasVueltaFalsa = $ContadorBorrarComasVueltaFalsa + 1;
    }
}
// Posiciones a borrar Con comas
for ($i = 0; $i < $ContadorMatriculasABorrar; $i++) {
    //Esto da atributos clave/valor donde el primer atributo no debe ser borrado, solo obtener el resto
    //Cadenas con todos los indices a borrar separados por comas...
    $ValoresABorrarMatriculas[$i] = substr($MatriculasduplicadasABorrar[$i], 2);
    //Reviso si hay comas... y agrego a un array...
    if (strpos($ValoresABorrarMatriculas[$i], ',') !== false) {
        $arrayASerBorradoConComas = explode(",", $ValoresABorrarMatriculas[$i]);
        $arrayASerBorradoConComas2 = array_merge($arrayASerBorradoConComas, $arrayASerBorradoConComas2);
        $ContadorBorrarComas = $ContadorBorrarComas + 1;
    }
}
//Juntar valores de arrays...
$MatriculasABorrarConYSinComas = [];
$MatriculasABorrarConYSinComasVueltaFalsa = [];
$ConteoArrayASerBorradoConComas2 = count($arrayASerBorradoConComas2);
$ConteoArrayASerBorradoConComas2VueltaFalsa = count($arrayASerBorradoConComas2VueltaFalsa);

for ($i = 0; $i < $ConteoArrayASerBorradoConComas2; $i++) {
    array_push($MatriculasABorrarConYSinComas, $arrayASerBorradoConComas2[$i]);
}
for ($i = 0; $i < $ConteoArrayASerBorradoConComas2VueltaFalsa; $i++) {
    array_push($MatriculasABorrarConYSinComasVueltaFalsa, $arrayASerBorradoConComas2VueltaFalsa[$i]);
}

$BorrarMatriculas = []; 
$BorrarMatriculasVueltaFalsa = []; 

$ContadorBorrarSinComas = 0;
$ContadorBorrarSinComasVueltaFalsa = 0;
// Posiciones a borrar Sin comas Vuelta Falsa
for ($i = 0; $i < $ContadorMatriculasABorrarVueltaFalsa; $i++) {
    //Esto da atributos clave/valor donde el primer atributo no debe ser borrado, solo obtener el resto
    //Cadenas con todos los indices a borrar separados por comas...
    $ValoresABorrarMatriculasVueltaFalsa[$i] = substr($MatriculasduplicadasABorrarVueltaFalsa[$i], 2);
    //Reviso si hay comas... y agrego a un array...
    if (strpos($ValoresABorrarMatriculasVueltaFalsa[$i], ',') !== false) {
    } else {
        array_push($BorrarMatriculasVueltaFalsa, $MatriculasduplicadasABorrarVueltaFalsa[$i][$i]);
        $ContadorBorrarSinComasVueltaFalsa = $ContadorBorrarSinComasVueltaFalsa + 1;
    }
    //Separo las comas y las agrego a array separado
    //Imprimo a ver que me devuelve 
}
for ($i = 0; $i < $ContadorMatriculasABorrar; $i++) {
    //Esto da atributos clave/valor donde el primer atributo no debe ser borrado, solo obtener el resto
    //Cadenas con todos los indices a borrar separados por comas...
    $ValoresABorrarMatriculas[$i] = substr($MatriculasduplicadasABorrar[$i], 2);
    //Reviso si hay comas... y agrego a un array...
    if (strpos($ValoresABorrarMatriculas[$i], ',') !== false) {
    } else {
        array_push($BorrarMatriculas, $MatriculasduplicadasABorrar[$i]);
        $ContadorBorrarSinComas = $ContadorBorrarSinComas + 1;
    }
    //Separo las comas y las agrego a array separado
}
//Vuelta Falsa
for ($i = 0; $i < $ContadorBorrarSinComasVueltaFalsa; $i++) {
    array_push($MatriculasABorrarConYSinComasVueltaFalsa, $BorrarMatriculasVueltaFalsa[$i]);
}
for ($i = 0; $i < $ContadorBorrarSinComas; $i++) {
    array_push($MatriculasABorrarConYSinComas, $BorrarMatriculas[$i]);
}
//Eliminamos elementos vacios de array que luego se transforman en 0 y dan problemas

foreach($MatriculasABorrarConYSinComasVueltaFalsa as $key => $link) 
{ 
    if($link === '') 
    { 
        unset($MatriculasABorrarConYSinComasVueltaFalsa[$key]); 
    } 
    if($link === ' ') 
    { 
        unset($MatriculasABorrarConYSinComasVueltaFalsa[$key]); 
    } 
    if($link === '  ') 
    { 
        unset($MatriculasABorrarConYSinComasVueltaFalsa[$key]); 
    } 
} 

foreach($MatriculasABorrarConYSinComas as $key => $link) 
{ 
    if($link === '') 
    { 
        unset($MatriculasABorrarConYSinComas[$key]); 
    } 
    if($link === ' ') 
    { 
        unset($MatriculasABorrarConYSinComas[$key]); 
    } 
    if($link === '  ') 
    { 
        unset($MatriculasABorrarConYSinComas[$key]); 
    } 
} 


//Eliminamos elementos vacios de array que luego se transforman en 0 y dan problemas FIN
rsort($MatriculasABorrarConYSinComas);
$ConteoDeMatriculasABorrarConYSinComas = count($MatriculasABorrarConYSinComas);
rsort($MatriculasABorrarConYSinComasVueltaFalsa);
$ConteoDeMatriculasABorrarConYSinComasVueltaFalsa = count($MatriculasABorrarConYSinComasVueltaFalsa);
// VueltaFalsa
for ($i = 0; $i < $ConteoDeMatriculasABorrarConYSinComasVueltaFalsa; $i++) {
    //Estos Valores se eliminan
    $variable2 = intval($MatriculasABorrarConYSinComasVueltaFalsa[$i]);
    unset($NombreParaResumenCobroVueltaFalsa[$variable2]);
    unset($PatenteParaResumenCobroVueltaFalsa[$variable2]);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 2, 150 + $i, $MatriculasABorrarConYSinComasVueltaFalsa[$i]);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 3, 150 + $i, $variable2);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 4, 150 + $i, $ConteoDeMatriculasABorrarConYSinComasVueltaFalsa);
}

$NombreParaResumenCobro1VueltaFalsa = array_values($NombreParaResumenCobroVueltaFalsa);
$PatenteParaResumenCobro1VueltaFalsa = array_values($PatenteParaResumenCobroVueltaFalsa);
for ($i = 0; $i < $ConteoDeMatriculasABorrarConYSinComas; $i++) {
    //Estos Valores se eliminan
    $variable1 = intval($MatriculasABorrarConYSinComas[$i]);
    unset($NombreParaResumenCobro[$variable1]);
    unset($PatenteParaResumenCobro[$variable1]);

}
/* $cont = $ContadorBorrarComas + $ContadorBorrarSinComas;

$sheet->setCellValue('U8',$cont);
 */
$NombreParaResumenCobro1 = array_values($NombreParaResumenCobro);
$PatenteParaResumenCobro1 = array_values($PatenteParaResumenCobro);
//Imprimiendo nombres y patentes restantes...
//$NumeroPatentesRestantes = $contadorVueltaFalsaNegativo - $ConteoDeMatriculasABorrarConYSinComas;
$NumeroPatentesRestantes = count($PatenteParaResumenCobro1);
for ($i = 0; $i < $NumeroPatentesRestantes; $i++) {
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 1, 8 + $i, $NombreParaResumenCobro1[$i]);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 2, 8 + $i, $PatenteParaResumenCobro1[$i]);
}
 
/* $sheet->setCellValue('U8', $NombreParaResumenCobro[1]);*/


$VueltaFalsaNegativaExtremoInferior = 8 + $NumeroPatentesRestantes;
//Vueltas falsas
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 1, $VueltaFalsaNegativaExtremoInferior, 'Vueltas Falsas: ');
//Listado de todas las vueltas falsas
//$NumeroPatentesRestantesVueltaFalsa = $contadorVueltaFalsaPositivo - $ConteoDeMatriculasABorrarConYSinComasVueltaFalsa;
$NumeroPatentesRestantesVueltaFalsa = count($PatenteParaResumenCobro1VueltaFalsa);
//Aquí hay que ordenar, ya no se imprimen todas las vueltas falsas, sino que se agrupan.

for ($i = 0; $i < $NumeroPatentesRestantesVueltaFalsa; $i++) {
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 1, $VueltaFalsaNegativaExtremoInferior + $i + 1, $NombreParaResumenCobro1VueltaFalsa[$i]);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 2, $VueltaFalsaNegativaExtremoInferior + $i + 1, $PatenteParaResumenCobro1VueltaFalsa[$i]);
}
//Listado de objetos
$InicioObjetos = $VueltaFalsaNegativaExtremoInferior + 1 + $NumeroPatentesRestantesVueltaFalsa;
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 1, $InicioObjetos, 'Objetos: ');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 3, $InicioObjetos, 'N°');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 4, $InicioObjetos, 'Valor');
//Imprimir Objetos
for ($i = 0; $i < $contadorOtros; $i++) {
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 1, $InicioObjetos + 1 + $i, $Otros[$i]);
}
//Obteniendo cantidades
//Tengo el N° De cantidades(Por el número de objetos).
//$contadorOtros
//Comienzo la búsqueda en: $comienzoBarraSuperiorOtros y termino en $comienzoBarraSuperiorOtros + $contadorOtros
//Obtener cantidades por columna y fila
for ($i = 0; $i < $contadorOtros; $i++) {
    $ValoresCantidadesBarraInferior[$i] = $spreadsheet->getActiveSheet()->getCellByColumnAndRow($comienzoBarraSuperiorOtros + $i, $totalFilasDefinitivo)->getValue();
}
//Imprimir Cantidades
for ($i = 0; $i < $contadorOtros; $i++) {
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 3, $InicioObjetos + 1 + $i, $ValoresCantidadesBarraInferior[$i]);
}
//Imprimir tipos de trabajo Vuelta Falsa Negativo
$L = 0;
for ($i = 0; $i < $contadorTiposTrabajo; $i++) {
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 3 + $L, 6, $TiposDeTrabajo[$i]);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 4 + $L, 7, "Valor");
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($ultimoBordeNumero + 3 + $L, 7, "N°");
    $spreadsheet->getActiveSheet()->getColumnDimension($letras[$ultimoBordeNumero + 2 + $L])->setWidth(4);
    $spreadsheet->getActiveSheet()->getColumnDimension($letras[$ultimoBordeNumero + 3 + $L])->setWidth(7);
    //Necesito obtener la posicion en que El tipo de trabajo fue Agregado en el excel.
    //Primera suma desde anterior 2 lineas hasta mismo 8 + $i diferente 7....
    for ($a = 0; $a < $NumeroPatentesRestantes; $a++) {
        //Cambio de planes uso de sumifs $sheet->setCellValue('G30', '=SUMIFS(H8:H21,E8:E21,"AAA")');
        //Primero me posiciono..
        $LetraInicioN = $letras[$ultimoBordeNumero + 2 + $L];
        $FilaInicioN = 8 + $a;
        $PosicionInicioN = $LetraInicioN . $FilaInicioN;
        //Ultima fila a considerar
        $letraMatriculaASerComparada = $letras[$ultimoBordeNumero + 1];
        $filaMatriculaAComparar = 8 + $a;
        $PosicionMatriculaAComparar = $letraMatriculaASerComparada . $filaMatriculaAComparar;
        //La Letra es la misma
        $letraDePosicionDeTrabajoASerSumada = $letras[7 + $i];
        $PosicionTipoDeTrabajoASerSumado = $letraDePosicionDeTrabajoASerSumada . '8:' . $letraDePosicionDeTrabajoASerSumada . $totalFilasDefinitivoMenosUno;
        $SUMIFS = '=SUMIFS(' . $PosicionTipoDeTrabajoASerSumado . ',F8:F' . $totalFilasDefinitivoMenosUno . ',"0",' . 'E8:E' . $totalFilasDefinitivoMenosUno . ',"="&' . $PosicionMatriculaAComparar . ')';
        $sheet->setCellValue($PosicionInicioN, $SUMIFS);
    }
    $L = $L + 2;
}
//Imprimir tipos de trabajo Vuelta Falsa Positivo
$L = 0;
for ($i = 0; $i < $contadorTiposTrabajo; $i++) {
    //Necesito obtener la posicion en que El tipo de trabajo fue Agregado en el excel.
    //Primera suma desde anterior 2 lineas hasta mismo 8 + $i diferente 7....
    for ($a = 0; $a < $NumeroPatentesRestantesVueltaFalsa; $a++) {
        //Cambio de planes uso de sumifs $sheet->setCellValue('G30', '=SUMIFS(H8:H21,E8:E21,"AAA")');
        //Primero me posiciono..
        $LetraInicioNVueltaFalsa = $letras[$ultimoBordeNumero + 2 + $L];
        $FilaInicioNVueltaFalsa  = 9 + $a + $NumeroPatentesRestantes;
        $PosicionInicioNVueltaFalsa  = $LetraInicioNVueltaFalsa  . $FilaInicioNVueltaFalsa;
        //Lo que voy a sumar  // Filas_Criterio, criterio...
        //Ultima fila a considerar
        //$sheet->setCellValue('G21', "aa");
        $letraMatriculaASerComparadaVueltaFalsa  = $letras[$ultimoBordeNumero + 1];
        $filaMatriculaACompararVueltaFalsa  = 9 + $a + $NumeroPatentesRestantes;
        $PosicionMatriculaACompararVueltaFalsa  = $letraMatriculaASerComparadaVueltaFalsa  . $filaMatriculaACompararVueltaFalsa;
        //Vuelta falsa lista, Patente Y Comparacion Lista.
        //Falta Ver Lugar de Suma... El lugar depende de lo que se tenga por ejemplo si se esta sanitizando...
        //La Letra es la misma
        $letraDePosicionDeTrabajoASerSumadaVueltaFalsa  = $letras[7 + $i];
        $PosicionTipoDeTrabajoASerSumadoVueltaFalsa  = $letraDePosicionDeTrabajoASerSumadaVueltaFalsa . '8:' . $letraDePosicionDeTrabajoASerSumadaVueltaFalsa . $totalFilasDefinitivoMenosUno;
        $SUMIFSVueltaFalsa = '=SUMIFS(' . $PosicionTipoDeTrabajoASerSumadoVueltaFalsa . ',F8:F' . $totalFilasDefinitivoMenosUno . ',"1",' . 'E8:E' . $totalFilasDefinitivoMenosUno . ',"="&' . $PosicionMatriculaACompararVueltaFalsa . ')';
        $sheet->setCellValue($PosicionInicioNVueltaFalsa, $SUMIFSVueltaFalsa);
    }
    $L = $L + 2;
}
//Creando Columna falsa para solucionar problema de 0 tipos de trabajo 
if($contadorTiposTrabajo==0){
    $L = 2;
}
//Estilos del Cobro Celdas y Barra..
//Letra barra superior resumen cobro: Siempre 7 y Ultimo borde $ultimoBordeNumero
//Final = desde ultimo borde hasta. total $letras[$ultimoBordeNumero + 2 + $L];
$letraBarraSuperiorResumen = $letras[$ultimoBordeNumero];
$letraFinBarraSuperiorResumen = $letras[$ultimoBordeNumero + 2 + $L];
$BarraSuperiorResumenCobro = $letraBarraSuperiorResumen . 7 . ':' . $letraFinBarraSuperiorResumen . 7;
//Estilos barra Superior resumen cobro
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getFill()->getStartColor()->setARGB('#CCFFFF');
//Estilos Barra Superior resumen cobro FIN
//APlicando Bordes
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
            'color' => ['argb' => '00000000'],
        ],
    ],
];
$InicioColorBorde = $letras[$ultimoBordeNumero] . 6;
$FinObjetos =  $InicioObjetos + $contadorOtros + 1;
$finColorBorde = $letras[$ultimoBordeNumero + 2 + $L] . $FinObjetos;
$arrayColorBorde = $InicioColorBorde . ':' . $finColorBorde;
$sheet->getStyle($arrayColorBorde)->applyFromArray($styleArray);
//Diferenciar Objetos
$styleArray2 = [
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
        ],
    ],
];
$FinObjetos2 =  $InicioObjetos;
$InicioColorBorde2 = $letras[$ultimoBordeNumero] . $FinObjetos2;
$finColorBorde2 = $letras[$ultimoBordeNumero + 2 + $L] . $FinObjetos2;
$arrayColorBorde2 = $InicioColorBorde2 . ':' . $finColorBorde2;
$sheet->getStyle($arrayColorBorde2)->applyFromArray($styleArray2);
//APlicando Bordes FIN
//Borde Vueltas Falsas 
$columnaInicioVF =  $letras[$ultimoBordeNumero];
$columnaFinVF =  $letras[$ultimoBordeNumero + 2 + $L];
$filaInicioBordeVF = $VueltaFalsaNegativaExtremoInferior;
$InicioColorBordeVueltaFalsa = $columnaInicioVF . $filaInicioBordeVF;
$finColorBordeVueltaFalsa = $columnaFinVF . $filaInicioBordeVF;
$arrayColor = $InicioColorBordeVueltaFalsa . ':' . $finColorBordeVueltaFalsa;
$sheet->getStyle($arrayColor)->applyFromArray($styleArray2);
$richText = new \PhpOffice\PhpSpreadsheet\RichText\RichText();
$payable = $richText->createTextRun('Resumen Cobro');
$payable->getFont()->setBold(true);
$payable->getFont()->setSize(14);
$richText->createText('');
$spreadsheet->getActiveSheet()->getCell($TextoResumenCobro)->setValue($richText);
$sheet->setCellValue($TextoProductos, 'Productos');
//Texto total final 
$LetraTotalColumna = $letras[$ultimoBordeNumero + 1 + $L];
$PosicionPalabraTotal = $LetraTotalColumna . $FinObjetos;
$sheet->setCellValue($PosicionPalabraTotal, 'Total: ');
//Contar Totales 
$LetraTotalColumna = $letras[$ultimoBordeNumero + 2 + $L];
$PosicionPalabraTotal = $LetraTotalColumna . 7;
$sheet->setCellValue($PosicionPalabraTotal, 'Total: ');
$spreadsheet->getActiveSheet()->getColumnDimension($letras[$ultimoBordeNumero + 2 + $L])->setWidth(9);
//Calculo del total unitario
$LetraTotalColumna2 = $letras[$ultimoBordeNumero + 2 + $L];
//Sin vuelta Falsa
if($contadorTiposTrabajo!=0){
for ($i = 0; $i < $NumeroPatentesRestantes; $i++) {
    $filaTotalUnitario = 8 + $i;
    $PosicionPalabraTotal2 = $LetraTotalColumna2 . $filaTotalUnitario;
    $cadena = null;
    $digito = $contadorTiposTrabajo;
    $contador  = 2;
    $contador2 = 1;
    $numeroDeTiposDeTrabajo = $contadorTiposTrabajo * 2;
    //Lo que necesito es que a este numero se le reste el numerodetiposdetrabajo y 
    for ($d = 0; $d < $digito; $d++) {
        $cadena .=  $letras[$ultimoBordeNumero + 1 + $contador] . $filaTotalUnitario . '*' . $letras[$ultimoBordeNumero + $contador] . $filaTotalUnitario . "+";
        $contador2 = $contador2  + 2;
        $numeroDeTiposDeTrabajo = $numeroDeTiposDeTrabajo - 1;
        $contador = $contador + 2;
    }
    $cad2 = substr($cadena, 0, -1);
    $funcionSumaYMultiplica = '=(' . $cad2 . ')';
    $sheet->setCellValue($PosicionPalabraTotal2, $funcionSumaYMultiplica);
}
//Vuelta Falsa
for ($i = 0; $i < $NumeroPatentesRestantesVueltaFalsa; $i++) {
    $filaTotalUnitario = 9 + $NumeroPatentesRestantes + $i;
    $PosicionPalabraTotal2 = $LetraTotalColumna2 . $filaTotalUnitario;
    $cadena = null;
    $digito = $contadorTiposTrabajo;
    $contador  = 2;
    $contador2 = 1;
    $numeroDeTiposDeTrabajo = $contadorTiposTrabajo * 2;
    //Lo que necesito es que a este numero se le reste el numerodetiposdetrabajo y 
    for ($d = 0; $d < $digito; $d++) {
        $cadena .=  $letras[$ultimoBordeNumero + 1 + $contador] . $filaTotalUnitario . '*' . $letras[$ultimoBordeNumero + $contador] . $filaTotalUnitario . "+";
        $contador2 = $contador2  + 2;
        $numeroDeTiposDeTrabajo = $numeroDeTiposDeTrabajo - 1;
        $contador = $contador + 2;
    }
    $cad2 = substr($cadena, 0, -1);
    $funcionSumaYMultiplica = '=((' . $cad2 . ')/2)';
    $sheet->setCellValue($PosicionPalabraTotal2, $funcionSumaYMultiplica);
}
}
//Sumando valor de los objetos y llevandolo a Total unitario
//Obteniendo Posicion de objetos 
//Obteniendo columna.
$LetraTotalColumna11 = $letras[$ultimoBordeNumero + 2 + $L];
$LetraTotalColumna22 = $letras[$ultimoBordeNumero + 3];
$LetraTotalColumna22MenosUno = $letras[$ultimoBordeNumero + 2];
//Obteniendo filas
for ($i = 0; $i < $contadorOtros; $i++) {
    //Obteniendo filas
    //Filas obtenidas, obteniendo valores a multiplicar.
    //Misma fila, diferente columna... ultimo borde...
    $FinObjetos2 =  $InicioObjetos + $i + 1;
    $PosicionSumaOtros = $LetraTotalColumna11 . $FinObjetos2;
    $MultiplicacionOtrosYCantidad = '=(' . $LetraTotalColumna22 . $FinObjetos2 . '*' . $LetraTotalColumna22MenosUno . $FinObjetos2 . ')';
    $PosicionTotalSumaOtros = $LetraTotalColumna11 . $FinObjetos2;
    $sheet->setCellValue($PosicionTotalSumaOtros, $MultiplicacionOtrosYCantidad);
}
//Valor total final sumando todos los totales unitarios
//Tengo la columna $LetraTotalColumna
$FinObjetosMenosUno = $FinObjetos - 1;
$UnionSumaTodosLosValoresTotalesUnitarios = '=SUM(' . $LetraTotalColumna . 8 . ':' . $LetraTotalColumna . $FinObjetosMenosUno . ')';
$LetraTotalColumna1 = $letras[$ultimoBordeNumero + 2 + $L];
$PosicionPalabraTotal = $LetraTotalColumna1 . $FinObjetos;
$sheet->setCellValue($PosicionPalabraTotal, $UnionSumaTodosLosValoresTotalesUnitarios);
$FiltroAutomatico = 'B7:' . $letras[$ultimoBordeNumeroMenosDos] . '7';
//Activa FIltro Automatico
$spreadsheet->getActiveSheet()->setAutoFilter($FiltroAutomatico);
//Total Servicios Repetido en el resumen cobro
$TextoTotaServicios = $letras[$ultimoBordeNumero] . $FinObjetos;
$ValorTotaServicios = $letras[$ultimoBordeNumero+1] . $FinObjetos;
$sheet->setCellValue($TextoTotaServicios, 'Total Servicios: ');
$sheet->setCellValue($ValorTotaServicios, $UnionSumaValoresTotales);
//Estilos barra Inferior resumen cobro
$letraBarraSuperiorResumen = $letras[$ultimoBordeNumero];
$letraFinBarraSuperiorResumen = $letras[$ultimoBordeNumero + 2 + $L];
$BarraSuperiorResumenCobro = $letraBarraSuperiorResumen . $FinObjetos . ':' . $letraFinBarraSuperiorResumen . $FinObjetos;
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle($BarraSuperiorResumenCobro)
    ->getFill()->getStartColor()->setARGB('#CCFFFF');
//Estilos Barra Inferior resumen cobro FIN
$NombreArchivo = "Resumen Cobro " . $nombreCliente . "T" . date("m.d.y") . ".xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename=' . $NombreArchivo);
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
$writer->save('php://output');
