<?php
	include('db.php'); 
	if (isset($_POST['maintanence'])){
		$parking_id = $_POST['parking_id'];
		$sql = "UPDATE parking SET availability='3' WHERE parking_id = '$parking_id'";
		$run = mysqli_query($conn,$sql);
		if($run == true){
			echo "<script> 
					alert('Success');
					window.open('home-admin.php','_self');
				  </script>";
		}else{
			echo "<script> 
			alert('Failed');
			</script>";
		}
	}
?>
