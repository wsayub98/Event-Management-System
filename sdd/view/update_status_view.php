<?php 
error_reporting(0);
include 'header.php'; 
include '../controller/manage_supplies_controller.php';

if($_SESSION['type'] != 1 && $_SESSION['type'] != 2){
	echo "<script>alert('This section only allow supplier access')</script>";
	echo "<script>window.location.assign('home_view.php')</script>";
}

if(isset($_GET['result']))
	if($_GET['result'] == 1)
		echo '<script>alert("Update Successful")</script>';
	else
		echo '<script>alert("Update Failure")</script>';
?>	
<style>
	.container{
		max-width: 1200px;
	}

	input[type=text],input[type=date] {
		width:300px;
		float:right;
		padding: 12px 20px;
	    margin: 8px 0;
	    display: inline-block;
	    border: 1px solid #ccc;
	    box-sizing: border-box;
	    font-size: 15px;
	}

	label{
		margin:3%;
	}	

	button{
		width:100px;
		border-radius: 15px;
	}

	.nav1 a{
		width:auto;
	}

</style>
<h2 align="center" style="margin:1%">Supplier Information</h2><br/>


<form action="../controller/manage_supplies_controller.php" method="post">
	<div class="main">
		<div class="container">

			<div class="row">
				<div class="col">
					<label>Name :</label>
					<input type="text" id="name" name="name" required value="<?php echo $user_data['name'] ?>">
				</div>

				<div class="col">
					<label>Date :</label>
					<input type="date" name="date" id="date" readonly value="<?php echo date("Y-m-d") ?>">
				</div>
			</div>

			<div class="row">
				<div class="col">
					<label>IC :</label>
					<input type="text" id="ic" name="ic" required value="<?php echo $supplier_data['ic'] ?>">
				</div>

				<div class="col">				
				</div>
			</div>

			<div class="row">
				<div class="col">
					<label>Phone No :</label>
					<input type="text" id="phone" name="phone" required value="<?php echo $user_data['phone'] ?>">
				</div>

				<div class="col">				
				</div>
			</div>

			<div class="row">
				<div class="col">
					<label>Address :</label>
					<textarea name="address" id="address" rows="6" cols="40" required style="float:right; width:300px;font-size: 15px;padding: 12px 20px;"><?php echo $supplier_data['address'] ?></textarea>
				</div>
				<div class="col">

				</div>
			</div>

			<div class="row">
				<div class="col">
					<label>Company Name :</label>
					<input type="text" id="company" name="company" required value="<?php echo $supplier_data['company'] ?>">
				</div>
				<div class="col">		
				</div>
			</div>

			<br/><br/>
			<div class="row justify-content-lg-center">
				<div class="col-lg-2">
					<input type="text" name="id" hidden value=<?php echo $supplier_data['supplier_id']?> >
					<input type="text" name="type" hidden value="update_supplier">
					<input type="submit" class="btn btn-outline-info" value="Confirm">			
				</div>
			</form>	
				<div class="col-lg-2">
					<button type="button" id="cancel" class="btn btn-outline-info">Cancel</button>	

				</div>
			</div>
			<br/><br/><br/>
		</div>
	</div>

<script>
$("#cancel").click(function(){
	$("#name").val("");
	$("#company").val("");
	$("#phone").val("");
	$("#ic").val("");
	$("#address").val("");

});
</script>

<?php include 'footer.php' ?>