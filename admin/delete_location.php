<?php
include('./lib/dbcon.php'); 
 $con = dbcon(); 
if (isset($_POST['delete_location'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con,"DELETE FROM stlocation where stdev_id='$id[$i]'");
}
header("location: location.php");
}
?>