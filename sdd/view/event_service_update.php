<!-- Menu Bar & Header Text -->
<?php 
include 'header.php';
include '../controller/manage_payment_controller.php';
if($_SESSION['type'] != 0 && $_SESSION['type'] != 2){
  echo "<script>alert('This section only allow Customer access')</script>";
  echo "<script>window.location.assign('home_view.php')</script>";
}

?>
<?php
    $booking_id;
    $count;
    //Set variables for paypal form
    $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
    //Test PayPal API URL
    $paypal_email = 'sb-avigx636803@personal.example.com';
    #password : nVrv!ME6
    $payment = new payment();
    // print("111112");
    $cart = $payment->view();
    // print($cart_list);

    // print("11111");
    // print_r($cart);
    // $cart=array(
    //     '0'=>array('id'=>'001','good_name'=>'good1','good_count'=>1,'good_account'=>15),
    //     '1'=>array('id'=>'002','good_name'=>'good2','good_count'=>1,'good_account'=>15),
    // );
    $length = count($cart);
    $all_good_account = 0;
?>
<link rel="stylesheet" href="./static/bootstrap-4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style type="text/css">      
    /* body{color:#000;background-color:#fff;} */

    .btn-outline-danger {
        margin-left: 20px;
        width: 100px;
        height: 45px;
        font-size: 14px;
        }
    .content_cart{width:90%;height:500px;margin:0 auto;border:2px solid #000;padding: 0 10px;}
    .content_cart .content_header{text-align: center;}
    .content_cart .content_middle{width:100%;height:50px;font-size:16px;line-height:50px;font-weight: bold; padding-left: 20px;}
    .content_cart .content_middle .content_middle_left{width:50%;float:left;}
    .content_cart .content_middle .content_middle_right{width:50%;float:left;}
    .content_cart .content_bottom{width:100%;height:60px;font-size:14px;line-height:30px;font-weight: bold; padding-left: 20px;}
    .content_cart .content_bottom .content_bottom_up{width:50%;height: 30px;}
    .content_cart .content_bottom .content_bottom_down{width:50%;height: 30px;}
    .content_cart .content_table{}
    .content_cart .content_button{float:right}
    .content_cart .content_button button{width:100px;height:30px;font-size:16px;line-height: 30px;padding: 0;margin:0;}
    table, th, td {  border: 1px solid black;  border-collapse: collapse;}
    th, td {  padding: 10px;}
    th {  text-align: left;}
</style>
<script type="text/javascript">
    function confirmDelete() {

    var check = confirm("Are you sure you want to cancel this booked event?");

    if(check) {
        return true
    }
    else
        return false
}
</script>

<!-- Your Content Coding will be here -->
<div class="content_cart" style="margin-bottom: 14%;">
    <div class="content_header" >
        <h1>Booked Event</h1>
    </div>

    <div class="content_table">
     <form action="../manage_event_controller.php" name="deletes" method="GET">
        <table class="table">
            <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product</th> 
                <th>Price</th>
                <th>Date</th>
                <th>Action</th>
                </thead>
            </tr>
            <?php if(count($cart)==0) echo"<h2>No event booked.</h2>"?>
            <?php   for($i = 0; $i < $length; $i++){
                $all_good_account = $all_good_account + $cart[$i]['product_price'];
            ?>
            <tr>
                <td><?php echo($cart[$i]['booking_id']); ?></td>
                <td><?php echo($cart[$i]['customer_id']); ?></td>
                <td><?php echo($cart[$i]['product_name']); ?></td>
                <td><?php echo($cart[$i]['product_price']); ?></td>
                <td><?php echo($cart[$i]['booking_date']); ?></td>
                <td><a href='../controller/manage_event_controller.php? id=<?php echo $cart[$i]["booking_id"]; ?>'>Cancel</a>
            </tr>
            <?php }?>
        </table>
     </form>
    </div>



    
</div> 

<!-- Footer Text -->
<?php include 'footer.php' ?>