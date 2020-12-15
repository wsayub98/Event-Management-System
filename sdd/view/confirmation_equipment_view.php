<?php 
include 'header.php';
include '../controller/manage_equipment_controller.php';
?>

<br>
<center><h2>CONFIRMATION<h2></center>

<table class="table text-center">
  <thead class="table-info">
    <tr>
      <th scope="col">Product Name(Quantity)</th>
      <th scope="col">Price(RM)</th>
      <th scope="col">Date</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td><?php echo $_GET['product_name']?></td>
     <td><?php echo $_GET['product_price']?></td>
     <td><?php echo date("Y-m-d")?></td>
     <td><a href="../controller/manage_equipment_controller.php?pn=<?php echo $_GET['product_name'];?>&pp=<?php echo $_GET['product_price']?>&ci=<?php echo $_SESSION['user_id']?>">Confirm</a></td> 
    </tr>
  </tbody>
</table>

<form action="request_equipment_view.php" method="post" style="margin-top:25%">
    <input type="submit" value="BACK" class="btn btn-outline-info"/>
</form>

<!--<form action="BookEquipmentController.php">
    <input type="submit" value="CONFIRM" class="btn btn-outline-info"/>
</form>
-->

<?php include 'footer.php'?>


