<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="reviews.css">
    <link rel="stylesheet" href="style.css">
    <!-- Box icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://kit.fontawesome.com/20af9b7f0f.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        /* .header-btn a {
            margin-left: 10px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        } */

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
    </style>
</head>
<body>
   
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
    <?php
require('db.php');
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query_fetch_cust_id = "SELECT cust_id FROM customer WHERE username = '$username'";
    $result_fetch_cust_id = mysqli_query($con, $query_fetch_cust_id);

    if ($result_fetch_cust_id && mysqli_num_rows($result_fetch_cust_id) > 0) {
        $row = mysqli_fetch_assoc($result_fetch_cust_id);
        $cust_id = $row['cust_id'];

        $query_fetch_bookings = "SELECT b.*, c.car_name, p.amount
                                 FROM booking b
                                 JOIN car c ON b.car_id = c.car_id
                                 LEFT JOIN payment p ON b.book_id = p.book_id
                                 WHERE b.cust_id = '$cust_id'";
        $result_fetch_bookings = mysqli_query($con, $query_fetch_bookings);

        if ($result_fetch_bookings && mysqli_num_rows($result_fetch_bookings) > 0) {
            echo "<h2>Your Bookings:</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Booking ID</th><th>Car Name</th><th>Booking Date</th><th>Pickup Date</th><th>Return Date</th><th>Booking Place</th><th>Amount</th></tr>";

            while ($booking_row = mysqli_fetch_assoc($result_fetch_bookings)) {
                echo "<tr>";
                echo "<td>" . $booking_row['book_id'] . "</td>";
                echo "<td>" . $booking_row['car_name'] . "</td>";
                echo "<td>" . $booking_row['book_date'] . "</td>";
                echo "<td>" . $booking_row['pickup_date'] . "</td>";
                echo "<td>" . $booking_row['return_date'] . "</td>";
                echo "<td>" . $booking_row['book_place'] . "</td>";
                echo "<td>" . $booking_row['amount'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "You have no bookings.";
        }
    } else {
        echo "Error: Unable to fetch customer ID. Please try again.";
    }
} else {
    echo "Session not found. Please log in.";
}
?>