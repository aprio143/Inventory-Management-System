<?php
        include('admin/lib/dbcon.php');
		$con = dbcon(); 
		session_start();	
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		/*................................................ admin .....................................................*/
			$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
			$result = mysqli_query($con, $query)or die(mysqli_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
			
		/*...................................................Technical Staff ..............................................*/
		$query_client = mysqli_query($con, "SELECT * FROM client WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$num_row_client = mysqli_num_rows($query_client);
		$row_client = mysqli_fetch_array($query_client);
		
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['admin_id'];
		echo 'true_admin';
		
		mysqli_query($con, "insert into user_log (username,login_date,admin_id)values('$username',NOW(),".$row['admin_id'].")")or die(mysqli_error());
		
		}else if ($num_row_client > 0){
		$_SESSION['client']=$row_client['client_id'];
		echo 'true';
		
		mysqli_query($con, "insert into user_log (username,login_date,client_id)values('$username',NOW(),".$row_client['client_id'].")")or die(mysqli_error());
		
		 }else{ 
				echo 'false';
		}	
				
		?>