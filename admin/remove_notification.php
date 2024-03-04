<?php include('./lib/dbcon.php'); 
$con = dbcon(); ?>
<?php
$id = $_POST['id'];
mysqli_query($con,"delete from notification where notification_id = '$id'")or die(mysqli_error());
?>

