<?php
session_start();
include '../database.php';
    $sql = "SELECT temperature FROM temperature WHERE ID=1";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result))
    {
      echo($row['temperature']);
    }
mysqli_close($con);
?>