<?php
 
include '../model/ems_model.php';

if(isset($_POST['insert'])) {
	if($_POST['insert'] == "Confirm") {

		$result = insertService($_POST['supplier_id'],$_POST['event_name'],$_POST['event_price'],$_POST['classification'],$_POST['status'],$_POST['date_update'],$_POST['file'],$_POST['description']);

		if($result)
			header("Location: ../view/manage_service_view.php?result=1");
		else
			header("Location: ../view/manage_service_view.php?result=0");
	}
}

if(isset($_POST['update'])) {
	
		$result = updateService($_POST['event_id'],$_POST['supplier_id'],$_POST['event_name'],$_POST['event_price'],
		$_POST['classification'],$_POST['status'],$_POST['date_update'],$_POST['file'],$_POST['description']);

		if($result) 
			header("Location: ../view/supplier_view.php?result=1");
		else
			header("Location: ../view/manage_service_view2.php?result=0");
	
}

if(isset($_POST['delete'])) {
	if($_POST['delete'] == 1) {

		$result = deleteService($_POST['del']);

		if($result)
			header("Location: ../view/supplier_view.php?del=1");
		else
			header("Location: ../view/supplier_view.php?del=0");
	}
	else {
		header("Location: ../view/supplier_view.php");
	}
}


	if(isset($_GET['id'])){
		$id=$_GET['id'];
		//$result = deleteBooking($_GET['id']);

		$result = deleteBooking($id);
			if($result){
				echo'<script type="text/javascript">
      			alert("Event Successfully Deleted!!");
      			window.location = "../view/event_service_update.php?del=1";
      			</script>';
			}else
			header("Location: ../view/event_service_update.php?del=0");
	}

		
	
	


if(isset($_POST['ask'])) {
	if($_POST['ask'] == "Submit") {

		$result = insertQuestion($_POST['supplier_id'], $_POST['eid'], $_POST['questionText']);

		if($result)
			header("Location: ../view/service_detail_view.php?event_id=".$_POST['eid']);
		else
			header("Location: ../view/service_detail_view.php?res=0");
	}
}

if(isset($_POST['reply'])) {
	if($_POST['reply'] == "Submit") {
		
		$result = insertReply($_POST['qid'], $_POST['replyText']);

		if($result)
			header("Location: ../view/supplier_view.php");
		else
			header("Location: ../view/supplier_view.php?res=0");
	}
}

if(isset($_POST['method']) && $_POST['method'] == 'ajax'){
	$result = event_booking($_POST['customer_id'],$_POST['name'],$_POST['price']);

	echo $result;
}

if($_SERVER['PHP_SELF'] == "/sdd/view/service_detail_view.php"){

	

}

?>