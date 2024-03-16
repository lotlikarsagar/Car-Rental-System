<?php
include_once "../config/dbconnect.php"; // Adjust the path accordingly

// Fetch total earnings per car
$sqlCarEarnings = "SELECT
        car.car_id,
        car.car_name,
        COUNT(booking.book_id) AS total_bookings,
        SUM(payment.amount) AS total_amount
    FROM
        car
    LEFT JOIN booking ON car.car_id = booking.car_id
    LEFT JOIN payment ON booking.book_id = payment.book_id
    GROUP BY
        car.car_id, car.car_name
    ORDER BY
        total_amount desc;
";

$resultCarEarnings = $conn->query($sqlCarEarnings);

// Display total earnings per car
if ($resultCarEarnings->num_rows > 0) {
    $totalCarEarning = 0; // Initialize total car earning

    echo "<h2>Total Earnings per Car</h2>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Car ID</th>";
    echo "<th>Car Name</th>";
    echo "<th>Total Bookings</th>";
    echo "<th>Total Amount</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($rowCar = $resultCarEarnings->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowCar["car_id"] . "</td>";
        echo "<td>" . $rowCar["car_name"] . "</td>";
        echo "<td>" . $rowCar["total_bookings"] . "</td>";
        echo "<td>" . $rowCar["total_amount"] . "</td>";
        echo "</tr>";

        // Accumulate total car earning
        $totalCarEarning += $rowCar["total_amount"];
    }

    echo "</tbody>";
    echo "</table>";

    // Display the total car earning
    echo "<p>Total Car Earning: " . $totalCarEarning . "</p>";
} else {
    echo "<p>No car earnings data available</p>";
}

// Fetch total earnings per month
$sqlMonthEarnings = "SELECT
        MONTH(booking.book_date) AS booking_month,
        SUM(payment.amount) AS total_amount
    FROM
        booking
    LEFT JOIN payment ON booking.book_id = payment.book_id
    GROUP BY
        booking_month
    ORDER BY
        booking_month ASC;
";

$resultMonthEarnings = $conn->query($sqlMonthEarnings);

// Display total earnings per month
if ($resultMonthEarnings->num_rows > 0) {
    $monthlyEarnings = [];

    echo "<h2>Total Earnings per Month</h2>";
    echo "<ul>";

    while ($rowMonth = $resultMonthEarnings->fetch_assoc()) {
        $month = date("F", mktime(0, 0, 0, $rowMonth["booking_month"], 1));
        $totalAmount = $rowMonth["total_amount"];

        echo "<li>Total earnings for " . $month . ": Rs. " . $totalAmount . "</li>";

        // Accumulate total monthly earning
        $monthlyEarnings[] = $totalAmount;
    }

    echo "</ul>";

    // Display the total monthly earning
    // echo "<p>Total Monthly Earning: Rs. " . array_sum($monthlyEarnings) . "</p>";
} else {
    // echo "<p>No monthly earnings data available</p>";
}

$conn->close();
?>
