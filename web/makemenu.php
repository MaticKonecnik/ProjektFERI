<?php
	include("includes/header.php");
	include("includes/menu.php");
	?>
    <div class="grid1_of_list2 vnesi_ceno_container"><!-- start grid1_of_list2 -->
				<div class="grid1_of_list">
					<img src="images/pic2.jpg" alt="" />
					<h4>Sestavi meni</h4>
				</div>
				<ul class="list2">
					<div class="clear"></div>
                    <form action="sestavimeni.php">
			za
            	<input type="number" min="1" class="vnesi_ceno" name="budget" value="10" required>
            €
     </form>
				</ul>
			</div><!-- end grid1_of_list2 -->
    <?
	include("includes/footer.php");
?>