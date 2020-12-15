<?php 
include 'header.php';
include '../controller/manage_equipment_controller.php';
?>


<br>
<body>

<form action="../controller/manage_equipment_controller.php" method="POST">
      <div class="container" style="margin-left: 450px;">
          <h2><b>EQUIPMENT INFORMATION</b><h2>
            <div class="row">
              <div class="col-sm-6"><label>Product Name(Quantity):</label><input class="text" type="text" name="product_name" required>
            </div></div>
            <div class="row">
              <div class="col-sm-6"><label>Price(RM):</label><input type="number"  min="0.00" step="0.1" placeholder="0.00" name="product_price" required>
            </div></div>
          <div class="row">
              <div class="col-sm-12">
            <input type="reset" name="reset" class="btn btn-outline-info" value="Reset">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
            <input type="text" hidden value="<?php echo $_SESSION['user_id']; ?>" name="supplier_id">
            <input type="text" hidden value="add_product" name="method">
            <input type="submit" class="btn btn-outline-info"  value="ADD"></div>
            </div></div>
      </form>

<div class="container" style="margin-left: 220px;">
      <form action="manage_equipment_view.php">
         <input type="submit" value="BACK" class="btn btn-outline-info"/>
      </form>
</div>

</div>

</body>
<?php include 'footer.php'?>