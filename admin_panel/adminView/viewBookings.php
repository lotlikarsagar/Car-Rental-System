<div>
  <h2>Total Bookings</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Book id</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Book date</th>
        <th class="text-center">Pickup Date</th>
        <th class="text-center">Return Date</th>
        <th class="text-center">Book Place</th>
        <th class="text-center">Payment Amount</th> <!-- Added column -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT b.*, c.fname, c.Lname, p.amount 
              FROM booking b
              JOIN customer c ON b.cust_id = c.cust_id
              LEFT JOIN payment p ON b.book_id = p.book_id"; // Joined the payment table
      $result = $conn->query($sql);
      $count = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
      <td><?= $count ?></td>
      <td><?= $row["fname"] . " " . $row["Lname"] ?></td>
      <td><?= $row["book_date"] ?></td>
      <td><?= $row["pickup_date"] ?></td>
      <td><?= $row["return_date"] ?></td>
      <td><?= $row["book_place"] ?></td>
      <td><?= $row["amount"] ?></td> <!-- Display payment amount -->
    </tr>
    <?php
          $count = $count + 1;
        }
      }
    ?>
  </table>
</div>
