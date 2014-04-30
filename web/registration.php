<?php
	include("includes/header.php");
	include("includes/menu.php");
	include_once ("includes/database.php");
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$email = $_POST['email'];
		
		$query = sprintf("INSERT INTO user(username, password, name, surname, email) VALUES('%s', '%s', '%s', '%s', '%s')",
				mysqli_real_escape_string($con, $username),
				mysqli_real_escape_string($con, $password),
				mysqli_real_escape_string($con, $name),
				mysqli_real_escape_string($con, $surname),
				mysqli_real_escape_string($con, $email));
				
		
		if(mysqli_query($con, $query)){
			//preusmeritev na prijavo, ker je zapis v bazo uspešen
			header("Location: login.php");
		}
		else{
			die("Registracija neuspešna!".mysqli_error($con));
		}
	}
?>
	<div class="clear"></div>
	<div class="spans_of_2"><!-- start spans_of_2 -->
		<div class="span_of_1"><!-- start span_of_1 -->
			<div class="span_of_text">
				<h4>Registracija</h4>
			</div>
			<div class="contact_form">
				<form method="post" autocomplete="off">
					<span>Ime</span>
					<input type="text" class="text" name="name" placeholder="Micka" required>
					<span>Priimek</span>
					<input type="text" class="text" name="surname" placeholder="Pungartnik" required>
					<span>Uporabniško ime</span>
					<input type="text" class="text" name="username" placeholder="pMicka" autocomplete="off" required>
					<span>Geslo</span>
					<input type="password" class="text" name="password" placeholder="•••••••" required>
					<span id="validate"></span>
					<span>Ponovite geslo</span>
					<input type="password" class="text" name="password2" placeholder="•••••••" required disabled>
					<span>E-mail</span>
					<input type="email" class="text" name="email" placeholder="mpungartnik@gmail.com" required>
					
					<div>
						<input type="reset" value="Preklici">
						<input type="submit" name="submit" value="Registriraj">
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