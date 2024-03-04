<?php
include('./lib/dbcon.php');
$con = dbcon();
if (isset($_POST['delete_client'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM client where client_id='$id[$i]'");
}
header("location: client_user.php");
}
?>