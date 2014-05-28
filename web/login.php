<?php
	error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	include("includes/header.php");
	include("includes/menu.php");
	include_once ("includes/database.php");
	$submit=isset($_POST['submit']);
	
	if($submit){
	$email=$_POST['email'];
	$password=hash('sha512', $_POST['password']);
		$sql="SELECT id, password FROM user WHERE email='$email'";
		$query= mysqli_query($con, $sql);
		$rezultat=mysqli_num_rows($query);
		if ($rezultat>0){
			while($row=mysqli_fetch_assoc($query)){
				$dbpassword=$row['password'];
				if($dbpassword==$password){
					$id=$row['id'];
					$_SESSION["login"]=$id;
					header('Location: index.php');
				}
				else{
					$message="Napačno geslo!<br><br>";
				}
			}
		}
		else{
		 $message="Niste registrirani!<br><br>";
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
						<input type="email" class="text" name="email" placeholder="example@example.com" required autofocus>
                        <span>Geslo</span>
						<input type="password" class="text" name="password" placeholder="•••••••" required>
						<span id="validate"></span>
						<?php if (isset($message)) echo $message ?>
						<input type="submit" value="Prijavi se" name="submit">
							<div class="clear"></div>
					</form>
				</div>			
			</div><!-- end span1_of_1 -->
			<div class="clear"></div>
		</div><!-- end spans_of_2 -->
<?php
	include("includes/footer.php");
?>