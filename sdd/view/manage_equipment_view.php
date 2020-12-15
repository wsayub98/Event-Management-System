<?php 
include 'header.php';
include '../controller/manage_equipment_controller.php';

if($_SESSION['type'] != 1 && $_SESSION['type'] != 2){
  echo "<script>alert('This section only allow Supplier access')</script>";
  echo "<script>window.location.assign('home_view.php')</script>";
}

?>
<br/>
<center><h2>MANAGE EQUIPMENT<h2></center>

<table class="table text-center">
  <thead class="table-info">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name(Quantity)</th>
      <th scope="col">Price(RM)</th>
      <th scope="co1"></th>
      <th scope="co1"></th>
    </tr>
  </thead>
<tbody>
    	<?php 
    		while($row = $select_Product->fetch_assoc()){
    			echo '<tr>';
    			echo '<td>'.$row['product_id'].'</td>';
    			echo '<td>'.$row['product_name'].'</td>';
    			echo '<td>'.$row['product_price'].'</td>';
    			echo '<td><a href=edit_equipment_view.php?product_id='.$row['product_id'].'&product_name='.$row['product_name'].'&product_price='.$row['product_price'].'>Edit</a></td>';
    			echo '<td><a href=../controller/manage_equipment_controller.php?dlt_id='.$row['product_id'].'>Delete</a></td>';
    			echo '</tr>';
    		}

    	?>
  </tbody>
</table>
<br/>
<form action="home_view.php" style="margin-top:23vh">
    <input type="submit" value="BACK" class="btn btn-outline-info"/>
</form>

<form action="add_equipment_view.php">
    <input type="submit" value="ADD" class="btn btn-outline-info"/>
</form>

<?php include 'footer.php'?>