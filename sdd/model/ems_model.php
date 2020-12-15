<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ems";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Above is Database Connection, Don't alter--------------

//Sample fetch 1 data from database
function searchSupplier($id){
	global $conn;
	$sql = "SELECT * FROM supplier WHERE supplier_id ='$id' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row;
}

function searchUser($id){
	global $conn;
	$sql = "SELECT * FROM user WHERE user_id ='$id' ";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	return $row;
}

function updateSuppliesInformation($id,$ic,$address,$company){
	global $conn;
	$date = date("Y-m-d");
	$sql = "UPDATE supplier SET ic = '$ic',address = '$address',company = '$company',date_update = '$date',approvement = 0 WHERE supplier_id = '$id'"; 
	$result = $conn->query($sql);

	return $result;
	
}

function updateUserInformation($id,$name,$phone){
	global $conn;
	$sql = "UPDATE user SET name = '$name',phone = '$phone' WHERE user_id = '$id'";
	$result = $conn->query($sql);

	return $result;

}

function allSuppliesInformation(){
	global $conn;
	$a = array();
	$sql = "SELECT * FROM supplier";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		$a [] = array(
			'company' => $row['company']
		);
	}
	return $a;
}

function register($username,$password,$name,$type,$phone){
	global $conn;

	$sql = "INSERT INTO user (username,password,type,name,phone) VALUES ('$username','$password','$type','$name','$phone')";
	$result = $conn->query($sql);

	if($type == 1){

		$sql = "SELECT user_id FROM user WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$id = $row['user_id'];

		$sql = "INSERT INTO supplier (supplier_id) VALUES ('$id')";
		$result = $conn->query($sql);
	}	

	return $result;

}

function login($username,$password){
	global $conn;

	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
	$result = $conn->query($sql);
	
	return $result;

}

function rating_getName($company){
	global $conn;

	$sql = "SELECT * FROM supplier INNER JOIN user ON user.user_id = supplier.supplier_id WHERE supplier.company LIKE '$company'";
	$result = $conn->query($sql);

	return $result;

}

function update_rating($name,$company,$rate,$comment){
	global $conn;

	$sql = "INSERT INTO rate (supplier_name,company,comment,rate) VALUES ('$name','$company','$comment','$rate')";
	$result = $conn->query($sql);

	return $result;
}

function getapprovement(){
	global $conn;

	$sql = "SELECT * FROM supplier INNER JOIN user ON supplier.supplier_id = user.user_id WHERE approvement = 0 LIMIT 1";
	$result = $conn->query($sql);

	return $result;
}

function approve($supplier_id){
	global $conn;

	$sql = "UPDATE supplier SET approvement = 1 WHERE supplier_id = '$supplier_id'";
	$result = $conn->query($sql);

	return $result;
}

function reject($supplier_id){
	global $conn;

	$sql = "UPDATE supplier SET approvement = -1 WHERE supplier_id = '$supplier_id'";
	$result = $conn->query($sql);

	return $result;
}

function add_product($supplier_id,$product_name,$product_price){
	global $conn;

	$sql = "INSERT INTO product (supplier_id,product_name,product_price) VALUES ('$supplier_id','$product_name','$product_price')";
	$result = $conn->query($sql);

	return $result;
}

function all_product(){
	global $conn;

	$sql = "SELECT * FROM product";
	$result = $conn->query($sql);

	return $result;

}

function select_product($id){
	global $conn;

	$sql = "SELECT * FROM product WHERE supplier_id = '$id'";
	$result = $conn->query($sql);

	return $result;

}

function edit_product($id,$name,$price){
	global $conn;
	$sql = "UPDATE product SET product_name = '$name', product_price = '$price' WHERE product_id = '$id'";
	$result = $conn->query($sql);

	return $result;
}

function delete_product($id){
	global $conn;
	$sql = "DELETE FROM product WHERE product_id = '$id'";
	$result = $conn->query($sql);

	return $result;
}

function booking($name,$price,$user_id){
	global $conn;
	$now = date("Y-m-d");
	$sql = "INSERT INTO booking (customer_id,booking_date,product_name,product_price) VALUES ('$user_id','$now','$name','$price')";
	$result = $conn->query($sql);

	return $result;

}

function showBooking($id){
	global $conn;
	$sql = "SELECT * FROM booking WHERE customer_id = '$id'";
	$result = $conn->query($sql);

	return $result;

}

function getServices() {
	global $conn;
	$allServices = array();
	$sql = "SELECT * FROM event";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$allServices[] = array('event_id' => $row['event_id'], 
							   'event_name' => $row['event_name'], 
							   'supplier_id' => $row['supplier_id'], 
							   'link' => $row['link']);
	}

	return $allServices;
}

// Get all event services from this supplier
// for supplier at supplier_view.php
function getSupplierServices($id) {
	global $conn;
	$myService = array();
	$sql = "SELECT * FROM event WHERE supplier_id = '$id'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$myService[] = array('event_id' => $row['event_id'], 
							 'event_name' => $row['event_name'], 
							 'link' => $row['link']);
	}

	return $myService;
}

