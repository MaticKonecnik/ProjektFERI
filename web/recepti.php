<?php
	include("includes/database.php");
	include("includes/header.php");
	include("includes/menu.php");
	
	
	$sql = "SELECT id, name, image, instructions FROM recipe";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	{
		echo('<article><h3><a href="recept.php?id=' . $row['id'] . '">' . $row['name'] . '</a></h3>');
		echo($row['instructions']);	
		echo('</article>');
	}
?>
		
			<div class="clear"></div>
            <div class="grid1_of_list2"><!-- start grid1_of_list2 -->
				<div class="grid1_of_list">
					<img src="images/pic2.jpg" alt="" />
					<h4>naziv recepta</h4>
				</div>
				<ul class="list2">
					<li><p>Kcal</p><span>230</span></li>
					<li><p>prawns</p> <span>12%</span></li>
					<div class="clear"></div>
				</ul>
			</div><!-- end grid1_of_list2 -->
            			

<?php
	include("includes/footer.php");
?>