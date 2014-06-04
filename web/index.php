<?php
	include("includes/header.php");
	include("includes/menu.php");
	$sql = "SELECT id, name, image, instructions FROM recipe ORDER BY clicked DESC LIMIT 4";
	$result = mysqli_query($con,$sql);	
?>
		<div class="grids_of_2"><!-- start grids_of_2 -->	
			<div class="slider"><!-- start slider -->
				<div id="da-slider" class="da-slider"><!-- start slider -->
						
                        <?php
						while($row = mysqli_fetch_array($result))
						{
							$vsebina = $row['instructions'];
							$stevilo_znakov = 300;
							if(strlen($vsebina)>$stevilo_znakov)
								$pos=strpos($vsebina, ' ', $stevilo_znakov); $vsebina=substr($row['instructions'],0,$pos ).'...';
							?>
							<div class="da-slide">
                            <span class="span_of_img"><a href="<?php echo('recipe.php?id='.$row['id']); ?>" title="<?php echo($row['name']); ?>"><div style="background-image:url('<?php echo($row['image']); ?>');" class="slika_vsi_recepti"></div></a></span>
								<a href="recipe.php?id=<?php echo($row['id']); ?>"><h2><?php echo($row['name']); ?></h2></a>
								<p><?php echo($vsebina); ?></p>
							</div>
						<?php }
					?>
						<nav class="da-arrows">
							<span class="da-arrows-prev"></span>
							<span class="da-arrows-next"></span>
						</nav>
				</div><!-- end slider -->
			</div><!-- end slider -->
            <div class="grid_right">
				<ul>
					<li class="color1"><img src="images/pic3.jpg" alt=""/></li>
                    <li class="color2"><img src="images/pic4.jpg" alt=""/></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div><!-- end grids_of_2 -->
<?php
	include("includes/footer.php");
?>