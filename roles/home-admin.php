<head>
    <meta charset="utf-8">
    <title>Smart Parking System-User - Admin</title>
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
        .container2 {
            max-width: 400px;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
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
                    <a href="home-admin.php" class="nav-item nav-link active">Home</a>
                    <a href="home-admin-report.php" class="nav-item nav-link">Report and Analytics</a>
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
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Welcome back Admin!</p>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Parking Maintanence!</h1>
                    <?php
                        include_once('db.php');
                        $query = "SELECT * FROM parking WHERE availability IN ('0', '1')";
                        $result = mysqli_query($conn, $query);
                    ?>
                    <table id="customers">
                        <tr>
                            <th>Parking ID</th>
                            <th>Parking Level</th>
                            <th>Parking Zone</th>
                            <th>Maintanence?</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>  
                        <tr>
                            <td><?php echo $row['parking_id']; ?></td>
                            <td><?php echo $row['parking_level']; ?></td>
                            <td><?php echo $row['parking_zone']; ?></td>
                            <td>
                                <form action="maintanence.php" <?php echo $row['parking_id']; ?> method="POST">
                                    <input type="hidden" name="parking_id" value="<?php echo $row['parking_id']; ?>">
                                    <input class="buy-btn" type="submit" name="maintanence" value="maintanence?">
                                </form>
                            </td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
        </div>

        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Parking under Maintanence</h1>
                    <?php
                        include_once('db.php');
                        $query = "SELECT * FROM parking WHERE availability = '3'";
                        $result = mysqli_query($conn, $query);
                    ?>
                    <table id="customers">
                        <tr>
                            <th>Parking ID</th>
                            <th>Parking Level</th>
                            <th>Parking Zone</th>
                            <th>Finish Maintanence?</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                        ?>  
                        <tr>
                            <td><?php echo $row['parking_id']; ?></td>
                            <td><?php echo $row['parking_level']; ?></td>
                            <td><?php echo $row['parking_zone']; ?></td>
                            <td>
                                <form action="finish-maintain.php" <?php echo $row['parking_id']; ?> method="POST">
                                    <input type="hidden" name="parking_id" value="<?php echo $row['parking_id']; ?>">
                                    <input class="buy-btn" type="submit" name="finish" value="finish?">
                                </form>
                            </td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
        </div>


        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Account Management</h1>
                <?php
                    include_once('db.php');
                    $query="SELECT * FROM account WHERE role IN ('user', 'member')";
                    $result= mysqli_query($conn, $query);
                ?>
                    <table id="customers">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Number</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        { 
                        ?>  
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['password']; ?></td>
                            <td><?php echo $row['role']; ?></td>
                            <td><?php echo $row['num']; ?></td>
                            <td><a href="delete-acc.php?username=<?php echo $row['username']; ?>">Delete</a></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
            <br>
            <br>
            <div class="container2">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Edit Account</h1>
                    <form action="editaccount.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="text" id="gender" name="gender" placeholder="Enter gender" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <input type="text" id="role" name="role" placeholder="Enter role" required>
                        </div>
                        <div class="form-group">
                            <label for="num">Number</label>
                            <input type="text" id="num" name="num" placeholder="Enter number" required>
                        </div>
                        <button type="submit" name="submit">Save Changes</button>
                    </form>
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Parking Spot Management</h1>
                <?php
                    include_once('db.php');
                    $query="SELECT * FROM parking";
                    $result= mysqli_query($conn, $query);
                ?>
                    <table id="customers">
                        <tr>
                            <th>Parking ID</th>
                            <th>Parking Level</th>
                            <th>Parking Zone</th>
                            <th>Delete?</th>
                        </tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result))
                        { 
                        ?>  
                        <tr>
                            <td><?php echo $row['parking_id']; ?></td>
                            <td><?php echo $row['parking_level']; ?></td>
                            <td><?php echo $row['parking_zone']; ?></td>
                            <td><a href="delete-parking.php?parking_id=<?php echo $row['parking_id']; ?>">Delete</a></td>
                        </tr>
                        <?php  
                            }
                        ?>
                    </table>
            </div>
            <br>
            <br>
            <div class="container2">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Update Parking Spot</h1>
                    <form action="update-parking.php" method="POST">
                        <div class="form-group">
                            <label for="parking_id">parking id</label>
                            <input type="text" id="parking_id" name="parking_id" placeholder="Enter parking id" required>
                        </div>
                        <div class="form-group">
                            <label for="text">parking level</label>
                            <input type="text" id="parking_level" name="parking_level" placeholder="Enter parking level" required>
                        </div>
                        <div class="form-group">
                            <label for="parking_zone">parking_zone</label>
                            <input type="text" id="parking_zone" name="parking_zone" placeholder="Enter parking zone" required>
                        </div>
                        <button type="submit" name="submit">Update?</button>
                    </form>
            </div>
            <div class="container2">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Add Parking Spot</h1>
                    <form action="insert-parking.php" method="POST">
                        <div class="form-group">
                            <label for="text">parking level</label>
                            <input type="text" id="parking_level" name="parking_level" placeholder="Enter parking level" required>
                        </div>
                        <div class="form-group">
                            <label for="parking_zone">parking zone</label>
                            <input type="text" id="parking_zone" name="parking_zone" placeholder="Enter parking zone" required>
                        </div>
                        <div class="form-group">
                            <label for="parking_type">parking type</label>
                            <input type="text" id="parking_type" name="parking_type" placeholder="(0 for Normal Parking, 1 for Premium Parking)" required>
                        </div>
                        <button type="submit" name="submit">Add?</button>
                    </form>
            </div>
        </div>

        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Rate Management</h1>
                    <?php
                        include_once('db.php');
                        $query="SELECT * FROM parking_rates";
                        $result= mysqli_query($conn, $query);
                    ?>
                        <table id="customers">
                            <tr>
                                <th>Rate ID</th>
                                <th>parking time</th>
                                <th>fees day</th>
                                <th>fees end</th>
                            </tr>
                            <?php
                            while($row=mysqli_fetch_assoc($result))
                            { 
                            ?>  
                            <tr>
                                <td><?php echo $row['rate_id']; ?></td>
                                <td><?php echo $row['parking_time']; ?></td>
                                <td><?php echo $row['fees_day']; ?></td>
                                <td><?php echo $row['fees_end']; ?></td>
                            </tr>
                            <?php  
                                }
                            ?>
                        </table>
                </div>
                <br>
                <br>
                <div class="container2">
                    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Update Parking Rates</h1>
                        <form action="update-parking-rate.php" method="POST">
                            <div class="form-group">
                                <label for="rate_id">Rate ID</label>
                                <input type="text" id="rate_id" name="rate_id" placeholder="Enter rate id" required>
                            </div>
                            <div class="form-group">
                                <label for="text">Parking Time</label>
                                <input type="text" id="parking_time" name="parking_time" placeholder="Enter parking time" required>
                            </div>
                            <div class="form-group">
                                <label for="fees_day">Fees (weekday)</label>
                                <input type="text" id="fees_day" name="fees_day" placeholder="Enter new fees" required>
                            </div>
                            <div class="form-group">
                                <label for="fees_end">Fees (weekend)</label>
                                <input type="text" id="fees_end" name="fees_end" placeholder="Enter new fees" required>
                            </div>
                            <button type="submit" name="submit">Update?</button>
                        </form>
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