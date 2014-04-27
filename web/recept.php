<?php
	include("includes/database.php");
	include("includes/header.php");
	include("includes/menu.php");
	
	$id = $_GET['id'];
	$sql = "SELECT id, name, image, instructions FROM recipe WHERE id='$id' LIMIT 1";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	 ?>		
			<div class="span_of_2 prikaz_vseh_receptov">
				<span class="span_of_img"><img src="<?php echo($row['image']); ?>" alt="" class="slika_en_recept"/></span>
				<div class="span_of_list">
					<div class="span1_of_1">
						<h4><?php echo($row['name']); ?></h4>
					</div>
					<div class="span1_of_2">
						<p><?php echo($row['instructions']); ?></p>
					</div>	
					<div class="clear"></div>
				</div>	
			</div>
            <div class="clear"></div>
            <div class="contact_form comment_form">
                <div id="comment_wrapper">
                </div>
                <input type="text" id="vnos_komentarja" placeholder="Komentar..."></input>
			</div>			
<?php
	include("includes/footer.php");
?>