<div>
  <h2>All Cars</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Car ID</th>
        <th class="text-center">Car Name</th>
        <th class="text-center">Price</th>
        <th class="text-center">Capacity</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM car";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $row["car_name"] ?></td>
          <td><?= $row["price"] ?></td>
          <td><?= $row["capacity"] ?></td>
          <td><?= $row["status"] ?></td>
          <td>
            <form action="update_status.php" method="post">
              <input type="hidden" name="car_id" value="<?= $row["car_id"] ?>">
              <button type="submit" name="toggle_status" class="btn btn-primary">
                Toggle Status
              </button>
            </form>
          </td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>
</div>
