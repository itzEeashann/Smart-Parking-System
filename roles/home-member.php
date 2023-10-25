<head>
    <meta charset="utf-8">
    <title>Smart Parking System-User - User</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
<body>
     <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        </div>
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Smart Parking System</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="home-user.php" class="nav-item nav-link active">Home</a>
                </div>
                <a href="../logout.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Log Out<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <?php 
            include('db.php'); 
            include('session.php'); 
            if (isset($_SESSION['username'])) {
                $result = mysqli_query($conn,"select * from account where username='".$_SESSION['username']."'");
                $row = mysqli_fetch_array($result);
            }
        ?>
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Welcome <b><?php echo $_SESSION['username'];?></b></h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome back Member! Park you car using our system! </p>
                                    <a href="#park" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Park my Car!</a>
                                    <form action="emergency2.php" <?php echo $_SESSION['username'];?> method="POST">
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                                        <input class="btn btn-secondary py-md-3 px-md-5 animated slideInRight" type="submit" name="emergency" value="Emergency?">
                                    </form>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form action="search.php" method="POST" class="row g-2">                  
                    <input type="text" class="form-control border-0" placeholder="Enter your Car Number to find your Car!" name="car_num" name="car_num" value="" required/>
                    <input class="btn btn-dark border-0 w-100" type="submit" name="search" value="Search?">
                </form>
            </div>
        </div>
        <!-- Search End -->
        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Our Parking Rates</h1>
                <?php
                    include_once('db.php');
                    $query="SELECT * FROM parking_rates WHERE category='member'";
                    $result= mysqli_query($conn, $query);
                ?>
                    <table id="customers">
                        <tr>
                            <th>Parking Time</th>
                            <th>Fees (Weekday)</th>
                            <th>Fees (Weekend/ PH)</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        { 
                        ?>  
                        <tr>
                            <td><?php echo $row['parking_time']; ?></td>
                            <td><?php echo $row['fees_day']; ?></td>
                            <td><?php echo $row['fees_end']; ?></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Park your Car in our Normal Parking!</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <?php
                        include_once('db.php');
                        $query = "SELECT * FROM parking WHERE availability='0' AND parking_type='0'";
                        $result = mysqli_query($conn, $query);
                        while($row=mysqli_fetch_assoc($result))
                        {
                    ?>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center"><div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['parking_id'];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['parking_level'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['parking_zone'];?></span>                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <form action="parking2.php" <?php echo $row['parking_id']; ?> method="POST">
                                                <input type="hidden" name="parking_id" value="<?php echo $row['parking_id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                                                <input type="text" name="car_num" placeholder="Enter your Car Number" required>
                                                <input type="hidden" name="parking_time" 
                                                value="                                          
                                                <?php
                                                $current_time = date('H:i:s');
                                                echo "$current_time";
                                                ?>">
                                                <input class="btn btn-primary" type="submit" name="parking" value="Park?">
                                            </form>
                                        </div>
                                        <small class="text-truncate">
                                            <i class="far fa-calendar-alt text-primary me-2"></i>
                                            <?php
                                                $current_time = date('H:i:s');
                                                echo "Current time is: $current_time";
                                            ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php  
                            }
                            ?>
                        </div>
                        <?php
                            include_once('db.php');
                            $query = "SELECT * FROM parking WHERE availability='0' AND parking_type='1'";
                            $result = mysqli_query($conn, $query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                        ?>
                        <div id="tab-2" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center"><div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['parking_id'];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['parking_level'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['parking_zone'];?></span>                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <form action="parking.php" <?php echo $row['parking_id']; ?> method="POST">
                                                <input type="hidden" name="parking_id" value="<?php echo $row['parking_id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                                                <input type="text" name="car_num" placeholder="Enter your Car Number" required>
                                                <input type="hidden" name="parking_time" 
                                                value="                                          
                                                <?php
                                                $current_time = date('H:i:s');
                                                echo "$current_time";
                                                ?>">
                                                <input class="btn btn-primary" type="submit" name="parking" value="Park?">
                                            </form>
                                        </div>
                                        <small class="text-truncate">
                                            <i class="far fa-calendar-alt text-primary me-2"></i>
                                            <?php
                                                $current_time = date('H:i:s');
                                                echo "Current time is: $current_time";
                                            ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php  
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Park your Car in our Premium Parking!</h1>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="tab-content">
                        <?php
                            include_once('db.php');
                            $query = "SELECT * FROM parking WHERE availability='0' AND parking_type='1'";
                            $result = mysqli_query($conn, $query);
                            while($row=mysqli_fetch_assoc($result))
                            {
                        ?>
                        <div id="tab-2" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center"><div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row['parking_id'];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row['parking_level'];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i><?php echo $row['parking_zone'];?></span>                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <form action="parking2.php" <?php echo $row['parking_id']; ?> method="POST">
                                                <input type="hidden" name="parking_id" value="<?php echo $row['parking_id']; ?>">
                                                <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                                                <input type="text" name="car_num" placeholder="Enter your Car Number" required>
                                                <input type="hidden" name="parking_time" 
                                                value="                                          
                                                <?php
                                                $current_time = date('H:i:s');
                                                echo "$current_time";
                                                ?>">
                                                <input class="btn btn-primary" type="submit" name="parking" value="Park?">
                                            </form>
                                        </div>
                                        <small class="text-truncate">
                                            <i class="far fa-calendar-alt text-primary me-2"></i>
                                            <?php
                                                $current_time = date('H:i:s');
                                                echo "Current time is: $current_time";
                                            ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php  
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">View Parking History</h1>
            <?php
                include_once('db.php');
                $query="SELECT * FROM parking_history WHERE username='".$_SESSION['username']."' ";
                $result= mysqli_query($conn, $query);
            ?> 
                    <table id="customers">
                        <tr>
                            <th>Parking ID</th>
                            <th>Car Number</th>
                            <th>Username</th>
                            <th>Parking Time</th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_assoc($result))
                            {
                        ?>
                        <tr>
                            <td><?php echo $row['parking_id']; ?></td>
                            <td><?php echo $row['car_num']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['parking_time']; ?></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
        </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Smart Parking System</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>