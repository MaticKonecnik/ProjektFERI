<?php
	include("includes/header.php");
	include("includes/menu.php");
	$sql = "SELECT id, name, image, instructions FROM recipe ORDER BY clicked DESC LIMIT 5";
	$result = mysqli_query($con,$sql);	
?>
                	<div id="owl-demo" class="owl-carousel owl-theme">
                        <?php
						while($row = mysqli_fetch_array($result))
						{
							$vsebina = $row['instructions'];
							$stevilo_znakov = 300;
							if(strlen($vsebina)>$stevilo_znakov)
								$pos=strpos($vsebina, ' ', $stevilo_znakov); $vsebina=substr($row['instructions'],0,$pos ).'...';
							?>
                            <div class="item">
                                <span class="span_of_img">
                                    <a href="<?php echo('recipe.php?id='.$row['id']); ?>" title="<?php echo($row['name']); ?>">
                                    	<div style="background-image:url('<?php echo($row['image']); ?>');" class="slika_vsi_recepti"></div>
                                    </a>
                                </span>
                                <a href="recipe.php?id=<?php echo($row['id']); ?>"><h4><?php echo($row['name']); ?></h4></a>
                                <p><?php echo($vsebina); ?></p>
							</div>
						<?php }
					?>
						
				</div>
				<a href="virtual_kitchen.php">
					<div class="grid1_of_list virtual_kitchen_entry_button">
						<img src="images/virtual.png" alt="" />
						<h4>Step into the virtual kitchen...</h4>
					</div>
				</a>
				<div class="clear"></div>
				<div id="ingredient-container"></div>
				<div class="clear"></div>
<?php
	$query = "SELECT DISTINCT(name), id FROM ingredient i INNER JOIN has_ingredient hi ON i.id=hi.ingredient_id WHERE LENGTH(name) < 15 LIMIT 28";
	$r = mysqli_query($con, $query);
	$st=0;
	echo '<form action="rezultati.php" id="forma_za_sestevine" method="get">';
	while($roww = mysqli_fetch_array($r)){
		echo('<div class="roundedOne">');
		echo('<input type="checkbox" value="'.$roww[1].'" id="'.$roww[1].'" name="ingredient[]" />');
		echo('<label for="'.$roww[1].'"><span>'.$roww[0].'</span></label>');
		echo('</div>');
	}
	echo '<div class="clear"></div><input type="submit" value="Poišči">';
	echo '</form>';
	include("includes/footer.php");
?>