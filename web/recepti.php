<?php
	include("includes/database.php");
	include("includes/header.php");
	include("includes/menu.php");
	
	$sql = "SELECT id, name, image, instructions FROM recipe";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	{ ?>		
			<div class="span_of_2 prikaz_vseh_receptov">
				<span class="span_of_img"><img src="<?php echo($row['image']); ?>" alt="" class="slika_vsi_recepti"/></span>
				<div class="span_of_list">
					<div class="span1_of_1">
						<h4><?php echo($row['name']); ?></h4>
					</div>
					<div class="span1_of_2">
						<p><?php echo($row['instructions']); ?></p>
						<a class="arrow" href="#"><span>cake testings & consultations</span></a>
					</div>	
					<div class="clear"></div>
				</div>	
			</div>
            <div class="clear"></div>
<?php
	}
	include("includes/footer.php");
?>