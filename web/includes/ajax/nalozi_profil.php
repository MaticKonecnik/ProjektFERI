<?php
	session_start();
	include_once ("../database.php");
	
	$id = (int)$_GET['id'];
	$query = "SELECT * FROM user WHERE id = '$id'";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
?>
<table id="userProfile">
	<?php	
		//prijavljen uporabnik, lahko ureja svoj profil
		if(isset($_SESSION['login']) && $id == $_SESSION['login']){
			echo '<tr><td colspan="2"><a href="#" id="editProfile">Uredi profil</a></td></tr>';
		}
	?>
	<tr>
		<td>Ime in priimek:</td>
		<td><?php echo $row['name']." ".$row['surname']; ?></td>
	</tr>
	<tr>
		<td>E-mail:</td>
		<td><?php echo $row['email']; ?></td>
	</tr>
	<tr>
		<td>Uporabniško ime:</td>
		<td><?php echo $row['username']; ?></td>
	</tr>
	<tr>
		<td colspan="2"><img src="<?php echo $row['image']; ?>" /></td>
	</tr>

</table>
<div class="clear"></div>
<div class="priporocanje_container">
	<?php
	  $queryy="SELECT * FROM recipe WHERE tk_id_user='$id'";
	  $resultt = mysqli_query($con, $queryy);
	  while($roww = mysqli_fetch_array($resultt)){
	  echo('<a href="recipe.php?id='.$roww['id'].'" class="priporocanje" style="background-image:url(\''.$roww['image'].'\');">');
						echo('<span>'.$roww['name'].'</span></a>'."\r\n");
	  }
	?>
</div>
<div id="underlay"></div>
<div id="lightbox">	
	<div class="clear"></div>
	<div class="spans_of_2"><!-- start spans_of_2 -->
		<div class="span_of_1"><!-- start span_of_1 -->
			<div class="span_of_text">
				<h4>Urejanje profila</h4>
			</div>
			<div class="contact_form">
				<form action="javascript:void(0);" autocomplete="off">
					<span>Ime</span>
					<input type="text" class="text" name="name" id="name" value="<?php echo $row['name']; ?>" />
					<span>Priimek</span>
					<input type="text" class="text" name="surname" id="surname" value="<?php echo $row['surname']; ?>" />
					<span>Uporabniško ime</span>
					<input type="text" class="text" name="username" id="username" value="<?php echo $row['username']; ?>" />
					<span>E-mail</span>
					<input type="email" class="text" name="email" id="email" value="<?php echo $row['email']; ?>" />
					<div class="padd">
						<input type="reset" id="cancelProfile" value="Preklici" />
						<input type="submit" name="submit" id="updateProfile" value="Uredi">
						<div class="clear"></div>
					</div>
				</form>
			</div>			
		</div><!-- end span1_of_1 -->
		<div class="clear"></div>
	</div><!-- end spans_of_2 -->
</div>