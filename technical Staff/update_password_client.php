 <?php
 include('../admin/lib/dbcon.php'); 
 $con = dbcon(); 
 include('session.php');
 $new_password  = $_POST['new_password'];
 mysqli_query($con,"update client set password = '$new_password' where client_id = '$session_id'")or die(mysqli_error());
 ?>