<?php
	include("includes/header.php");
	include("includes/menu.php");
	
	$sql_pogoj = "";
	if(isset($_GET['ingredient']))
	{
		$sql_pogoj .= ", has_ingredient WHERE recipe.id = has_ingredient.recipe_id";
		$sestevine = $_GET['ingredient'];
		for($i = 0, $l = count($sestevine); $i < $l; ++$i)
		{
			if( $i == 0)
				$sql_pogoj .= " AND (";
			$sql_pogoj .= "has_ingredient.ingredient_id = " . $sestevine[$i];
			if( $i < $l-1)
				$sql_pogoj .= " OR ";
		}
		$sql_pogoj .= ") GROUP BY recipe_id";
	}
	
	$limit = 25;
	$pagination_width = 4;
	$stevilo_znakov = 300;
	
	$current_page = (isset($_GET['page']) ? $_GET['page'] : 1);
	$to = $current_page * $limit;
	$from = $to - $limit;
	
	$sql = "SELECT COUNT(*) AS stevec FROM recipe $sql_pogoj";
	$row = mysqli_fetch_array(mysqli_query($con,$sql));
	$total_pages = round(((float)$row['stevec'] / (float)$limit), 0, PHP_ROUND_HALF_UP);
	
	$sql = "SELECT id, name, image, instructions FROM (SELECT recipe_id, COUNT(*) as count_ FROM recipe $sql_pogoj HAVING count_ = $l) X, recipe WHERE X.recipe_id = recipe.id LIMIT $from, $limit";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	{
		$vsebina = $row['instructions'];
		if(strlen($vsebina)>$stevilo_znakov)
		{
			$pos=strpos($vsebina, ' ', $stevilo_znakov);
			$vsebina=substr($row['instructions'],0,$pos ).'...';
		}
		?>
			<div class="span_of_2 prikaz_vseh_receptov">
				<span class="span_of_img"><a href="<?php echo('recipe.php?id='.$row['id']); ?>" title="<?php echo($row['name']); ?>"><div style="background-image:url('<?php echo($row['image']); ?>');" class="slika_vsi_recepti"></div></a></span>
				<div class="span_of_list">
					<div class="span1_of_1">
						<h4><?php echo($row['name']); ?></h4>
					</div>
					<div class="span1_of_2">
						<p><?php echo($vsebina); ?></p>
						<a class="arrow" href="<?php echo('recipe.php?id='.$row['id']); ?>"><span>Več o receptu...</span></a>
					</div>	
					<div class="clear"></div>
				</div>	
			</div>
            <div class="clear"></div>
<?php }
			echo('<div class="pagination">');		
			for ($i = 1; $i <= $total_pages; $i++) {
				 if($i==$current_page)
				 	echo('<span class="page active">'.$current_page.'</span>');
				 else
				 {
					if($i!=1 && $i!=$total_pages && $i!=$current_page && ($i > $current_page+$pagination_width || $i < $current_page-$pagination_width))
						continue;
					if($i > $current_page+$pagination_width || ($i == $current_page-$pagination_width && $current_page!=($pagination_width+1)))
						echo('<span>...</span>');
					$QS = http_build_query($_GET + array("page"=>$i));
				 	echo('<a href="'.$_SERVER['PHP_SELF'].'?' . $QS .'" class="page gradient">'.$i.'</a>');
				 }	
			}
			echo('</div>');
	
	include("includes/footer.php");
?>