<?php
	include("includes/header.php");
	include("includes/menu.php");
	include_once ("includes/database.php");
	session_start();
	$submit=isset($_POST['submit']);
	
	if($submit){
	$email=$_POST['email'];
	$password=$_POST['password'];
		$sql="SELECT name, surname, password FROM user WHERE email='$email'";
		$query= mysqli_query($con, $sql);
		$rezultat=mysqli_num_rows($query);
		if ($rezultat>0){
			while($row=mysqli_fetch_assoc($query)){
				$dbpassword=$row['password'];
				if($dbpassword==$password){
					$_SESSION["login"]=$email;
					header('Location: index.php');
				}
				else{
					echo "Napačno geslo!";
				}
			}
		}
	}
?>
	<div class="clear"></div>
		<div class="spans_of_2"><!-- start spans_of_2 -->
			<div class="span_of_1 login_form"><!-- start span_of_1 -->
				<div class="span_of_text">
					<h4>Prijava</h4>
				</div>
				<div class="contact_form">
					<form method="post" autocomplete="off">
						<span>E-mail</span>
						<input type="email" class="text" name="email" placeholder="example@example.com" required>
                        <span>Geslo</span>
						<input type="password" class="text" name="password" placeholder="•••••••" required>
						<span id="validate"></span>
						<div>
							<input type="reset" value="Preklici">
							<input type="submit" value="Prijavi se" name="submit">
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