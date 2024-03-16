<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Custname</th>
        <!-- <th class="text-center">Lname</th> -->
        <th class="text-center">Email</th>
        <th class="text-center">Address</th>
        <!-- <th class="text-center">Joining Date</th> -->
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from customer";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["fname"]?> <?=$row["lname"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["address"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>