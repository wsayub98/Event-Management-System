<?php 

include 'header.php'; 
include '../controller/manage_event_controller.php';

if(isset($_GET['res'])) {
	if($_GET['res'] == 0)
		echo '<script>alert("Failed to submit!")</script>';
	else
		echo '<script>alert("Submitted!")</script>';
}

$serviceDetails = getDetails($_GET['event_id']);

?>

<script>

function askQ() {
	var question = prompt("Make a question");

	if(question == "" || question == null) {
		return false
	}
	else {
		document.getElementById('questionText').value = question; 
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
	width: 150px;
	height: 150px;
}

textarea {
	font-size: 16px;
	float: left;
	resize: none;
	width: 100%;
	height: 325px;
	border: none;
}

p {
	font-size: 16px;
}

input[type=text] {
	margin-left: -20px;
	border: none;
	width: 100%;
	font-size: 16px;
}

.btn-outline-info {
	margin-top: 15px;
	width: 30%;
  	text-align: center;
 	text-decoration: none;
 	display: inline-block;
  	cursor: pointer;
}

.description {
	border: none;
	font-size: 16px;
	float: left;
	width: 100%;
	height: 175px;
}

</style>

<!DOCTYPE html>
<html>
<body>
<form action = "../controller/manage_event_controller.php" method="post">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<input type="text" name="eid" hidden value="<?php echo $serviceDetails[0]['event_id']?>">
				<h2><?php echo $serviceDetails[0]['event_name']?></h2>
				<center>
					<img src=<?php echo $serviceDetails[0]['link']?> alt="test"><br>
					<p style="text-align: centre; margin-top: 15px;">Service by</p>
					<input type="text" name="supplier_id" hidden value="<?php echo $serviceDetails[0]['supplier_id']?>">
					<input type="text" style="margin-top: 0; margin-left: 0; text-align: center;" value="<?php echo $serviceDetails[0]['name']?>" readonly> 
					<button id="selected" type="button" class="btn btn-outline-info">Select</button>
				</center>
			</div>
			<div class="col-sm-3">
				<h2 style="color: white;">Info</h2>
				<input type="text" value="Price : RM<?php echo $serviceDetails[0]['event_price']?>" readonly><br>
				<input type="text" value="Classifcation : <?php echo $serviceDetails[0]['classification']?>" readonly><br>
				<input type="text" value="Status : <?php echo $serviceDetails[0]['status']?>" readonly><br>
				<p style="margin-top: 15px;">Description : </p>
				<textarea class="description" readonly><?php echo $serviceDetails[0]['description']?></textarea>
			</div>
			<div class="col-sm-6">
				<h2>Recently asked Questions</h2>
				<center>
					<textarea readonly><?php
						$question = getQuestions($_GET['event_id']);

						if(count($question) == 0) 
							echo "No questions found";
						else {
							for($i = 0; $i < count($question); $i++) {
								echo $question[$i]['question']."\n";

								if($question[$i]['reply'] == "") 
									echo "	Waiting for reply...\n\n";
								else
									echo "	".$question[$i]['reply']."\n\n";
							}
						} 
						?></textarea>
					<input type="text" id="questionText" name="questionText" hidden>
					<button type="submit" name="ask" value="Submit" class="btn btn-outline-info" style="margin-top: 25px; width: 30%" onclick="return askQ();">Ask a Question</button>
				</center>
			</div>
		</div>
	</div>
</form>
<script>
$(document).ready(function(){
	$("#selected").click(function(){
		$.post("../controller/manage_event_controller.php",
		{
			method : 'ajax',
			customer_id : "<?php echo $_SESSION['user_id'];?>",
			name: "<?php echo $serviceDetails[0]['event_name'];?>",
			price : "<?php echo $serviceDetails[0]['event_price'];?>"
		},function(data){
			if(data){
				alert("Book Successful");
				window.location.assign("event_service_view.php");
			}else{
				alert("Book Fail, Please Try Again");
			}
		},"html");
	});
});

</script>
<?php include 'footer.php' ?>