<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- css link -->
    <link rel="stylesheet" href="reviews.css">
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
        <h1>Customer Reviews</h1>
        <em>See why our car rental service is highly acclaimed. Read some of the fantastic reviews from our valued customers.Our customers have shared their outstanding car rental stories. Now, it's your turn to add to the praise.</em>
    </section>
    <div class="reviews">
        <div class="review">
            <img src="img/c1.jpg" alt="Customer 1">
            <h2>Raj aggarwal</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9734;</span>
            </div>
            <p>Had a fantastic car rental experience! The vehicle was clean and in great condition. Will definitely rent from them again.</p>
        </div>

        <div class="review">
            <img src="img/c2.jpg" alt="Customer 2">
            <h2>Yash sharma</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <p>Excellent service! The staff was friendly, and the car selection was great. Highly recommend.</p>
        </div>
        <div class="review">
            <img src="img/c3.jpg" alt="Customer 3">
            <h2>Yuvraj dessai</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <p>Excellent service! The staff was friendly, and the car selection was great. Highly recommend.</p>
        </div>
        <br>
        <div class="review">
            <img src="img/c4.jpg" alt="Customer 3">
            <h2>Gaurav</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <p>I must say it was an outstanding experience from start to finish</p>
        </div>
        <div class="review">
            <img src="img/c5.jpg" alt="Customer 3">
            <h2>Harish</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <p>The selection of cars was impressive, and I was able to choose a vehicle that perfectly suited my needs.</p>
        </div>
        <div class="review">
            <img src="img/c6.jpg" alt="Customer 3">
            <h2>Karan</h2>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
            </div>
            <p>Throughout my rental period, the car performed flawlessly, and I had no issues whatsoever. Returning the vehicle was equally easy, and the staff made sure to check it in promptly</p>
        </div>

        <!-- Add more reviews here -->
    </div>

    <div class="add-review">
        <center>
            <h2>Add Your Review</h2>
        </center>
        <form action="submit_review.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="rating">Rating:</label>
            <select id="rating" name="rating" required>
                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                <option value="4">&#9733;&#9733;&#9733;&#9733;&#9734;</option>
                <option value="3">&#9733;&#9733;&#9733;&#9734;&#9734;</option>
                <option value="2">&#9733;&#9733;&#9734;&#9734;&#9734;</option>
                <option value="1">&#9733;&#9734;&#9734;&#9734;&#9734;</option>
            </select>
            <br>
            <label for="review">Review:</label>
            <textarea id="review" name="review" rows="4" required></textarea>
            <br>
            <button type="submit">Submit Review</button>
            
        </form>
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