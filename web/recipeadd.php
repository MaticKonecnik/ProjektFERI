<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
 if(!isset($_SESSION["login"]))
    {
        header('Location: login.php');
    }
include_once ("includes/database.php");
if (isset($_POST['vrednost'])) {
    $ids = $_POST['vrednost'];
    $vrednosti = explode(',', $ids); // oblika nekaj, nekaj; razreûimo v polje
    $id_uporabnik = $_SESSION['login'];
    $priprava = $_POST['priprava'];
    $ime_recepta = $_POST['ime'];
    $ime_datoteke = $_POST['ime_datoteke'];
  $string = "";
    if($ime_datoteke == -1)
    {
    $query = sprintf("INSERT INTO recipe(name, instructions, tk_id_user) VALUES('%s', '%s', %d)", mysqli_real_escape_string($con, $ime_recepta), mysqli_real_escape_string($con, $priprava), mysqli_real_escape_string($con, $id_uporabnik));
    if (!mysqli_query($con, $query)) { // najprej dodamo recept
        print -1;
        die;
    }
    }
    else
    {
       $query = sprintf("INSERT INTO recipe(name, instructions, tk_id_user, image) VALUES('%s', '%s', %d,'%s' )", mysqli_real_escape_string($con, $ime_recepta), mysqli_real_escape_string($con, $priprava), mysqli_real_escape_string($con, $id_uporabnik), mysqli_real_escape_string($con, $ime_datoteke));
    if (!mysqli_query($con, $query)) { // najprej dodamo recept
        print -1;
        die;
    } 
    }
    $id_recept = mysqli_insert_id($con);
    
    for ($i = 0; $i < count($vrednosti); $i++) { // nato pa sestavinice
        if (is_numeric($vrednosti[$i])) { // Ëe je vrednost je to id sestavine
            $query = sprintf("INSERT INTO has_ingredient(ingredient_id, recipe_id) VALUES(%d, %d)", mysqli_real_escape_string($con, $vrednosti[$i]), mysqli_real_escape_string($con, $id_recept));
            if (!mysqli_query($con, $query)) {
                print -1;
                die;
            }
        } else { // drugaËe je ime in jo vpiöemo v bazo
            $query = sprintf("INSERT INTO ingredient(name) VALUES('%s')", mysqli_real_escape_string($con, $vrednosti[$i]));
            if (!mysqli_query($con, $query)) {
                print -1;
                die;
            }
            $id_sestavina = mysqli_insert_id($con);
            $query = sprintf("INSERT INTO has_ingredient(ingredient_id, recipe_id) VALUES(%d, %d)", mysqli_real_escape_string($con, $id_sestavina), mysqli_real_escape_string($con, $id_recept));
            if (!mysqli_query($con, $query)) {
                print -1;
                die;
        }
        }
    }

    print $id_recept;

    die;
}
include("includes/header.php");
include("includes/menu.php");




//echo "<script type='text/javascript'>alert($submit);</script>";
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
            <h4>Nov recept</h4>
        </div>
        <div class="contact_form">
            <form method="post" autocomplete="off">
                <span>Ime recepta</span>
                <input type="text" class="text"  required id="ime_recepta">
                <span>Sestavine</span>
                <input type="text" id="demo-input-facebook-theme" name="blah2"  />

                <span>Priprava</span>
                <textarea  type=text required maxlength="5000" id="priprava"> </textarea>
                <div id="dropbox">
                    <span class="message">Sem dodajte ENO fotografijo recepta <br />
                        <i>≈†e enkrat poglejte katero fotografijo boste nalo≈æili, kajti sprememba ni mo≈æna!<i/></span>
		</div>
                <div>
                    <input type="button" value="Dodaj" id="submit" name="submit">
                    <div class="clear"></div>
                </div>
                
            </form>
        </div>			
    </div><!-- end span1_of_1 -->
    <div class="clear"></div>
</div><!-- end spans_of_2 -->
<?php
include("includes/footer.php");
?>