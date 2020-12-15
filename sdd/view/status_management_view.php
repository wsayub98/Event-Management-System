<?php 
include 'header.php';
include '../controller/manage_supplies_controller.php';

if($_SESSION['type'] != 2){
	echo "<script>alert('This section only allow Administrator access')</script>";
	echo "<script>window.location.assign('home_view.php')</script>";
}

if(!isset($detail['name'])){
	echo "<script>alert('No more supplier pending approve or reject')</script>";
}

?>
<style>
	.nav1 a{
		width:auto;
	}

	input[type=text],input[type=date]{
		margin: 8px 5%;	
    	float: right;
    	width: 45%;
    	padding: 12px 20px;
    	display: inline-block;
    	border: 1px solid #ccc;
    	box-sizing: border-box;
    	font-size: 15px

	}

	label{
		margin:3%;
	}

	textarea{
	    margin: 8px 5%;
	    float: right;
	    width: 45%;
	    padding: 12px 20px;
	    display: inline-block;
	    border: 1px solid #ccc;
	    box-sizing: border-box;
	    font-size: 15px;
	}

</style>
<h2 align="center" style="margin:1%">System Administrator Approvement</h2><br/>
<h2 style="margin:1%">Supplier Information :</h2><br/>
<div class="main">
	<div class="container">
		<div class="row">

			<div class="col-lg-7">
				<label>Name :</label>
				<input type="text" readonly value="<?php echo $detail['name'] ?>">
				<input type="text" hidden="true" id="supplier_id" value="<?php echo $detail['supplier_id']; ?>">
			</div>
			<div class="col-lg-5">
				<label>Date :</label>
				<input type="date" readonly value="<?php echo $detail['date_update'] ?>">
			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<label>Company Name :</label>
				<input type="text" id="company" readonly value="<?php echo $detail['company'] ?>">
			</div>

			<div class="col-lg-5">
				<label>Phone No :</label>
				<input type="text" id="phone" readonly value="<?php echo $detail['phone'] ?>">
			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<label>Address :</label>
				<textarea name="address" id="address" rows="6" cols="40" required><?php echo $detail['address']?></textarea>
			</div>
		</div>

		<br/><br/>

		<div class="row justify-content-lg-center">
			<div class="col-lg-2">
				<button id="approve" class="btn btn-outline-info">Approve</button>			
			</div>
			<div class="col-lg-2">
				<button id="reject" class="btn btn-outline-info">Reject</button>	
			</div>
		</div>
		<br/><br/><br/>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#approve").click(function(){
		var id = $("#supplier_id").val();
		$.post("../controller/manage_supplies_controller.php",{
		supplier_id : id,
		method : 'approve'
		},
		function(data){
			if(data == true){
				alert("Supplier has been approve");
				window.location.assign("status_management_view.php");
			}
		},'html');


	});

	$("#reject").click(function(){
		var id = $("#supplier_id").val();
		$.post("../controller/manage_supplies_controller.php",{
		supplier_id : id,
		method : 'reject'
		},
		function(data){
			if(data == true){
				alert("Supplier has been reject");
				window.location.assign("status_management_view.php");
			}
		},'html');


	});
});
</script>


<?php include 'footer.php' ?>