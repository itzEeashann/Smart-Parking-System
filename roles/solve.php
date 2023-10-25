<?php
	include('db.php'); 
	if (isset($_POST['solve'])){
		$username = $_POST['username'];
		$sql = "DELETE FROM emergency WHERE username = '$username'";
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