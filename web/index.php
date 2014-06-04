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
						<nav class="da-arrows">
							<span class="da-arrows-prev"></span>
							<span class="da-arrows-next"></span>
						</nav>
				</div>

			<div class="clear"></div>
<?php
	include("includes/footer.php");
?>