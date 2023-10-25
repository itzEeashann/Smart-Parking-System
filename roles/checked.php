<?php
	include('db.php'); 
	if (isset($_POST['finish'])){
		$username = $_POST['username'];
		$sql = "UPDATE parking_proof SET checked='1' WHERE username = '$username'";
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