<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <script>
    function validateForm(arrivalId, departureId) {
        var arrivalDate = document.getElementById(arrivalId).value;
        var departureDate = document.getElementById(departureId).value;

        if (arrivalDate >= departureDate) {
            alert('return date must be greater than pickup date.');
            return false;
        }

        return true;
    }
</script>

    <!-- css link -->
    <link rel="stylesheet" href="ride.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/20af9b7f0f.js" crossorigin="anonymous"></script>
</head>
<body>


<?php
require('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $car_price_per_day = $_POST['car_price_per_day'];

    $start = new DateTime($pickup_date);
    $end = new DateTime($return_date);
    $interval = $start->diff($end);
    $num_days = $interval->days;

    $price = $num_days * $car_price_per_day;

    // Display total cost
    echo "Total cost for the selected period: Rs. " . $price;

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query_fetch_cust_id = "SELECT cust_id FROM customer WHERE username = '$username'";
        $result_fetch_cust_id = mysqli_query($con, $query_fetch_cust_id);

        if ($result_fetch_cust_id && mysqli_num_rows($result_fetch_cust_id) > 0) {
            $row = mysqli_fetch_assoc($result_fetch_cust_id);
            $cust_id = $row['cust_id'];

            $date = date('Y-m-d');
            $pickup_date = mysqli_real_escape_string($con, $pickup_date);
            $return_date = mysqli_real_escape_string($con, $return_date);
            $place = mysqli_real_escape_string($con, $_POST['place']);
            $car_id = mysqli_real_escape_string($con, $_POST['car_id']);

            // Check car availability
            $query_check_availability = "SELECT status FROM car WHERE car_id = '$car_id' AND status = 'Available'";
            $result_check_availability = mysqli_query($con, $query_check_availability);

            if ($result_check_availability && mysqli_num_rows($result_check_availability) > 0) {
                // Car is available, proceed with booking
                $query2 = "INSERT INTO booking (car_id, cust_id, book_date, pickup_date, return_date, book_place) 
                           VALUES ('$car_id', '$cust_id', NOW(), '$pickup_date', '$return_date', '$place')";
                $result2 = mysqli_query($con, $query2);

                if ($result2) {
                    // Get the book_id of the inserted booking
                    $book_id = mysqli_insert_id($con);

                    // Insert data into book_details
                    $query_insert_book_details = "INSERT INTO book_details (book_id, car_id) 
                                                  VALUES ('$book_id', '$car_id')";
                    mysqli_query($con, $query_insert_book_details);

                    // Update car status to 'Not Available'
                    $query_update_status = "UPDATE car SET status = 'Not Available' WHERE car_id = '$car_id'";
                    mysqli_query($con, $query_update_status);

                    header("Location: payment.php?car=$car_id&price=$price");
                    exit();
                } else {
                    echo "Error: Unable to book. Please try again.";
                }
            } else {
                // Car is not available
                echo "Error: The selected car is not available for the specified dates.";
            }
        } else {
            echo "Error: Unable to fetch customer ID. Please try again.";
        }
    } else {
        echo "Session not found. Please log in.";
    }
}
?>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $pickup_date = $_POST['pickup_date'];
    $return_date = $_POST['return_date'];
    $car_price_per_day = 5000; 

    // Calculating the number of days
    $start = new DateTime($pickup_date);
    $end = new DateTime($return_date);
    $interval = $start->diff($end);
    $num_days = $interval->days;

  
    $price = $num_days * $car_price_per_day;

    
    echo "Total cost for the selected period: Rs. " . $price;
   
}
?>





    
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
            <!-- <a href="login_page.php" class="sign-up">Login</a>
            <a href="sign_up.php" class="sign-in">Sign In</a> -->
            <a href="emp_login.php" class="admin">Admin</a>
            <?php
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

    <section class="services" id="services">
    <div class="heading">
        <span>Best Services</span>
        <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
    </div>

    <div class="services-container">

<div class="box">
    <div class="box-img">
        <img src="img/thar.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Mahindra Thar</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.7000<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 1; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>


<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_1', 'return_date_1');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_1" required>
        <input type="hidden" name="car_id" value="1">
        <input type="hidden" name="car_price_per_day" value="7000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_1" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>

</div>





<div class="box">
    <div class="box-img">
        <img src="img/nexon.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Tata Nexon</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.6000<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 2; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>


<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_2', 'return_date_2');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_2" required>
        <input type="hidden" name="car_id" value="2">
        <input type="hidden" name="car_price_per_day" value="6000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_2" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>

</div>













<div class="box">
    <div class="box-img">
        <img src="img/mah.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Mahindra XUV700</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.4000<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 3; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>





<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_3', 'return_date_3');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_3" required>
        <input type="hidden" name="car_id" value="3">
        <input type="hidden" name="car_price_per_day" value="4000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_3" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>
</div>

<div class="box">
    <div class="box-img">
        <img src="img/scorpio.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Mahindra Scorpio N</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.3000<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 4; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>


<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_4', 'return_date_4');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_4" required>
        <input type="hidden" name="car_id" value="4">
        <input type="hidden" name="car_price_per_day" value="7000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_4" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>
</div>
<div class="box">
    <div class="box-img">
        <img src="img/harrier.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Tata Harrier</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.5000<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 5; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>


<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_5', 'return_date_5');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_5" required>
        <input type="hidden" name="car_id" value="5">
        <input type="hidden" name="car_price_per_day" value="7000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_5" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>
</div>
<div class="box">
    <div class="box-img">
        <img src="img/skoda.jpg" alt="">
    </div>
    <p>2023</p>
    <h3>Skoda Kushaq</h3>
    <h3>capacity: 4</h3>
    <h2>Rs.4500<span>/day</span></h2>

    <?php
    // Fetch car status from the database based on car_id
    $car_id = 6; // You can get this dynamically from your form or database
    $query_fetch_car_status = "SELECT status FROM car WHERE car_id = '$car_id'";
    $result_fetch_car_status = mysqli_query($con, $query_fetch_car_status);

    $carStatus = ''; // Initialize with an empty string

    if ($result_fetch_car_status && mysqli_num_rows($result_fetch_car_status) > 0) {
        $row_car_status = mysqli_fetch_assoc($result_fetch_car_status);
        $carStatus = $row_car_status['status'];
    } else {
        $carStatus = 'Unknown';
    }
    ?>

<div style="border: 1px solid red; padding: 10px; display: inline-block;">
    <a style="color: red; text-decoration: none;" href="#">
        Status: <?php echo $carStatus; ?>
    </a>
</div>

<form class="form" method="post" name="payment" onsubmit="return validateForm('pickup_date_6', 'return_date_6');">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <h3>pickup date:</h3>
        <input type="date" name="pickup_date" id="pickup_date_6" required>
        <input type="hidden" name="car_id" value="6">
        <input type="hidden" name="car_price_per_day" value="7000">
        <br>
        <h3>return date:</h3>
        <input type="date" name="return_date" id="return_date_6" required>
        <h3>
            <label for="place">Select a Place:</label>
        </h3>
        <select id="place" class="login-input" name="place">
            <option value="Margoa">Margoa</option>
            <option value="Panaji">Panaji</option>
            <option value="Mapusa">Mapusa</option>
        </select>
        <input type="submit" value="Submit" class="btn">
    </form>
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


  </form>
</body>
</html>