				
	 				<?php 
	 				$con = dbcon();
	 				$query_yes1 = mysqli_query($con,"select * from stdevice where dev_status = 'damage'")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes1);

		
		            ?>
					<?php 
					$query_no = mysqli_query($con,"select * from stdevice where dev_status = 'none'					
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);
					
		            ?>
					
					<?php $not_read1 = $count_no -  $count_yes; ?>
