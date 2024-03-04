<?php
include('./lib/dbcon.php');
$con = dbcon();
if (isset($_POST['delete_user'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM admin where admin_id='$id[$i]'");
}
header("location: admin_user.php");
}
?>