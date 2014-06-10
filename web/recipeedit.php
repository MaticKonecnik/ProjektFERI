<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include_once ("includes/database.php");
include("includes/header.php");
include("includes/menu.php");

if(!isset($_SESSION["login"]))
    {
        header('Location: login.php');
    }

$id = $_GET['id'];
$sql = "SELECT id, name, image, instructions FROM recipe WHERE id='$id' LIMIT 1";
$row = mysqli_fetch_array(mysqli_query($con,$sql));


$submit=isset($_POST['submit']);
if($submit){
	$id=$row['id'];
	$name=$_POST['name'];
	$instructions=$_POST['instructions'];
	
	$query = sprintf("UPDATE recipe SET name='%s', instructions='%s' WHERE id = '$id'",
			mysqli_real_escape_string($con, $name),
			mysqli_real_escape_string($con, $instructions);
	if(!mysqli_query($con, $query)){
		die(mysqli_error($con));
	}
}

$preklici=isset($_POST['cancle']);
if ($preklici){
	header('Location: profil.php?id=$id');
}

?>


<!-- Including the HTML5 Uploader plugin -->
		<script src="js/jquery.filedrop.js"></script>
		
		<!-- The main script file -->
        <script src="js/datoteke.js"></script>
<script src="js/jquery.tokeninput.js"></script> 
<script src="js/dodajrecept.js"></script> 
<link rel="stylesheet" href="css/dodajanje_sestavin.css" type="text/css" />
<div class="clear"></div>
<div class="spans_of_2"><!-- start spans_of_2 -->
    <div class="span_of_1 login_form"><!-- start span_of_1 -->
        <div class="span_of_text">
            <h4>Urejanje recepta</h4>
        </div>
        <div class="contact_form">
            <form method="post" autocomplete="off">
                <span>Ime recepta</span>
                <input type="text" class="text"  required id="ime_recepta" value="<?php echo $row['name'] ?>">
                <span>Sestavine</span>
				<?php
					$sql = "SELECT ingredient.name AS naziv, ingredient.picture AS slika, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
					$result = mysqli_query($con,$sql);
					$ses="p";
					while($sestavine = mysqli_fetch_array($result)){
					$ses=$ses+$sestavine['naziv'];
					}
				?>
                <input type="text" id="demo-input-facebook-theme" name="blah2" class="tooltip" value="<?php echo $ses ?>"/>

                <span>Priprava</span>
                <textarea  type=text required maxlength="5000" id="priprava"><?php echo $row['instructions'] ?> </textarea>
                <div id="dropbox">
                    <img src="<?php echo $row['image'] ?> class="priporocanje" alt="""/>
				</div>
                <div>
                    <input type="reset" id="cancelProfile" name="cancle" value="Preklici" />
					<input type="submit" name="submit" id="updateProfile" value="Uredi">
                    <div class="clear"></div>
                </div>
                
            </form>
        </div>			
    </div><!-- end span1_of_1 -->
    <div class="clear"></div>


<?php
include("includes/footer.php");
?>