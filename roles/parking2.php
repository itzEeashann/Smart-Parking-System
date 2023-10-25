<?php
include('db.php'); 
if (isset($_POST['parking'])){
    $parking_id = $_POST['parking_id'];
    $car_num = $_POST['car_num'];
    $username = $_POST['username']; 
    $parking_time = $_POST['parking_time']; 

    $sql_update = "UPDATE parking SET availability='1', car_num='$car_num',username='$username', parking_time='$parking_time' WHERE parking_id = '$parking_id'";
    $run_update = mysqli_query($conn, $sql_update);
    
    if($run_update){
        $sql_insert_history = "INSERT INTO parking_history (parking_id, car_num, username, parking_time) 
                               VALUES ('$parking_id', '$car_num', '$username', '$parking_time')";
        $run_insert_history = mysqli_query($conn, $sql_insert_history);

        if($run_insert_history){
            echo "<script> 
                    alert('Success');
                    window.open('home-member.php','_self');
                  </script>";
        } else {
            echo "<script> 
                    alert('Failed to insert into parking_history');
                    window.open('home-member.php','_self');
                  </script>";
        }
    } else {
        echo "<script> 
                alert('Failed to update parking');
                window.open('home-member.php','_self');
              </script>";
    }
}
?>
