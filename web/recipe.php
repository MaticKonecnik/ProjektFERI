<?php
	include("includes/header.php");
	include("includes/menu.php");
	
	//http://localhost/Projekt/ProjektFERI/web/recipe.php?id=2
	
	
	$id = $_GET['id'];
	
	//header("Location: aprioriBaza.php?id=$id");
	
	if(isset($_SESSION['transaction']))
	{
		//vstavljanje transakcije
		//$sql = "INSERT INTO transaction(transaction_id, item)  VALUES ($_SESSION[transaction], $id);";
		//insert if not exsist in table yet
		$sql = "INSERT INTO transaction (transaction_id, item) SELECT * FROM(SELECT $_SESSION[transaction], $id) AS tmp WHERE NOT EXISTS (SELECT * FROM transaction WHERE item = $id AND transaction_id=$_SESSION[transaction]) LIMIT 1;";	
		mysqli_query($con, $sql);
		
		//izracun broj transakcij
		$sql = "SELECT count(transaction_id) from transaction where transaction_id=$_SESSION[transaction];";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_row($result);
		$brojTransakcij = $row[0];
		
		//update transkacije (tj. broj transakcij)
		$sql = "UPDATE transaction SET total_item= $brojTransakcij where transaction_id=$_SESSION[transaction]";
		mysqli_query($con, $sql);
		
		//izracun fuzzy value za transakciju
		if($brojTransakcij!=0)
		{
			$fuzzyVrednost = (1/$brojTransakcij);
			$sql = "UPDATE transaction SET fuzzy_value=$fuzzyVrednost WHERE transaction_id=$_SESSION[transaction];";
			mysqli_query($con, $sql);
		}
	}
	
	
	$sql = "SELECT id, name, image, instructions, source_url, likes FROM recipe WHERE id='$id' LIMIT 1";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	 ?>		
			<div class="span_of_2 prikaz_vseh_receptov">
				<span class="span_of_img"><img src="<?php echo($row['image']); ?>" alt="" id="slika_en_recept"/></span>
				<div class="span_of_list">
					<div class="span1_of_1">
						<h4><?php echo($row['name']); ?></h4>
                         <div id="ocena_container">
                         </div>
                        <div class="grid1_of_list1 sestavine">
							<div class="grid_text">	
								<ul class="list1">
                        <?php
                        	$sql = "SELECT ingredient.name AS naziv, ingredient.picture AS slika, has_ingredient.type AS enota, has_ingredient.quantity AS kolicina, has_ingredient.price AS cena FROM ingredient, has_ingredient WHERE has_ingredient.ingredient_id=ingredient.id AND has_ingredient.recipe_id='$id'";
							$result = mysqli_query($con,$sql);
							$stevec = 0;
							while($sestavine = mysqli_fetch_array($result))
							{
								$cenases=$sestavine['cena'];
								if ($cenases==NULL){
									$cena="";
								}
								else
								{
									$cena=$cenases."€";
								}
								if($stevec%2==0)
									echo('<li class="active tooltip"><figure><img src="'.$sestavine['slika'].'"><figcaption>'.$cena.'</figcaption></figure><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
								else
									echo('<li class="tooltip"><figure><img src="'.$sestavine['slika'].'"><figcaption>'.$cena.'</figcaption></figure><a href="#">'.$sestavine['naziv'].' <span>'.$sestavine['kolicina'].' '.$sestavine['enota'].'</span> </a></li>');
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
                                                          

                <div class="clear"></div>
                				
				<div class="span_of_list1">
					<div class="span_list1">
						<ul class="span_pea">
							<li><h4>Priporočanja:</h4></li>
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
                
                
                <!-- Apriori priporočanje receptov -->
                <?php
				$sql = "SELECT distinct end_rule FROM apriori_rule WHERE start_rule LIKE $id order by id;";
				$result = mysqli_query($con, $sql);
				$prva = TRUE;
				while($row = mysqli_fetch_array($result))
				{
					if($prva)
					{
						$endRule = $row[0];
						$prva=false;
					}
					else
					{
						$endRule = $endRule. "," .$row[0];
					}
				}
				if(!empty($endRule))
				{
					//dobimo index vseh priporocenih receptov
					$integerIDs = array_map('intval', explode(',', $endRule));
					$integerIDs = array_unique($integerIDs);
					echo "<div class='priporocanje_container menu_container'>";
									
					$brojIteracij = 0;
					//Random raspored
					shuffle($integerIDs);
					foreach($integerIDs as $indexRecepta)
					{
						//select recepta koji se preporoca
						//SELECT * FROM skupina1sp.recipe where id=1;
						if($brojIteracij == 3) break;
						$sql = "SELECT * FROM skupina1sp.recipe where id=$indexRecepta";
						$result = mysqli_query($con, $sql);
						$row = mysqli_fetch_row($result);
						echo('<a href="recipe.php?id='.$row[0].'" class="priporocanje" style="background-image:url(\''.$row[2].'\');">');
						echo('<span>'.$row[1].'</span></a>'."\r\n");
						$brojIteracij++;
						
					}
					echo "</div>";
				}		
				?>
     
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
				
				
				//Apriori Test
				/*
				if(isset($_SESSION['transaction']))
				{
					
					$testRule = "";
					$prva = TRUE;
					$sql = "SELECT * FROM transaction where transaction_id=$_SESSION[transaction];";
					$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_array($result))
					{
						if($prva)
						{
							$testRule=$row[2];
							$prva=false;
						}
						else
						{
							$testRule = $testRule.", ".$row[2];
						}
					}	
					//vraca polje integer iz stringa
					//$integerIDs = array_map('intval', explode(',', $testRule));
				}
				*/
				//Apriori show recipe test
				//SELECT distinct * FROM apriori_rule WHERE start_rule LIKE 8 order by id DESC LIMIT 1;
				


				
				
				include("includes/footer.php");
				
				if(!isset($_SESSION['hasVisited']))
				{
				  $_SESSION['hasVisited']="yes";
				  $sql = "UPDATE recipe SET clicked = clicked + 1 WHERE id = '$id'";
				  mysqli_query($con,$sql);
				}
				
				

			?>