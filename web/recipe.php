<?php
	include("includes/database.php");
	include("includes/header.php");
	include("includes/menu.php");
	
	$id = $_GET['id'];
	$sql = "SELECT id, name, image, instructions, source_url, likes FROM recipe WHERE id='$id' LIMIT 1";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	 ?>		
			<div class="span_of_2 prikaz_vseh_receptov">
				<span class="span_of_img"><img src="<?php echo($row['image']); ?>" alt="" id="slika_en_recept"/></span>
				<div class="span_of_list">
					<div class="span1_of_1">
						<h4><?php echo($row['name']); ?></h4>
                        <div class="grid1_of_list1 sestavine">
							<div class="grid_text">	
								<ul class="list1">
                        <?php
                        	$sql = "SELECT ingredient.name AS naziv, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
							$result = mysqli_query($con,$sql);
							$stevec = 0;
							while($sestavine = mysqli_fetch_array($result))
							{
								if($stevec%2==0)
									echo('<li class="active"><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
								else
									echo('<li><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
								$stevec++;
							}
						?>                                 
                                    <div class="clear"></div>
                                </ul>
                            </div>
                        </div>
                        
                        
					</div>
					<div class="span1_of_2">
						<p><?php echo($row['instructions']); ?></p>
                        <a class="arrow" href="<?php echo($row['source_url']); ?>"><span>Izvorna stran recepta...</span></a>
					</div>	
					<div class="clear"></div>
				</div>	
				
				<div class="span_of_list1">
					<div class="span_list1">
						<ul class="span_pea">
							<li><h4>Všečki:</h4></li>
						</ul>
						<ul class="span_pea1">
							<li><span><?php echo($row['likes']); ?></span></li>
						</ul>
					</div>
					<div class="span_list2">
						<ul class="span_plus">
							<li><a href="pluslike.php?id=<?php echo($row['id']); ?>"><span class="plus">+</span></a></li>
							<li><a href="minuslike.php?id=<?php echo($row['id']); ?>"><span class="minus">-</span></a></li>
						</ul>
						<ul class="span_img">
							<li><a href="#"><img src="images/pic7.jpg" alt=""/></a></li>
						</ul>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				
			</div>
            <div class="clear"></div>
                <?php
				$sql = "SELECT COUNT(id) AS stevec FROM comment WHERE recipe_id='$id'";
				$row = mysqli_fetch_array(mysqli_query($con,$sql));
				if($row['stevec']>0 || isset($_SESSION['login']))
				{
					echo('<div class="contact_form comment_form">
                			<div id="comment_wrapper">
                			</div>');
					if(isset($_SESSION['login']))
                		echo('<input type="text" id="vnos_komentarja" placeholder="Komentar..."></input>');
					echo('</div>');
				}
	include("includes/footer.php");
?>