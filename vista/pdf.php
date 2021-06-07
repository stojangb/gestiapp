<?php
require('../extras/fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../extras/logo_elihel.jpg',10,8,80);

    //Certificado
    $this->Ln(4);
    // Arial bold 15    
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la derecha
    $this->Cell(98);
    $this->Cell(20,15,utf8_decode('CERTIFICADO DE DESINFECCION'));
    

    //Ministerio
    $this->Ln(6);
    $this->SetFont('Arial','',9);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la derecha
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('Ministerio de Salud Resolución Exenta N° 816'));


    //G.M.PMO
    $this->Ln(8);
    $this->SetFont('Arial','',9);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la derecha
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('G.M.O.ORDINARIO N° 12.600/2289 VRS'));

    //Teléfono
    $this->Ln(8);
    $this->SetFont('Arial','',9);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la derecha
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('Teléfono: +569 76158907'));

    //Procedimientos sanitarios
    $this->Ln(1);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la izquierde
    $this->Cell(10);
    $this->Cell(20,15,utf8_decode('PROCEDIMIENTOS SANITARIOS'));
    
    
    // INDUSTRIALES
    $this->Ln(5);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la izquierde
    $this->Cell(27);
    $this->Cell(20,15,utf8_decode('INDUSTRIALES'));



    //Correo
    $this->Ln(2);
    $this->SetFont('Arial','',9);
    // Movernos a la derecha
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('Email: Pcastro@elihel.cl'));

    //Rut
    $this->Ln(8);
    $this->SetFont('Arial','',9);
    // Movernos a la derecha
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('Rut: 12.747.517-2'));

    //Ciudad
    $this->Ln(8);
    $this->SetFont('Arial','',9);
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('Puerto Montt'));


    //Fecha

    $this->SetFont('Arial','',12);
    $this->SetTextColor(33, 97, 140);

    // Movernos a la izquierda
    $this->Cell(-120);
    $this->Cell(20,15,utf8_decode('Fecha'));

    //Fecha Recuadro


    $this->Ln(4);
    // Movernos a la izquierda
    $this->Cell(14);
    $this->SetDrawColor(33,97,140);
 
    //Recuadro
    $this->Cell(55,7,'',1,8,'');

    //N°folio

    $this->Ln(-12);
    $this->SetTextColor(88, 214, 141);
    $this->SetFont('Arial','B',12);
    $this->Cell(140);
    $this->Cell(20,15,utf8_decode('N° '));
    //$this->Cell(20,15,utf8_decode('N° 000000'));

    //Datos cliente

    $this->Ln(20);
    $this->SetTextColor(33, 97, 140);
    $this->Cell(190,10,'DATOS CLIENTE',1,10,'C');

    //Empresa

    $this->Ln(1);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);
    $this->Cell(8);
    $this->Cell(20,15,utf8_decode('EMPRESA:'));

    //RUT

    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);
    $this->Cell(100);
    $this->Cell(20,15,utf8_decode('RUT:'));
    $this->Ln(15);

    //Datos desinfeccion

    $this->SetTextColor(33, 97, 140);
    $this->Cell(190,10,'DATOS DESINFECCION',1,10,'C');


    //Desinfeccion de:

    $this->Ln(-1);
    $this->SetFont('Arial','',10);
    $this->Cell(1);
    $this->Cell(20,15,utf8_decode('Desinfección de:'));


    // M/N y recuadro 

    $this->Ln(7);
    $this->SetFont('Arial','',10);
    $this->Cell(13);
    $this->Cell(25,15,utf8_decode('M/N'));

    $this->Ln(5); 
    // Movernos a la izquierda
    $this->Cell(22);
    
    $this->SetDrawColor(33,97,140);
 
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');

    // Barcaza y recuadro 
 
    $this->SetFont('Arial','',10);
    $this->Cell(11);
    $this->Cell(20,5,utf8_decode('Barcaza'));

    // Movernos a la izquierda
    $this->Cell(-4);
    
    $this->SetDrawColor(33,97,140);
 
   
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');

    // L/M

    $this->SetFont('Arial','',10);
    $this->Cell(14);
    $this->Cell(1,5,utf8_decode('L/M'));

    // Movernos a la izquierda
    $this->Cell(8);
    
    $this->SetDrawColor(33,97,140);
    
    
    //Recuadro  (ancho, alto, texto, línea, posición)
    $this->Cell(9,5,'',1,0,'10');


    // Lancha Pasajeros
    $this->SetFont('Arial','',10);
    $this->Cell(4);
    $this->Cell(20,5,utf8_decode('Lancha Pasajeros'));

    // Movernos a la izquierda
    $this->Cell(12);
    
    $this->SetDrawColor(33,97,140);
    
    
    //Recuadro  (ancho, alto, texto, línea, posición)
    $this->Cell(9,5,'',1,0,'10');


    // Contenedores

    $this->SetFont('Arial','',10);
    $this->Cell(12);
    $this->Cell(20,5,utf8_decode('Contenedores'));

    // Movernos a la izquierda
    $this->Cell(5);
    
    $this->SetDrawColor(33,97,140);
    
    
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');


    //Siguiente Línea

    $this->Ln(3); 


    // Piscicultura y recuadro 
    $this->SetFont('Arial','',10);
    $this->Cell(1);
    $this->Cell(20,15,utf8_decode('Piscicultura'));

    $this->Ln(5); 

    // Movernos a la izquierda
    $this->Cell(22);
    
    $this->SetDrawColor(33,97,140);
    
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');

    // Centro de mar y recuadro 
    
    $this->SetFont('Arial','',10);
    $this->Cell(2);
    $this->Cell(20,5,utf8_decode('Centro de mar'));

    // Movernos a la izquierda
    $this->Cell(5);
    
    $this->SetDrawColor(33,97,140);
    
    
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');

    // Tolvas

    $this->SetFont('Arial','',10);
    $this->Cell(10);
    $this->Cell(1,5,utf8_decode('Tolvas'));

    // Movernos a la izquierda
    $this->Cell(12);
    
    $this->SetDrawColor(33,97,140);
    
    //Recuadro  (ancho, alto, texto, línea, posición)
    $this->Cell(9,5,'',1,0,'10');


    //Camión Ensilaje
    $this->SetFont('Arial','',10);
    $this->Cell(7);
    $this->Cell(20,5,utf8_decode('Camión Ensilaje'));

    //Movernos a la izquierda
    $this->Cell(9);
    
    $this->SetDrawColor(33,97,140);
    
    
    //Recuadro  (ancho, alto, texto, línea, posición)
    $this->Cell(9,5,'',1,0,'10');


    //Mat. Ret

    $this->SetFont('Arial','',10);
    $this->Cell(20);
    $this->Cell(16,5,utf8_decode('Mat. Ret'));

    // Movernos a la izquierda
    $this->Cell(1);

    
    
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(9,5,'',1,0,'10');
    
    $this->Ln(6); 

    //Nombre embarcación
    $this->SetFont('Arial','',12);


    // Movernos a la izquierda
    $this->Cell(1);
    $this->Cell(18,15,utf8_decode('Nombre Embarcación'));
    $this->Ln(4);
    // Movernos a la izquierda
    $this->Cell(44);

    
    //Recuadro
    $this->Cell(50,7,'',1,8,'');



    //Patente/Matricula
    $this->SetFont('Arial','',12);

    $this->Ln(-4);


    // Movernos a la izquierda
    $this->Cell(101);
    $this->Cell(2,1,utf8_decode('Patente / Matrícula'));

    $this->Ln(-4);

    // Movernos a la izquierda
    $this->Cell(140);

    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(50,7,'',1,1,'');



    //Hora Inicio Faena
    $this->SetFont('Arial','',12);


    // Movernos a la izquierda
    $this->Cell(8);
    $this->Cell(20,15,utf8_decode('Hora Inicio Faena'));
    $this->Ln(4);
    // Movernos a la izquierda
    $this->Cell(44);

    
    //Recuadro
    $this->Cell(50,7,'',1,8,'');



    //Hora Termino Faena
    $this->SetFont('Arial','',12);

    $this->Ln(-4);


    //Movernos a la izquierda
    $this->Cell(97);
    $this->Cell(2,1,utf8_decode('Hora Término Faena'));

    $this->Ln(-4);

    //Movernos a la izquierda
    $this->Cell(140);

    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(50,7,'',1,1,'');

    //Observaciones:
    $this->Ln(8);
    $this->SetFont('Arial','B',12);
    $this->SetTextColor(33, 97, 140);
    $this->Cell(5);
    $this->Cell(2,5,utf8_decode('Observaciones:'));

    // Movernos a la izquierda
    $this->Cell(-11);
    $this->Ln(-3);
    //Recuadro  (ancho, alto, texto ,línea, posición)
    $this->Cell(191,30,'',1,1,'');

    //Productos químico y dilución.
    $this->Ln(3);
    $this->Cell(191,10,'PRODUCTOS QUIMICOS Y DILUCION',1,10,'C');
    $this->Ln(3);
    $this->SetFont('Arial','',12);


    //Detergente
    $this->Cell(35,10,'     Detergente',1,0,'');
     
    //Dilución
    $this->Cell(35,10,utf8_decode('        Dilución'),1,1,'');
    $this->Cell(35,10,'     ',1,0,'');
    $this->Cell(35,10,'     ',1,1,'');

    $this->Ln(-20);
    $this->Cell(121);

    //Desinfectante / Dilucion
    $this->Cell(35,10,'    Desinfectante',1,0,'');
     
    //Dilución
    $this->Cell(35,10,utf8_decode('        Dilución'),1,1,'');
    $this->Cell(121);
    $this->Cell(35,10,'    jonclean 80',1,0,'');
    $this->Cell(35,10,'     1:500000',1,1,'');

  
    //Servicio realizado
    $this->Ln(3);
    $this->SetFont('Arial','B',12);
    $this->Cell(191,10,'SERVICIO REALIZADO',1,10,'C');
    $this->SetFont('Arial','',12);
    $this->Ln(3);

    //Remoción y lavados


    //Texto superior
    $this->SetFont('Arial','',12);
    $this->Cell(4);
    $this->Cell(40,10,utf8_decode('Remoción y'));
    $this->Cell(36,10,utf8_decode('Aplicación'));
    $this->Cell(41,10,utf8_decode('Enjuage Agua'));
    $this->Cell(38,10,utf8_decode('Aplicación'));
    $this->Cell(40,10,utf8_decode('Sanitización'));

    //Texto inferior
    $this->Ln(0);

    $alto = 22;
    $this->Cell(9);
    $this->Cell(34,$alto,utf8_decode('Lavado'));
    $this->Cell(36,$alto,utf8_decode('Detergente'));
    $this->Cell(38,$alto,utf8_decode('T° superior 55°'));
    $this->Cell(46,$alto,utf8_decode('Desinfectante'));
    $this->Cell(40,$alto,utf8_decode('Interior'));

    


    
    




    //Tabla
    $this->Ln(0);
    $this->SetFont('Arial','',12);
    $ancho = 14;
    $this->Cell(38.2,$ancho,utf8_decode(' '),1,0,'C');
    $this->Cell(38.2,$ancho,utf8_decode(' '),1,0,'C');
    $this->Cell(38.2,$ancho,'',1,0,'C');
    $this->Cell(38.2,$ancho,'',1,0,'C');
    $this->Cell(38.2,$ancho,utf8_decode(''),1,1,'C');
    $this->Cell(38.2,10,utf8_decode(' '),1,0,'C');
    $this->Cell(38.2,10,'    ',1,0,'C');
    $this->Cell(38.2,10,'    ',1,0,'C');  
    $this->Cell(38.2,10,'    ',1,0,'C');  
    $this->Cell(38.2,10,'    ',1,0,'C');  

    //Supervisores
    $this->Ln(14);
    $this->Cell(95.5,10,utf8_decode('Supervisor Terreno'),1,0,'C');
    $this->Cell(95.5,10,utf8_decode('Supervisor Cliente'),1,1,'C');
    $this->Cell(95.5,50,utf8_decode(' '),1,0,'C');
    //Nombre
    $this->Cell(-90);
    $this->Cell(95,10,utf8_decode('Nombre:'));
    $this->Cell(90,10,utf8_decode('Nombre:'));
    $this->Ln(15);
    $this->Cell(5);
    //Rut
    $this->Cell(95,9,utf8_decode('Rut:'));
    $this->Cell(95,9,utf8_decode('Rut:'));

    //Firma

    $this->Ln(15);
    $this->Cell(5);
    $this->Cell(95,9,utf8_decode('Firma:'));
    $this->Cell(95,9,utf8_decode('Firma:'));


    $this->Ln(-30);

    $this->Cell(95.5);

    $this->Cell(95.5,50,utf8_decode(' '),1,0,'C');
}
    
// Pie de página

/* function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    // $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
} 
*/
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'Legal');
$pdf->Output();