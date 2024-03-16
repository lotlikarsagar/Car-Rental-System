<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
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
            <li><a href="mybooking.php">My Booking</a></li>
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

    </header>
    <!-- home  -->
    <section class="home" id="home">
        <div class="text">
            <h1><span>Find</span> Your<br>Ideal car</h1>
            <p>Seamless travel experiences begin with the right wheels. Explore our diverse fleet and book your ideal rental car for a hassle-free getaway </p>
        </div>

        <div class="form-container">
            <form action="ride.php">
                <div class="input-box">
                     <span>Location</span>
                     <select name="Search places">
                      <option value="Search places">Search places</option>
                      <option value="Margao">Margao</option>
                      <option value="Panaji">Panaji</option>
                     </select>
                </div>
                <div class="input-box">
                     <span>Pick-Up Date</span>
                     <input type="date" name="" id="">
                </div>
                <div class="input-box">
                     <span>Return Date</span>
                     <input type="date" name="" id="">
                </div>
                <input type="submit" name="" id="" class="btn">
            </form>
        </div>
    </section> 
     
    <section class="ride" id="ride">
        <div class="heading">
            <span>How Its Work</span>
            <h1>Rent with 3 Easy Steps</h1>
            <hr>
        </div>
        <div class="ride-container">
            <div class="box">
                <i class="bx bxs-map"></i>
                <h2>Choose a location</h2>
                <p>Select your preferred destination and start your journey. Where would you like to pick up your rental car?</p>
            </div>

            <div class="box">
                <i class="bx bxs-calendar-check"></i>
                <h2>Pick-Up Date</h2>
                <p>Choose your pick-up date and embark on your adventure. When would you like to start your journey with our rental cars?</p>
            </div>

            <div class="box">
                <i class="bx bxs-calendar-star"></i>
                <h2>Book a Car</h2>
                <p>Book the perfect ride for your journey. Select your preferred car and get ready for an unforgettable experience on the road.</p>
            </div>
        </div>
    </section>

   <section class="gallery" id="gallery">
    <div class="heading">
        <h1>Available Cars</h1>
        <hr>
    </div>
    <div class="img-gallery">
            <img src="img/img1.png">
            <img src="img/img2.png">
            <img src="img/img3.png">
            <img src="img/img4.png">
            <img src="img/img5.png">
            <img src="img/img6.png">
            <img src="img/img7.png">
            <img src="img/img8.png">
            <img src="img/img9.png">
    </div>
    </section>
    <div class="container">
        <div class="contact_data2">
          <ul>
            <li>
              <i class="fa-solid fa-location-dot"></i>
              <strong>Location:</strong>
              <p>Cuncolim, India</p>
            </li>
            <li>
              <i class="fa-solid fa-envelope"></i>
              <strong>Email:</strong>
              <p>car@gmail.com</p>
            </li>
            <li>
              <i class="fa-solid fa-phone"></i>  
              <strong>Call:</strong>
              <p>+91 9876543210</p>
            </li>
          </ul>
          <div class="map">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d345.2955376730371!2d73.99716869375364!3d15.182196677410582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bbe4d21564a2b73%3A0x3eea0880e6f75ecc!2sCuncolim%2C%20Goa!5e0!3m2!1sen!2sin!4v1694242320054!5m2!1sen!2sin"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
        <div class="contact_data">
          <h2>Contact Me</h2>
          <form action="#">
            <label for="">Name</label>
            <input type="text" />
            <label for="">Email</label>
            <input type="email" />
            <label for="">Subject</label>
            <input type="text" />
            <label for="">Message</label>
            <textarea name="" id="" cols="30" rows="05"></textarea>
            <button>Send Message</button>
          </form>
        </div>
      </div>

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