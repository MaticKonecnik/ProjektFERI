
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
                        	$sql = "SELECT ingredient.name AS naziv, ingredient.picture AS slika, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
							$result = mysqli_query($con,$sql);
							$stevec = 0;
							while($sestavine = mysqli_fetch_array($result))
							{
								if($stevec%2==0)
									echo('<li class="active tooltip"><img src="'.$sestavine['slika'].'"><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
								else
									echo('<li class="tooltip"><img src="'.$sestavine['slika'].'"><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
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
                    	<!-- selektiranej iz baze i izpis ocjene -->
                        <!-- mySql funkcija Ocijena vraca trenutno ocjenu izbranog recepta -->
                    	<li><h4  id="ocijena">Ocena: <?php $sql = "SELECT Ocjena($id)"; $row2 = mysqli_fetch_array(mysqli_query($con,$sql)); echo ($row2[0]); ?></h4></li>
                   </ul>
                   <!-- Ajax skripta -->
                   <script type="text/javascript" src="js/starRatings/rate-product-ajax.js"></script>
                    	<form id="form3A">
                        	<input name="test-3A-ocjena-1" class="star rate" value="1" type="radio">
                            <input name="test-3A-ocjena-1" class="star rate" value="2" type="radio">
                            <input name="test-3A-ocjena-1" class="star rate" value="3" type="radio">
                            <input name="test-3A-ocjena-1" class="star rate" value="4" type="radio">
                            <input name="test-3A-ocjena-1" class="star rate" value="5" type="radio">
                        </form>
                     	<div class="vote_count"></div>
                	</div>
				</div>
                <div class="clear"></div>
                <div class="priporocanje_container">
                <?php
				$stevilo_receptov = 80;
				$sql = "SELECT b.recipe_id AS recommended_id, SUM(a.frequency*log('$stevilo_receptov'/df.occurrences)) AS sestevek FROM tf a, tf b, df
				WHERE a.recipe_id = '$id'
					AND a.word_id = b.word_id
					AND a.word_id = df.word_id
					AND  b.recipe_id <> '$id'
				GROUP BY b.recipe_id
				ORDER BY sestevek DESC LIMIT 3";
				$result = mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$pr_id = $row['recommended_id'];
					$sql_p = "SELECT id, name, image FROM recipe WHERE id='$pr_id' LIMIT 1";
					$priporocanje = mysqli_fetch_array(mysqli_query($con,$sql_p));
					echo('<a href="recipe.php?id='.$priporocanje['id'].'" class="priporocanje" style="background-image:url(\''.$priporocanje['image'].'\');">');
						echo('<span>'.$priporocanje['name'].'</span></a>'."\r\n");
				}
				?>
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
				
				if(!isset($_SESSION['hasVisited']))
				{
				  $_SESSION['hasVisited']="yes";
				  $sql = "UPDATE recipe SET clicked = clicked + 1 WHERE id = '$id'";
				  mysqli_query($con,$sql);
				}
			?>