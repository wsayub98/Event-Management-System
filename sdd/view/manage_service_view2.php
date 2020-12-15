<?php 

include 'header.php'; 
require_once('../controller/manage_event_controller.php');
$details = getDetails($_GET['update']);

if(isset($_GET['result'])) {
	if($_GET['result'] == 0)
		echo '<script>alert("Update Failed!")</script>';
}

?>

<script>

var loadFile = function(event) {
	var image = document.getElementById('image');
	image.src = URL.createObjectURL(event.target.files[0]);
};

</script>

<style>

p {
	text-align: right;
}

h2 {
	padding: 30px;
	font-size: 30px;
	text-align: center;
}

select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
 	display: inline-block;
 	border: 1px solid #ccc;
  	box-sizing: border-box;
  	font-size: 15px;
}

input[type=text], input[type=number], input[type=date] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
 	display: inline-block;
 	border: 1px solid #ccc;
  	box-sizing: border-box;
  	font-size: 15px;
}

textarea {
	font-size: 15px;
	resize: none;
	float: left;
	width: 100%;
	height: 375px;
	margin-bottom: 20px;
	margin-left: 15px;
}

p {
	font-size: 16px;
}

img {
	margin: 20px;
	width: 150px;
	height: 150px;
	border: 2px solid #ccc;
}

.btn {
	font-size: 15px;
	margin-top: 55px;
	width: 25%;
}

.btn-outline-info {
	margin-top: 30px;
	width: 20%;
	margin-bottom: 20px;
}

.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
	cursor: pointer;
}

.inputfile + label {
	width: 35%;
}

</style>

<!DOCTYPE html>
<html>
<body>
	<h2><b>Update Services</b></h2>
	<form action = "../controller/manage_event_controller.php" method="post"><center>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<div class="row">
						<div class="col">
							<strong><p style="margin-top: 22px;">Name :</p></strong><br>
							<strong><p style="margin-top: -11px;">Price :</p></strong><br>
							<strong><p style="margin-top: -12px;">Classification :</p></strong><br>
							<strong><p style="margin-top: -11px;">Status :</p></strong><br>
							<strong><p style="margin-top: -11px;">Date Updated :</p></strong><br>
						</div>
						<div class="col">
							<input type="text" name="supplier_id" hidden value="<?php echo $details[0]['supplier_id']?>">
							<input type="text" name="event_id" hidden value="<?php echo $details[0]['event_id']?>">
							<input type="text" name="event_name" value="<?php echo $details[0]['event_name']?>" required>
							<input type="number" name="event_price" value="<?php echo $details[0]['event_price']?>" required>
							<select name="classification">
								<option value="Birthday" 
								<?php 
									if($details[0]['classification'] == 'Birthday'){echo("selected");}
								?>>Birthday</option>
								<option value="Banquet"
								<?php 
									if($details[0]['classification'] == 'Banquet'){echo("selected");}
								?>>Banquet</option>
								<option value="Community"
								<?php 
									if($details[0]['classification'] == 'Community'){echo("selected");}
								?>>Community</option>
								<option value="Music"
								<?php 
									if($details[0]['classification'] == 'Music'){echo("selected");}
								?>>Music</option>
								<option value="Sport"
								<?php 
									if($details[0]['classification'] == 'Sport'){echo("selected");}
								?>>Sport</option>
								<option value="Wedding"
								<?php 
									if($details[0]['classification'] == 'Wedding'){echo("selected");}
								?>>Wedding</option>
							</select>
							<select name="status">
								<option value="Available"
								<?php 
									if($details[0]['status'] == 'Available'){echo("selected");}
								?>>Available</option>
								<option value="In Service"
								<?php 
									if($details[0]['status'] == 'In Service'){echo("selected");}
								?>>In Service</option>
							</select>
							<input id="current_date" type="date" name="date_update" value="<?php echo date('Y-m-d'); ?>" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="reset" class="btn btn-outline-info">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<h6 style="text-align: left; margin-left: 15px; margin-top: 5px;"><b>Description :</b></h6>
					<textarea name="description"><?php echo $details[0]['description']?></textarea>
				</div>
				<div class="col-sm-4">
					<h6 style="margin-top: 5px;"><b>Select image</b></h6>
					<img id="image" src="<?php echo $details[0]['link']?>">
					<center>
						<input type="file" accept="assets/*" name="file" id="file" class="inputfile" onchange="loadFile(event)" required>
						<label for="file" class="btn btn-outline-info"><i class="fa fa-folder"></i> Upload photo</label>
					</center>
					<div class="row">
						<div class="col">
							<input type="submit" name="update" class="btn btn-outline-success" value="Confirm">
						</div>
					</div>
				</div>
			</div>
		</div>
	</center></form>
</body>
</html>
<?php include 'footer.php' ?>