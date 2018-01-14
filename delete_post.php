<?php
$dbcon=mysqli_connect("localhost","id794005_bdpackage123","bangladesh");  
mysqli_select_db($dbcon,"id794005_bdpackage123"); 

$id=$_GET['id'];

mysqli_query("delete from post where post_id='$id'")or die(mysqli_connect_errno());
header('location:complain.php');



?>