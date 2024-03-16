<?php
//include_once "../config/dbconnect.php";
include_once "./config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["toggle_status"])) {
    $car_id = $_POST["car_id"];

    // Fetch the current status
    $sql = "SELECT status FROM car WHERE car_id = $car_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $current_status = $row["status"];

        // Toggle the status
        $new_status = ($current_status == "Available") ? "Not Available" : "Available";

        // Update the database
        $update_sql = "UPDATE car SET status = '$new_status' WHERE car_id = $car_id";
        $conn->query($update_sql);
    }
}

// Redirect back to the specified page with the anchor
$redirect_url = 'http://localhost/DBMS_%20PROJECT5/admin_panel/index.php#cars';
header("Location: $redirect_url");
exit();
?>
