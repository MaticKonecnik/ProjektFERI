<?php
	include("includes/header.php");
	include("includes/menu.php");
	?>
    <div class="grid1_of_list2 vnesi_ceno_container"><!-- start grid1_of_list2 -->
				<div class="grid1_of_list">
					<img class="sestavi_meni_click" src="images/pic2.jpg" alt="" />
					<h4 class="sestavi_meni_click">Sestavi meni</h4>
				</div>
				<ul class="list2">
					<div class="clear"></div>
			za
            	<input type="number" min="1" id="vnesi_ceno" name="budget" value="10" required>
            €
				</ul>
			</div><!-- end grid1_of_list2 -->
    <div class="clear"></div>
    <div id="skatla_za_prikaz_menijev"></div>
    <?
	include("includes/footer.php");
?>