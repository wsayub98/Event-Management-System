<?php 
include 'header.php';
include '../controller/manage_equipment_controller.php';

?>
<div class="content">

<form action="../controller/manage_equipment_controller.php" method="post">
      <div class="container" style="margin-left: 50px;">
          <h2><b>EDIT EQUIPMENT</b><h2>
            <div class="row">
              <div class="col-sm-6"><label>Product ID:</label><input class="text" type="text" id="product_id" name="product_id" value="<?php echo $_GET['product_id']; ?>" readonly >
            </div></div>
            <div class="row">
              <div class="col-sm-6"><label>Product Name(Quantity):</label><input class="text" type="text" id="product_name" name="product_name" value="<?php echo $_GET['product_name']; ?>" required>
            </div></div>
            <div class="row">
              <div class="col-sm-6"><label>Price(RM):</label><input style="font-size: 20px;" class="text" type="number" id="price" name="product_price" value="<?php echo $_GET['product_price']; ?>" required>
            </div></div>
          <div class="row">
              <div class="col-sm-12">
              <input type="text" hidden value="edit_equipment" name="method">
            <input type="submit" class="btn btn-outline-info"  value="CHANGE"></div>
            </div></div>

          </form>
                <form action="manage_equipment_view.php">
                    <input type="submit" value="BACK" class="btn btn-outline-info"/>
          </form>
           <div style="margin-top:23%"></div>
</div>


<?php include 'footer.php'?>