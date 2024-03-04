				
	 				<?php 
					$con = dbcon();
					$query_yes = mysqli_query($con,"select * from notification order by notification.date_of_notification DESC")or die(mysqli_error());
					$count_no = mysqli_num_rows($query_yes);
		            ?>
					
					<?php 
					$query_no = mysqli_query($con,"select * from notification 
					LEFT JOIN notification_read ON notification_read.notification_id = notification.notification_id
					where notification_read.admin_id  = '$session_id'
					")or die(mysqli_error());
					$count_yes = mysqli_num_rows($query_no);					
		            ?>
					
					<?php $not_read = $count_no -  $count_yes; ?>
