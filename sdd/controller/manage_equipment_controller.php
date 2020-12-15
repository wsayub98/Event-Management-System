<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
include '../model/ems_model.php';

if(isset($_POST['method'])){
	if($_POST['method'] == "add_product"){
		$result = add_product($_SESSION['user_id'],$_POST['product_name'],$_POST['product_price']);
		if($result){
			echo "<script>alert('Add product successful')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}else{
			echo "<script>alert('Add product Fail, Please Try Again')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}

	}else if($_POST['method'] == "edit_equipment"){
		$result = edit_product($_POST['product_id'],$_POST['product_name'],$_POST['product_price']);
		if($result){
			echo "<script>alert('Edit product successful')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}else{
			echo "<script>alert('Edit product Fail, Please Try Again')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}
	}
}

if(isset($_GET['dlt_id'])){
	$result = delete_product($_GET['dlt_id']);
	if($result){
			echo "<script>alert('Delete product successful')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}else{
			echo "<script>alert('Delete product Fail, Please Try Again')</script>";
			echo "<script>window.location.assign('../view/manage_equipment_view.php')</script>";
		}


}

if($_SERVER['PHP_SELF'] == "/sdd/view/manage_equipment_view.php"){

	$select_Product = select_product($_SESSION['user_id']);

}

if($_SERVER['PHP_SELF'] == "/sdd/view/request_equipment_view.php"){

	$allProduct = all_product();

}

if(isset($_GET['pn']) && isset($_GET['pp']) && isset($_GET['ci'])){

	$result = booking($_GET['pn'],$_GET['pp'],$_GET['ci']);
	if($result){
			echo "<script>alert('Product Booking Successful')</script>";
			echo "<script>window.location.assign('../view/request_equipment_view.php')</script>";
		}else{
			echo "<script>alert('Product Booking Successful, Please Try Again')</script>";
			echo "<script>window.location.assign('../view/request_equipment_view.php')</script>";
	}
}




?>