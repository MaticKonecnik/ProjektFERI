<?php
	include("includes/header.php");
	include("includes/menu.php");
?>
	<div class="clear"></div>
		<div class="spans_of_2"><!-- start spans_of_2 -->
			<div class="span_of_1"><!-- start span_of_1 -->
				<div class="span_of_text">
					<h4>Prijava</h4>
				</div>
				<div class="contact_form">
					<form method="post" action="php/registration.php" autocomplete="off">
                   	    <span>Uporabniško ime</span>
						<input type="text" class="text" name="username" placeholder="pMicka" autocomplete="off" required>
                        <span>Geslo</span>
						<input type="password" class="text" name="password" placeholder="•••••••" required>
						<span id="validate"></span>
						<span>E-mail</span>
						<input type="email" class="text" name="email" placeholder="mpungartnik@gmail.com" required>
						<div>
							<input type="reset" value="Preklici">
							<input type="submit" value="Prijavi se">
							<div class="clear"></div>
						</div>
					</form>
				</div>			
			</div><!-- end span1_of_1 -->
			<div class="clear"></div>
		</div><!-- end spans_of_2 -->


<?php
	include("includes/footer.php");
?>