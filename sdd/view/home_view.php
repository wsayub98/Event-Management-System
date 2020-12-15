<?php
session_start();
if(!isset($_SESSION['user_id'])){
	echo "<script>window.location.assign('login.php?lg=2')</script>";
}else{
	include 'header.php';
}
?>

<div>
	<h1 align="center">
		Welcome To Event Management System
	</h1>
</div>
<div class="full" style="height: calc(65vh + 7px);"></div>

<?php include 'footer.php' ?>