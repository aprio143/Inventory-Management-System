<?php
include('../admin/lib/dbcon.php');
include('session.php');
$get_id = $_GET['id'];
 	$con = dbcon(); 
	$query = mysqli_query($con,"select * from stdevice 
		LEFT JOIN device_name ON stdevice.dev_id=device_name.dev_id
		where id = '$get_id'")or die(mysqli_error());
		$row = mysqli_fetch_array($query);
?>
<div class="hide">									
	<form class="form-horizontal" method="post">
									 
	<div class="control-group">
	  <label class="control-label" for="inputEmail">Device Name</label>
		<div class="controls">			
			<select id="qtype" name="dev_id" readonly="readonly" required>

			<option value="<?php echo $row['dev_id']; ?>" ><?php echo $row['dev_name']; ?></option>
				<?php
				$device_query = mysqli_query($con,"select * from device_name")or die(mysqli_error());
				while($query_device_row = mysqli_fetch_array($device_query)){
				$dev_name = $row['dev_name'];
				?>
				<option value="<?php echo $query_device_row['dev_id']; ?>"><?php echo $query_device_row['dev_name'];  ?></option>
				<?php } ?>

				</select>
			</div>
      </div>
<div class="control-group">
	  <label class="control-label" for="inputEmail">Device Serial</label>
		<div class="controls">			
			<select id="qtype" name="dev_serial" readonly="readonly" required>

			<option value="<?php echo $row['id']; ?>" ><?php echo $row['dev_serial']; ?></option>
				<?php
				$device_query = mysqli_query($con,"select * from stdevice")or die(mysqli_error());
				while($query_device_row = mysqli_fetch_array($device_query)){
				$dev_serial = $row['dev_serial'];
				?>
				<option value="<?php echo $query_device_row['id']; ?>"><?php echo $query_device_row['dev_serial'];  ?></option>
				<?php } ?>

				</select>
			</div>
      </div>	  
</form>
</div>
<?php 
mysqli_query($con,"update stdevice set dev_status='Repaired' where id = '$get_id'")or die(mysqli_error());
mysqli_query($con,"insert into notification (fullname,notification,date_of_notification,link) 
			value('$client_fullname','Repair $dev_name, Serial Number: $dev_serial' ,NOW(), 'device_stocks.php')")or die(mysqli_error());					
header('location:damage.php');
?>	