<?php
include("includes/database.php");
$id = $_GET['id'];
$sql = "SELECT id, name, image, instructions, source_url, likes FROM recipe WHERE id='$id' LIMIT 1";
$row = mysqli_fetch_array(mysqli_query($con,$sql));
$naziv=$row['name']."\r\n\r\n";

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $naziv);
$sql = "SELECT ingredient.name AS naziv, ingredient.picture AS slika, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina, has_ingredient.price AS cena FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
$result = mysqli_query($con,$sql);
$s="Sestavine:\r\n";
fwrite($myfile, $s);
$c="..........\r\n";
fwrite($myfile, $c);
while($sestavine = mysqli_fetch_array($result))
{
	$ses=$sestavine['naziv'] ." ". $sestavine['kolicina'] ." ". $sestavine['enota']."\r\n";
	fwrite($myfile, $ses);
}
fwrite($myfile, "\r\nPriprava:\r\n");
$c="..........\r\n";
fwrite($myfile, $c);
fwrite($myfile, $row['instructions']);

fclose($myfile);

exec("Huffman.exe newfile.txt -c", $output);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename('newfile.txt.zip'));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('newfile.txt.zip'));
readfile('newfile.txt.zip');
unlink("newfile.txt");
unlink("newfile.txt.zip");
exit;
?>