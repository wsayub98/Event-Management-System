<?php 

include 'header.php';
include '../controller/manage_event_controller.php';

if($_SESSION['type'] != 1 && $_SESSION['type'] != 2){
  echo "<script>alert('This section only allow Supplier access')</script>";
  echo "<script>window.location.assign('home_view.php')</script>";
}

if(isset($_GET['res'])) {
	if($_GET['res'] == 0)
		echo '<script>alert("Fail to reply")</script>';
	else
		echo '<script>alert("Replied")</script>';
}

if(isset($_GET['del'])) {
	if($_GET['del'] == 0)
		echo '<script>alert("Fail to delete")</script>';
	else
		echo '<script>alert("Deleted")</script>';
}

if(isset($_GET['result'])) {
	if($_GET['result'] == 1) 
		echo '<script>alert("Updated Sucessfully!")</script>';
}

?>

<script>

function confirmDelete() {

	var check = confirm("Are you sure you want to delete this service?");

	if(check) {
		return true
	}
	else
		return false
}

function replyQ() {
	var reply = prompt("Make a reply");

	if(reply == "" || reply == null) {
		return false
	}
	else {
		document.getElementById('replyText').value = reply; 
		return true
	}
}

</script>

<style>

h2 {
	text-align: center;
	font-size: 30px;
	padding-top: 30px;
	padding-bottom: 15px;
}

img {
	margin-left: 40px;
	width: 100px;
	height: 100px;
	margin-top: 20px;
	margin-bottom: 20px;
}

.btn-outline-info {
	margin-top: 25px;
	margin-bottom: 5px;
	margin-left: 40px;
	width: 165px;
	height: 45px;
	font-size: 14px;
}

.btn-outline-success {
	margin-left: -20px;
	width: 100px;
	height: 45px;
	font-size: 14px;
}

.btn-outline-danger {
	margin-left: 20px;
	width: 100px;
	height: 45px;
	font-size: 14px;
}

input[type=text] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
 	display: inline-block;
 	border: 1px solid #ccc;
  	box-sizing: border-box;
  	font-size: 15px;
}

.reply {
	background-color: transparent;
	border: none;
	color: blue;
	text-decoration: underline;
	text-align: left;
	font-size: 14px;
	padding: 0;
	margin: 0;
}

.text {
	text-align: left;
	width: 300px;
}

.svc {
	text-align: left;
	margin-left: 50px;
}

.box {
	font-size: 16px;
	width: 100%;
	margin: 0 auto;
	overflow: auto;
	padding: 2px;
	text-align: justify;
	background: transparent;
}

</style>

<!DOCTYPE html>
<html>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="row">
					<h2 class="svc">My Services</h2><a href="manage_service_view.php"><button class="btn btn-outline-info"><i class="fa fa-plus"></i> Add new Service</button></a>
				</div>
				<?php
					$service = getSupplierServices($_SESSION['user_id']);

					if(count($service) == 0) 
						echo "No event services found";
					else {
						for($i = 0; $i < count($service); $i++) {
							echo
							"<div class='row'>
								<div class='col-sm-4'>
									<img src=".$service[$i]['link']." alt='test'>
								</div>
								<div class='col-sm-8'>
									<div class='row'>
										
										<strong>
											<p style='margin-left:-20px; margin-top: 15px;'>".$service[$i]['event_name']."</p>
										</strong>
									</div>
									<div class='row'>
										<form action='manage_service_view2.php' method='get'>
											<input type='text' name='update' hidden value=".$service[$i]['event_id'].">
											<a href='manage_service_view2.php'><button class='btn btn-outline-success'>Update</button></a>
										</form>
										<form name='dlt' action='../controller/manage_event_controller.php' method='post'>
											<input type='text' name='del' hidden value=".$service[$i]['event_id'].">
											<button type='submit' class='btn btn-outline-danger' name='delete' value='1' onclick='return confirmDelete();'>Delete</button>
										</form>
									</div>
								</div>
							</div>";
						}
					}
				?>
			</div>
			<div class="col-sm-6">
				<h2>Recently asked Questions</h2>
				<center>
					<div class="box" readonly><?php
						$all = getAllQuestions($_SESSION['user_id']);

						if(count($all) == 0) 
							echo "No questions found";
						else {
							for($i = 0; $i < count($all); $i++) {
								echo 
								"<form action='../controller/manage_event_controller.php' method='post'>
								 <input type='text' name='qid' hidden value=".$all[$i]['question_id'].">".$all[$i]['question']."<br>";

								if($all[$i]['reply'] == "")
									echo 
									"<input type='text' id='replyText' name='replyText' hidden>
									 <button type='submit' class='reply' id='reply' name='reply' value='Submit' onclick='return replyQ();'>Reply</button></form><br>";
								else
									echo $all[$i]['reply']."</form><br>";
							}
						}
					?></div>
				</center>
				</form>
			</div>
		</div>
	</div>

<?php include 'footer.php' ?>