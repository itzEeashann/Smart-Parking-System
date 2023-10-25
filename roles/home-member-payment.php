<head>
    <meta charset="utf-8">
    <title>Smart Parking System-User - Member</title>
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
                    <a href="home-member.php" class="nav-item nav-link">Home</a>
                    <a href="home-member-payment.php" class="nav-item nav-link active">Payment</a>
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
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome back Member! Pay for your parking here! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->
        <!-- Category Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Your Current Parking</h1>
                <?php
                    include_once('db.php');
                    $query="SELECT * FROM parking WHERE username='".$_SESSION['username']."'";
                    $result= mysqli_query($conn, $query);
                ?>
                    <table id="customers">
                        <tr>
                            <th>Parking Level</th>
                            <th>Parking Zone</th>
                            <th>Parking Time</th>
                            <th>Car Number</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        { 
                        ?>  
                        <tr>
                            <td><?php echo $row['parking_level']; ?></td>
                            <td><?php echo $row['parking_zone']; ?></td>
                            <td><?php echo $row['parking_time']; ?></td>
                            <td><?php echo $row['car_num']; ?></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Pay for you Parking</h1>
                <img style="margin: 0 auto;display: block;" src="qr.png" alt="Existing Image" width="300">
                <form action="upload-member.php" enctype="multipart/form-data" method="post" <?php echo $_SESSION['username'];?>>
                    <input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>">
                    <input style="margin: 0 auto;display: block;" type="file" name="pic" required>
                    <br>
                    <input style="margin: 0 auto;display: block;" type="submit" value="Upload Image">
                </form>
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