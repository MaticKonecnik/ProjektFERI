<?php
	include '../database.php';
	session_start();
	
	if(!empty($_POST['ocena']))
	{
		$id = $_POST['id'];
		$ocena = $_POST['ocena'];
		if(isset($_SESSION['login'])){
			$query = "SELECT u.id FROM user u INNER JOIN recipe r ON u.id=r.tk_id_user WHERE r.id=$id;";
			$r = mysqli_query($con, $query);
			$user_id = mysqli_fetch_row($r);
			if($_SESSION['login'] != $user_id[0]){
				$sql="UPDATE recipe SET rate = rate +'$ocena', rated = rated +1 WHERE id = $id;";
					if (!mysqli_query($con,$sql))
						 die('Napaka: ' . mysqli_error($conn));
			}
		}
		else{
			$sql="UPDATE recipe SET rate = rate +'$ocena', rated = rated +1 WHERE id = $id;";
					if (!mysqli_query($con,$sql))
						 die('Napaka: ' . mysqli_error($conn));
		}
	}

?>