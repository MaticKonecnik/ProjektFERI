<?php
session_start();
include '../database.php';
if(isset($_GET['q']))
{
    $q = $_GET['q'];
     $sql = "SELECT * FROM ingredient WHERE name LIKE '%$q%' ";
    $query = mysqli_query($con, $sql);
    $json = array();
    $stevc = 0;
    while ($row = mysqli_fetch_array($query)) {
        $json[] = array(
            'name' => $row["name"],
            'id' => $row["id"]);
        $stevc++;
       
    }
  print json_encode($json);
}
  else
 {
    $sql = "SELECT * FROM ingredient";
    $query = mysqli_query($con, $sql);
    $json = array();
    $stevc = 0;
    while ($row = mysqli_fetch_array($query)) {
        $json[] = array(
            'name' => $row["name"],
            'id' => $row["id"]);
       
    }
  print json_encode($json);
}
                         
?>