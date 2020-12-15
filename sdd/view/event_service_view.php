<?php 

include 'header.php';
require_once('../controller/manage_event_controller.php');
if($_SESSION['type'] != 0 && $_SESSION['type'] != 2){
  echo "<script>alert('This section only allow Customer access')</script>";
  echo "<script>window.location.assign('home_view.php')</script>";
}

?>

<style>

h2 {
	padding: 30px;
	font-size: 30px;
	text-align: center;
}

img {
	width: 150px;
	height: 150px;
}

p {
	font-size: 20px;
	padding: 25px;
}

button {
	width: 40%;
	margin-bottom: 50px;
}

</style>

<!DOCTYPE html>
<html>
<body>
	<h2>Event Services</h2>
	<center>
		<div class="container-fluid">
			<div class="row">
				<?php
					$allService = getServices();

					if(count($allService) == 0) 
						echo "No event services found";
					else {
						for($i = 0; $i < count($allService); $i++) {
							echo 
							"<div class='col-sm-4'>
							 <form action='service_detail_view.php' method='get'>
								<img src=".$allService[$i]['link']." alt='test'></a><br><br>
								<input type='text' name='event_id' hidden value=".$allService[$i]['event_id'].">
								<button class='btn btn-outline-info' title='Select'>".$allService[$i]['event_name']."</button>
							</form>
							</div>";
						}
					}
				?>
			</div>
		</div>
	</center>
	
<?php include 'footer.php' ?>