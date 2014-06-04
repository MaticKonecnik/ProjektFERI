<?php
	include("includes/header.php");
	include("includes/menu.php");

	$budget = $_GET['budget'];
	//polje za menu-je
	$menu = array();
	
	//izberi vse predjedi
	$predjedi = array();
	$query = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 1 GROUP BY recipe_id HAVING p < '$budget' ORDER BY p DESC";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		array_push($predjedi, $row[0], $row['p']);
	}
	
	//izberi vse glavne jedi
	$glavne = array();
	$q = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 2 GROUP BY recipe_id HAVING p < '$budget' ORDER BY p DESC";
	$re = mysqli_query($con, $q);
	while($ro = mysqli_fetch_array($re)){
		array_push($glavne, $ro[0], $ro['p']);
	}
	
	//izberi vse sladice
	$sladice = array();
	$qu = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 3 GROUP BY recipe_id HAVING p < '$budget' ORDER BY p DESC";
	$res = mysqli_query($con, $qu);
	while($rr = mysqli_fetch_array($res)){
		array_push($sladice, $rr[0], $rr['p']);
	}
	
	for($i=0; $i<count($predjedi); $i+=2){
		$predjed_id = $predjedi[$i];
		$vsota_predjedi = $predjedi[$i+1];
		for($j=0; $j<count($glavne); $j+=2){
			$glavna_id = $glavne[$j];
			$vsota_glavne = $vsota_predjedi + $glavne[$j+1];
			if($vsota_glavne >= $budget){
				continue;
			}
			else{
				for($k=0; $k<count($sladice); $k+=2){
					$sladica_id = $sladice[$k];
					$vsota_sladice = $vsota_glavne + $sladice[$k+1];
					if($vsota_sladice > $budget){
						continue;
					}
					else{
						array_push($menu, $predjed_id, $glavna_id, $sladica_id);
					}
				}
			}
		}
	}
	
	echo '<div class="span_of_2 prikaz_vseh_receptov">';
	echo '<div class="priporocanje_container">';
	for($i=0; $i<count($menu); $i++){
		$sql_p = "SELECT id, name, image FROM recipe WHERE id='$menu[$i]' LIMIT 1";
		$priporocanje = mysqli_fetch_array(mysqli_query($con, $sql_p));
		if($i % 3 == 0 && $i != 0){
			echo '</div>';
			echo '<div class="priporocanje_container">';
		}
		echo('<a href="recipe.php?id='.$priporocanje['id'].'" class="priporocanje" style="background-image:url(\''.$priporocanje['image'].'\');">');
		echo('<span>'.$priporocanje['name'].'</span></a>'."\r\n");
	}
	echo '</div>';
	echo '</div>';
	include("includes/footer.php");
?>