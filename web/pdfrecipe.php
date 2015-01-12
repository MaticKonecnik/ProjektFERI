<?php 
require('fpdf/fpdf.php');
setlocale(LC_CTYPE, 'en_US');

include("includes/database.php");
$id = $_GET['id'];
$sql = "SELECT id, name, image, instructions, source_url, likes FROM recipe WHERE id='$id' LIMIT 1";
$row = mysqli_fetch_array(mysqli_query($con,$sql));
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$converted = iconv('UTF-8', 'ASCII//TRANSLIT', $row['name']);
$pdf->Cell(40,10,$converted);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',16);
$pdf->Cell(60, 10, 'Sestavine:' );
$pdf->SetFont('Arial','I',10);
$pdf->Ln(5);
$sql = "SELECT ingredient.name AS naziv, ingredient.picture AS slika, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina, has_ingredient.price AS cena FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
$result = mysqli_query($con,$sql);
while($sestavine = mysqli_fetch_array($result))
{
	$pdf->Ln(5);
	$ses=$sestavine['naziv'] ." ". $sestavine['kolicina'] ." ". $sestavine['enota'];
	$converted = iconv('UTF-8', 'ASCII//TRANSLIT', $ses);
	$pdf->Cell(80, 5 , $converted);
}
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','U',16);
$pdf->Cell(100, 10, 'Instrukcije:' );
$pdf->Ln();
$pdf->SetFont('Arial','I',10);
$converted = iconv('UTF-8', 'ASCII//TRANSLIT', $row['instructions']);
$pdf->MultiCell(180, 5, $converted, 0, 'L');

$pdf->Ln();
$pdf->Ln();
$pdf->Image($row['image'], 10, $pdf->GetY(), 120);
$pdf->Output();
?>