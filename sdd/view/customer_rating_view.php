<?php 
include 'header.php';
include '../controller/manage_supplies_controller.php';

if($_SESSION['type'] != 0  && $_SESSION['type'] != 2){
	echo "<script>alert('This section only allow customer access')</script>";
	echo "<script>window.location.assign('home_view.php')</script>";
}

if(isset($_GET['result']) && $_GET['result'] == 1){
	echo "<script>alert('Rating Successful')</script>";
}else if(isset($_GET['result']) && $_GET['result'] == 0){
	echo "<script>alert('Rating Fail, Please Try Again')</script>";
}
?>

<style>
	.nav1 a{
		width:auto;
	}

	input[type=text]{
		margin:8px 5%;
		float : right;
		width:45%;
	}

	label{
		margin:3%;
	}

	textarea{
		margin:8px 5%;
		float : right;
		width:45%;
	}

	button{
		width:100px;
		border-radius: 15px;
	}

	.button{
		margin-bottom:1%;
	}

	input[type=submit]{
		width:100px;
		border-radius: 5px;
	}

	select{
		margin: 8px 5%;
   	 	float: right;
   	 	padding: 12px 20px;
   	 	width: 45%;
   	 	display: inline-block;
    	border: 1px solid #ccc;
    	box-sizing: border-box;
    	font-size: 15px;
	}

</style>
<h2 align="center" style="margin:1%">Customer</h2>
<div class="main">
	<div class="container">
		<form action="../controller/manage_supplies_controller.php" method="post">
			<div class="row">
				<div class="col-lg-7">
					<label>Name :</label>
					<input type="text" id="name" name="name" readonly>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-7">
					<label>Company Name :</label>
					<select id="company" name="company">
						<option></option>
						<?php
							foreach($allSupplier as $a){
								echo "<option value='".$a['company']."'>".$a['company']."</option>";

							}
						?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3" style="margin:1%">
					<label>Rate :</label>
				</div>
				<div class="col-lg-6">
					<input type="radio" name="rate" value="Disatisfied"><label>Disatisfied</label>
					<input type="radio" name="rate" value="Satisfied"><label>Satisfied</label>
					<input type="radio" name="rate" value="Very Satisfied"><label>Very Satisfied</label>
				</div> 
			</div>

			<div class="row">
				<div class="col-lg-7">
					<label>Comment :</label>
					<textarea id="comment" name="comment" rows="6" cols="30"></textarea>
				</div>
			</div>

			<br/><br/>

			<div class="row justify-content-lg-center">
				<div class="col-lg-2">
					<input type="test" value="rating" name="type" hidden>	
					<input type="submit" value="Rate" class="btn btn-outline-info">		
				</div>
				<div class="col-lg-2">
					<button type="button" id="cancel" class="btn btn-outline-info">Cancel</button>	
				</div>
			</div>

			<br/><br/><br/><br/>
		</div>
	</form>
</div>
<script>
$("#company").change(function(){
	var company = $("#company").val();
	$.post("../controller/manage_supplies_controller.php",{
		company : company,
		method : 'ajax'
	},
	function(data){
		$("#name").val(data.name);
	},'json');
});

$("#cancel").click(function(){
	$("input[type=radio]").prop("checked",false);
	$("#name").val("");
	$("#company").val("");
	$("#comment").val("");


});

</script>


<?php include 'footer.php' ?>
