<?php 
// error_reporting(0);
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

?>
<!DOCTYPE HTML>
<html>
<title>Event Management System</title>
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
<style>

html, body {
  height: 100%;
  font-size:20px;
  font-family: Arial, Helvetica, sans-serif;

}

h1 {
  padding-top: 20px;
  padding-bottom: 10px;
  font-size: 40px;
}

h2 {
  font-size: 25px;
}

input[type=text] {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size: 15px;
}

/*new*/
.content {
  flex: 1 0 auto;
}

footer {
  flex-shrink: 0;
  margin-top: 25px;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #0c696e;
  text-align: center;
  color: white;
}

</style>
</head>

<body>
<h1><center>Event Management System</center></h1>
<nav class="navbar navbar-expand-lg navbar-light" style="justify-content: center; padding: 0px; background-color: #0c696e; color:white;">
  <ul class="navbar-nav">
    <li class="nav-item active ">
      <a class="nav-link" href="home_view.php" style="color:white">Home</a>
    </li>

    <!-- Dropdown List Items -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="supplies" role="button" data-toggle="dropdown" style="color:white">
        Supplies
      </a>
      <div class="dropdown-menu" aria-labelledby="supplies">
        <a class="dropdown-item" href="update_status_view.php">Update Status</a>
        <a class="dropdown-item" href="status_management_view.php">Status Management</a>
        <a class="dropdown-item" href="customer_rating_view.php">Customer Rating</a>
        <a class="dropdown-item" href="supplier_view.php">Manage Service</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="supplies" role="button" data-toggle="dropdown" style="color:white">
        Event
      </a>
      <div class="dropdown-menu" aria-labelledby="supplies">
        <a class="dropdown-item" href="event_service_view.php">Event Services</a>
        <a class="dropdown-item" href="event_service_update.php">Booked Event</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="equipment" role="button" data-toggle="dropdown" style="color:white">
        Equipment
      </a>
      <div class="dropdown-menu" aria-labelledby="equipment">
        <a class="dropdown-item" href="manage_equipment_view.php">Manage Equipment</a>
        <a class="dropdown-item" href="request_equipment_view.php">Request Equipment</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="payment" role="button" data-toggle="dropdown" style="color:white">
        Payment
      </a>
      <div class="dropdown-menu" aria-labelledby="payment">
        <a class="dropdown-item" href="customer_cart_view.php">Cart</a>
        <a class="dropdown-item" href="payment_history_view.php">History</a>
      </div>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link" href="logout.php" id="track" role="button" style="color:white">
        Log Out
      </a>
    </li>

  </ul>

</nav>

 

<div class="content">

