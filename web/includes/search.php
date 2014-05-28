<?php
session_start();
include '../database.php';
$trazi=$_POST['isci'];
$sql = "SELECT id, name, image, instructions FROM recipe WHERE name LIKE '$trazi'";
$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result))
	{
		$vsebina = $row['instructions'];
		$stevilo_znakov = 300;
		if(strlen($vsebina)>$stevilo_znakov)
			$pos=strpos($vsebina, ' ', $stevilo_znakov); $vsebina=substr($row['instructions'],0,$pos ).'...';
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
mysqli_close($con);
?>