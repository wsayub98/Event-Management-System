<?php 
include '../model/ems_model.php';

if($_POST['fx'] == 0){ //register
	$password = md5($_POST['password']);
	$result = register($_POST['username'],$password,$_POST['name'],$_POST['type'],$_POST['phone']);
	if($result){
		header("Location:../view/login.php?rg=1");
	}else
		header("Location:../view/register.php?rg=0");
	


}else if($_POST['fx'] == 1){ //login
	$password = md5($_POST['password']);
	$result = login($_POST['username'],$password);
	$row = $result->fetch_assoc();
	if($row == NULL){
		header("Location:../view/login.php?lg=0");
	}else{
		session_start();
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['type'] = $row['type'];
		header("Location:../view/home_view.php");
	}

}




?>