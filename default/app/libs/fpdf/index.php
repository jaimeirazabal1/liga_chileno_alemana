<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('mc_table.php');



$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
/*encabezado*/
$pdf->Cell(10,10,utf8_decode('EINSCHREIBEFORMULAR SAT 2017- 2018'),0,1);
$pdf->SetXY(10,20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,10,utf8_decode('Formulario de inscripción SAT 2017- 2018'),0,1);
$pdf->SetFont('Arial','',10);
$pdf->Image('logo.jpg',135,10,-500);


/*termino encabezado*/

/*cuerpo de tabla*/
$pdf->SetWidths(array(35,100));
$pdf->Image('photo-1103596_960_720.png',150,40,-400);
$pdf->SetFont('Arial','B',12);

$pdf->Cell(10,10,utf8_decode("I. PERSÖNLICHE ANGABEN / datos personales"));
$pdf->SetFont('Arial','',8);

$pdf->SetXY(10,40);
$pdf->Row(array('Meine Schule: <br>Mi colegio','El Colegio donde estudié'),1);
$pdf->Row(array('Vollständiger Name: Nombre completo','Jaime Irazabal'),1);
$pdf->Row(array('Klasse (heute): <br>Curso (hoy)','Curso (hoy)'),1);
$pdf->Row(array('Geschlecht: <br>Genero (hoy)','mailish'),1);
$pdf->Row(array('Geburtsdatum: <br>Fecha de nacimiento','27/05/1986'),1);
$pdf->SetWidths(array(30,58,30,70));
$pdf->Ln();
$pdf->Row(array('Nr. Reisepass  RUT','16923509','Nationalität(en):  Nacionalidad(es)','Venezolano'));
$pdf->Row(array('Religion: <br>Religión ','Musulmana','Mail: ','jaimeirazabal1@gmail.com'),1);
$pdf->Row(array('Handynummer: Celular','4143299925','Ich rauche:','No'),1);
$pdf->Row(array('T-Shirt-Größe: Talla polera','L','Adresse:','La direccion aqui'),1);
$pdf->Row(array('Festnetznummer:  Teléfono fijo','02129512365','Ich wohne mit: ','La direccion aqui'),1);
$pdf->SetWidths(array(30,58,30,70));

$pdf->Row(array('Hobbys: ','Ich wohne mit: La direccion aqui','Sonstige Bemerkungen* :  Otros antecedentes importantes','Ich wohne mit: La direccion aqui'));

$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,10,utf8_decode("II. ANGABEN ÜBER ELTERN / datos de padres"),0,1);
$pdf->SetFont('Arial','',8);

$pdf->SetWidths(array(55,58,30,45));
$pdf->Row(array('Nach- und Vorname des Vaters: Apellidos y nombre padre','Jemmy Irazabal','Alter:','Venezolano'));
$pdf->Row(array('Mail : <br>Mail','16923509','Handy                            :','04143319808'),1);
$pdf->Row(array('Nach- und Vorname der Mutter: Apellidos y nombre madre','16923509','Alter:','Venezolano'));
$pdf->Row(array('Mail : <br>Mail','16923509','Handy                            :','04143299388'),1);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(10,10,utf8_decode("III. SONSTIGES / otros"),0,1);
$pdf->SetFont('Arial','',8);
$pdf->SetWidths(array(90,98));
$pdf->Row(array('Ich habe Verwandte im Gastland: <br>Tengo parientes en el país anfitrión','No'),1);
$pdf->Row(array('Ich habe schon eine Gastfamilie (Name, Adresse, Mail):  Ya tengo familia anfitriona (Nombre, dirección, mail)','No, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias exercitationem dolor quis, earum libero praesentium non asperiores rem architecto autem consequuntur reiciendis minus, maiores quibusdam incidunt atque nihil alias saepe. Lorem'));
// $pdf->Row(array('Mail : <br>Mail','16923509','Handy                            :','04143319808'),1);
/*estas son las lineas que no se podian colocar con BR y las coloque con x y 'y' fijas*/
$pdf->SetFont('Arial','',8);
if ($pdf->PageNo() == 1) {
		$pdf->setXY(98,108);
		$pdf->Cell(10,10,'Mail');
		$pdf->setXY(98,118);
		$pdf->Cell(10,10,'Yo fumo');
		$pdf->setXY(98,128);
		$pdf->Cell(10,10,utf8_decode('Dirección'));
		$pdf->setXY(98,138);
		$pdf->Cell(10,10,utf8_decode('Yo vivo con'));
		$pdf->setXY(10,148);
		$pdf->Cell(10,10,utf8_decode('Hobbies'));
		$pdf->setXY(123,192);
		$pdf->Cell(10,10,utf8_decode('Celular'));
		$pdf->setXY(123,212);
		$pdf->Cell(10,10,utf8_decode('Celular'));
		$pdf->setXY(123,182);
		$pdf->Cell(10,10,utf8_decode('Edad'));
		$pdf->setXY(123,202);
		$pdf->Cell(10,10,utf8_decode('Edad'));
}
$pdf->SetFont('Arial','B',8);
if ($pdf->PageNo() == 1) {
	$pdf->setXY(10,262);
	$pdf->Cell(90,4,"_____________________________________",0,0,"C");
	$pdf->Cell(90,4,"_____________________________________",0,1,"C");


	$pdf->Cell(90,4,utf8_decode("Unterschrift Schüler/in"),0,0,"C");
	$pdf->Cell(90,4,utf8_decode("Unterschriften Eltern/ Erziehungsberechtigte"),0,1,"C");

	$pdf->Cell(90,4,utf8_decode("Firma alumna/o"),0,0,"C");
	$pdf->Cell(90,4,utf8_decode("Firmas padres/apoderados"),0,1,"C");
}else{
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Cell(90,10,"_____________________________________",0,0,"C");
	$pdf->Cell(90,10,"_____________________________________",0,1,"C");


	$pdf->Cell(90,10,utf8_decode("Unterschrift Schüler/in"),0,0,"C");
	$pdf->Cell(90,10,utf8_decode("Unterschriften Eltern/ Erziehungsberechtigte"),0,1,"C");

	$pdf->Cell(90,10,utf8_decode("Firma alumna/o"),0,0,"C");
	$pdf->Cell(90,10,utf8_decode("Firmas padres/apoderados"),0,1,"C");	
}

$pdf->Output();
?>