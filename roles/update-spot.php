<?php
	include('db.php'); 
	if (isset($_POST['finish'])){
		$parking_id = $_POST['parking_id'];
		$sql = "UPDATE parking SET availability='0', parking_time='', car_num='', username='' WHERE parking_id = '$parking_id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			
			echo "<script> 
					alert('Success');
					window.open('home-guard.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
?>