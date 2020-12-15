<?php 
include 'header.php';
include '../controller/manage_equipment_controller.php';

if($_SESSION['type'] != 0 && $_SESSION['type'] != 2){
  echo "<script>alert('This section only allow Customer access')</script>";
  echo "<script>window.location.assign('home_view.php')</script>";
}
?>

<br>
<center><h2>REQUEST EQUIPMENT<h2></center>

<table class="table text-center">
  <thead class="table-info">
    <tr>
      <th scope="col">Product Name(Quantity)</th>
      <th scope="col">Price(RM)</th>
      <th scope="co1"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
        while($row = $allProduct->fetch_assoc()){
          echo '<tr>';
          echo '<td>'.$row['product_name'].'</td>';
          echo '<td>'.$row['product_price'].'</td>';
          echo '<td><a href=confirmation_equipment_view.php?product_name='.$row['product_name'].'&product_price='.$row['product_price'].'>Request</a></td>';
          echo '</tr>';
        }

      ?>
  </tbody>
</table>

<form action="home_view.php" style="margin-top:15%">
    <input type="submit" value="BACK" class="btn btn-outline-info"/>
</form>


<?php include 'footer.php'?>