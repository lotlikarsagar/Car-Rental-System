<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- css link -->
    <link rel="stylesheet" href="services.css">
    <!-- Box icon -->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <script src="https://kit.fontawesome.com/20af9b7f0f.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header>
        <a href="#" class="logo"><img src="img/jeep.png" alt=""></a>
        <h4>Car Rent</h4>
    
        <div class="bx bx-menu" id="menu-icon"></div>
    
        <ul class="navbar">
            <li><a href="home.php">Home</a></li>
            <li><a href="ride.php">Ride</a></li>
            <li><a href="services.php">Service</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="reviews.php">Review</a></li>
        </ul>
        <div class="header-btn">
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo "Welcome, $username! <a href='logout.php'>Logout</a>";
            } else {
                echo "<a href='login_page.php' class='sign-up'>Login</a>
                      <a href='sign_up.php' class='sign-in'>Sign In</a>
                      <a href='emp_login.php' class='admin'>Admin</a>";
            }
            ?>
        </div>
    </header>
     
     <br><br> 
     
      <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">
                <h3>150++</h3>
                <p>Branches</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-car"></i>
            <div class="content">
                <h3>4770++</h3>
                <p>Cars Sold</p>
            </div>
        </div>
        
        <div class="icons">
            <i class="fas fa-users"></i>
            <div class="content">
                <h3>590++</h3>
                <p>Happy Clients</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-car"></i>
            <div class="content">
                <h3>890++</h3>
                <p>New Cars</p>
            </div>
        </div>
    </section>
    
    <section class="service">
        <h1>Our Services</h1>
        <hr>
        <div class="row">
            <div class="service-col">
                <h3>Car Selling</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. hic, earum?</p>
            </div>
            <div class="service-col">
                <h3>Car Insurance</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. hic, earum?</p>
            </div>
            <div class="service-col">
                <h3>24/7 Support</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. hic, earum?</p>
            </div>
        </div>
    </section>
        


      <div class="copyright">
        <p>&#169 Carrent All Right Reserved</p>
        <div class="social">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
      </div>

    <script type="text/javascript" src="main.js"></script>
</body>
</html>

   


    