// Get all details for an event service
// for customer at service_detail_view.php
// for supplier at manage_service_view2.php
function getDetails($id) {
	global $conn;
	$service = array();
	$sql = "SELECT * FROM event INNER JOIN supplier ON supplier.supplier_id = event.supplier_id WHERE event.event_id = '$id'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$service[] = array('event_id' => $row['event_id'], 
						   'supplier_id' => $row['supplier_id'], 
						   'event_name' => $row['event_name'], 
						   'event_price' => $row['event_price'], 
						   'classification' => $row['classification'], 
						   'status' => $row['status'], 
						   'link' => $row['link'],
						   'name' => $row['company'],
						   'description' => $row['description']);
	}

	return $service;
}

// Get questions and replies from this event service
// for customer at service_detail_view.php
function getQuestions($id) {
	global $conn;
	$question = array();
	$sql = "SELECT * FROM question WHERE event_id = '$id'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$question[] = array('question' => $row['question'], 
							'reply' => $row['reply']);
	}

	return $question;
}

// Get all questions and replies from this supplier
// for supplier at supplier_view.php
function getAllQuestions($id) {
	global $conn;
	$allQuestion = array();
	$sql = "SELECT * FROM question WHERE supplier_id = '$id'";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$allQuestion[] = array('question_id' => $row['question_id'], 
							   'question' => $row['question'], 
							   'reply' => $row['reply']);
	}

	return $allQuestion;
}

// Insert service function 
// for supplier at manage_service_view.php
function insertService($id, $name, $price, $classification, $status, $date, $link, $description) {
	global $conn;
	$sql = "INSERT INTO event (supplier_id, event_name, event_price, classification, status, date_update, link, description) 
			VALUES ('$id','$name','$price','$classification','$status','$date','../assets/$link','$description')";
	$result = $conn->query($sql);

	return $result;
}

// Update service function 
// for supplier at manage_service_view2.php
function updateService($event_id, $supplier_id,$name, $price, $classification, $status, $date, $link, $description) {
	global $conn;
	$sql = "UPDATE event SET event_name = '$name', event_price = '$price', classification = '$classification', 
			status = '$status', date_update = '$date', link = '../assets/$link', description = '$description' 
			WHERE event_id = '$event_id'";
	$result = $conn->query($sql);

	return $result;
}

// Delete service function 
// for supplier at supplier_view.php
function deleteService($id) {
	global $conn;
	$sql = "DELETE FROM event WHERE event_id = '$id'";
	$result = $conn->query($sql);

	return $result;
}

// Insert question function 
// for customer at service_detail_view.php
function insertQuestion($supplier_id, $event_id, $question) {
	global $conn;
	$sql = "INSERT INTO question (supplier_id, event_id, question, reply) 
			VALUES ('$supplier_id','$event_id','$question','')";
	$result = $conn->query($sql);

	return $result;
}

// Update question function by updating reply attribute 
// for supplier at supplier_view.php
function insertReply($id, $reply) {
	global $conn;
	$sql = "UPDATE question SET reply = '$reply' WHERE question_id = '$id'";
	$result = $conn->query($sql);

	return $result;
}

function event_booking($customer_id,$product_name,$product_price){
	global $conn;
	$now = date("Y-m-d");
	$sql = "INSERT INTO booking (customer_id,booking_date,product_name,product_price) VALUES ('$customer_id','$now','$product_name','$product_price')";
	$result = $conn->query($sql);

	return $result;
}

function deleteBooking($id) {
	global $conn;
	$sql = "DELETE FROM booking WHERE booking_id = '$id'";
	$result = $conn->query($sql);

	return $result;
}

//--------------------------------------------------------------------------------------------------------------------

class model
{
	public function DB_connect(){
		//DECLARATION OF DATABASE
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "ems";
		
 		//CREATE CONNECTION
		$conn = mysqli_connect($servername, $username, $password,$dbname);
		//CHECK CONNECTION
		if ($conn->connect_error)
		{
			
    		die("Connection failed: " . $conn->connect_error);
		}
		// print("111");
		return $conn; 
	}
	public function cart_list($customer_id)
	{
		$conn = $this->DB_connect();
		if($customer_id){
			$sql = "SELECT * FROM booking where customer_id = '$customer_id'";
		}else{
			$sql = "SELECT * FROM booking";
		}
		
		$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		$i = 0;
		$cart=array();
		// print($sql);
		while($rows = mysqli_fetch_assoc($resultset)){
			// print($sql);
			$cart[$i]=  $rows;
			$i = $i+1;
		}
		// print($cart);
		//RETURN THE RESULT ThistoryO CONTROLLER
		return $cart;
	}

	public function history_list($customer_id)
	{
		$conn = $this->DB_connect();
		if($customer_id){
			$sql = "SELECT * FROM payment where customer_id = ".$customer_id;
		}else{
			$sql = "SELECT * FROM payment";
		}
		
		$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		$i = 0;
		$history=array();
		// print($sql);
		while($rows = mysqli_fetch_assoc($resultset)){
			// print($sql);
			$history[$i]=  $rows;
			$i = $i+1;
		}
		// print($cart);
		//RETURN THE RESULT TO CONTROLLER
		return $history;
	}

	public function cart_pay_success(){
		$conn = $this->DB_connect();
		$sql = "DELETE FROM booking";
		$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		return $resultset;
	}

	public function cart_insert_success($account,$customer_id){
		$conn = $this->DB_connect();
		$time = time();
		$sql = "INSERT INTO payment(order_number,total_payment, customer_id) VALUES (".$time.", '".$account."', '".$customer_id."')";
		// print_r($sql);
		$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
		return $resultset;
	}

}
?>