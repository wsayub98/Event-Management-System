<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

include '../model/ems_model.php';
$id = $_SESSION['user_id'];
if(isset($_SESSION['user_id'])){
	$supplier_data = searchSupplier($_SESSION['user_id']);
}
if(isset($_SESSION['user_id'])){
	$user_data = searchUser($_SESSION['user_id']);
}

if(isset($_POST['type'])){
	if($_POST['type'] == "update_supplier"){

		$result1 = updateSuppliesInformation($id,$_POST['ic'],$_POST['address'],$_POST['company']);

		$result2 = updateUserInformation($id,$_POST['name'],$_POST['phone']);

		if($result1 == true && $result2 == true){
			header("Location:../view/update_status_view.php?result=1");
		}else{
			header("Location:../view/update_status_view.php?result=0");
		}

	}
}

if($_SERVER['PHP_SELF'] == "/sdd/view/customer_rating_view.php"){

	$allSupplier = allSuppliesInformation();

}

if(isset($_POST['method']) && $_POST['method'] == 'ajax'){

	$info = rating_getName($_POST['company']);
	$row = $info->fetch_assoc();

	echo json_encode($row);

}

if(isset($_POST['type']) && $_POST['type'] == 'rating'){

	$result = update_rating($_POST['name'],$_POST['company'],$_POST['rate'],$_POST['comment']);

	if($result){
		header("Location:../view/customer_rating_view.php?result=1");
	}else{
		header("Location:../view/customer_rating_view.php?result=0");
	}

}

if($_SERVER['PHP_SELF'] == "/sdd/view/status_management_view.php"){

	$result = getapprovement();
	$detail = $result->fetch_assoc();

}

if(isset($_POST['method'])){

	if($_POST['method'] == 'approve'){

		$result = approve($_POST['supplier_id']);

		echo $result;

	}else if($_POST['method'] == 'reject'){

		$result = reject($_POST['supplier_id']);

		echo $result;
	}
}


?>