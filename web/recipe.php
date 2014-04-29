
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
                    	<li><h4>Ocijena:</h4></li>
                   </ul>
                    	<form id="form3A">
                        	<input name="test-3A-ocjena-1" class="star" value="1" type="radio">
                            <input name="test-3A-ocjena-1" class="star" value="2" type="radio">
                            <input name="test-3A-ocjena-1" class="star" value="3" type="radio">
                            <input name="test-3A-ocjena-1" class="star" value="4" type="radio">
                            <input name="test-3A-ocjena-1" class="star" value="5" type="radio">
                        </form>
                     
                	</div>
				</div>
                
   