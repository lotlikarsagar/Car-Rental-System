<?php
require('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = mysqli_real_escape_string($con, $_POST['amount']);

    $username = $_SESSION['username'];
    $query_fetch_cust_id = "SELECT cust_id FROM customer WHERE username = '$username'";
    $result_fetch_cust_id = mysqli_query($con, $query_fetch_cust_id);

    if ($result_fetch_cust_id && mysqli_num_rows($result_fetch_cust_id) > 0) {
        $row = mysqli_fetch_assoc($result_fetch_cust_id);
        $cust_id = $row['cust_id'];

        $query_get_last_booking = "SELECT book_id FROM booking WHERE cust_id = '$cust_id' ORDER BY book_id DESC LIMIT 1";
        $result_last_booking = mysqli_query($con, $query_get_last_booking);

        if ($result_last_booking && mysqli_num_rows($result_last_booking) > 0) {
            $row_booking = mysqli_fetch_assoc($result_last_booking);
            $book_id = $row_booking['book_id'];

            $payment_query = "INSERT INTO payment (book_id, amount) VALUES ('$book_id', '$amount')";
            $result_payment = mysqli_query($con, $payment_query);

            

            if ($result_payment) {
                // Display a pop-up for 2 seconds
                echo '<script type="text/javascript">
                        alert("Payment successful.");
                        setTimeout(function(){
                            window.location.href = "mybooking.php";
                        }, 100);
                      </script>';
            } else {
                echo "Error: Unable to process payment. Please try again.";
            }
        } else {
            echo "Error: No booking found for this customer.";
        }
    } else {
        echo "Error: Unable to fetch customer ID. Please try again.";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <style>
        .payment-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .payment-form input[type="text"],
        .payment-form input[type="number"],
        .payment-form input[type="submit"] {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .payment-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
    if (isset($_GET['car']) && isset($_GET['price'])) {
        $carName = $_GET['car'];
        $amount = $_GET['price'];
    } else {
        echo "Error: Car details not found!";
    }
    ?>

<h1>Payment Details</h1>
<div class="payment-form">
    <h1>Payment Details</h1>
    <p>Car: <?php echo $carName; ?></p>
    <p>Price: Rs. <?php echo $amount; ?>/day</p>

    <form class="form" method="post" name="payment" onsubmit="return validateForm()">
        <label for="card_number">Card Number</label>
        <input type="text" id="card_number" name="card_number" placeholder="include (-) in each" required pattern="\d{4}-\d{4}-\d{4}-\d{4}" >
        <!-- The 'pattern' attribute enforces a 16-digit numeric input with hyphens -->
        <!-- Example: 1234-5678-9012-3456 -->

        <label for="expiry_date">Expiry Date</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required pattern="(0[1-9]|1[0-2])\/\d{2}" >
        <!-- The 'pattern' attribute enforces MM/YY format -->
        <!-- Example: 12/23 -->

        <label for="cvv">CVV</label>
        <input type="number" id="cvv" name="cvv" placeholder="CVV" required pattern="[0-9]{3}">
        <!-- The 'pattern' attribute enforces a 3-digit numeric input -->

        <input type="hidden" name="car_name" value="<?php echo $carName; ?>">
        <input type="hidden" name="amount" value="<?php echo $amount; ?>">

        <input type="submit" value="Pay Now">
    </form>
</div>

<script>
    function validateForm() {
        // Basic validation using JavaScript
        var cardNumber = document.getElementById('card_number').value;
        var expiryDate = document.getElementById('expiry_date').value;
        var cvv = document.getElementById('cvv').value;

        if (!/^\d{4}-\d{4}-\d{4}-\d{4}$/.test(cardNumber)) {
            alert("Invalid card number. Please enter a valid 16-digit numeric value with hyphens.");
            return false;
        }

        if (!/^(0[1-9]|1[0-2])\/\d{2}$/.test(expiryDate)) {
            alert("Invalid expiry date. Please enter a valid MM/YY format.");
            return false;
        }

        if (!/^[0-9]{3}$/.test(cvv)) {
            alert("Invalid CVV. Please enter a 3-digit numeric value.");
            return false;
        }

        // Additional checks can be added based on your requirements

        return true;
    }
</script>
</body>
</html>

