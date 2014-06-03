<?php
	include("includes/header.php");
	include("includes/menu.php");

	$budget = $_GET['budget'];
	//polje za menu-je
	$menu = array();
	
	//izberi vse predjedi
	$query = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 1 GROUP BY recipe_id HAVING p < '$budget' ORDER BY p DESC";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($con, $result)){
		$predjed_id = $row['0'];
		$sukpna_vsota = $row['p'];
		//izberi vse glavne jedi
		$q = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 2 GROUP BY recipe_id HAVING p + '$skupna_vsota' < '$budget' ORDER BY p DESC";
		$res = mysqli_query($con, $q);
		while($r = mysqli_fetch_array($con, $result)){
			$glavna_id = $r['0'];
			$skupna_vsota += $r['p'];
			//izberi vse sladice
			$qu = "SELECT r.id, SUM(price) as p FROM recipe r INNER JOIN has_ingredient hi ON r.id=hi.recipe_id WHERE category_id = 3 GROUP BY recipe_id HAVING p + '$skupna_vsota' < '$budget' ORDER BY p DESC";
			$res = mysqli_query($con, $qu);
			while($rr = mysqli_fetch_array($con, $result)){
				$sladica_id = $rr['0'];
				$skupna_vsota += $rr['p'];
				array_push($menu, $predjed_id, $glavna_id, $sladica_id);
			}
		}
	}
	for($i=0; $i<count($menu); $i++){
		$sql_p = "SELECT id, name, image FROM recipe WHERE id='$menu[$i]' LIMIT 1";
		$priporocanje = mysqli_fetch_array(mysqli_query($con, $sql_p));
		if($i % 3 == 0){
			echo '<div class="priporocanje_container">';
		}
		echo('<a href="recipe.php?id='.$priporocanje['id'].'" class="priporocanje" style="background-image:url(\''.$priporocanje['image'].'\');">');
		echo('<span>'.$priporocanje['name'].'</span></a>'."\r\n");
		if($i % 3 == 0){
			echo '</div>';
		}
	}
	
	include("includes/footer.php");
?>