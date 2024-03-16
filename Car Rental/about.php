<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- css link -->
    <link rel="stylesheet" href="about.css">
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
     <section class="about" id="about">
         <div class="heading">
             <h1>ABOUT US </h1>
             <h3>Best Customer Experience </h3> 
        </div>
      </section>
         <div class="about-container">
             <div class="about-img">
                 <img src="img/about.png" alt="">
              </div>
             <div class="about-text">
                 <span>About Us</span>
                 <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. hic, earum?</p>
                 <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. hic, earum?</p> 
                 <a href="home.html" class="btn">Learn More</a>
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