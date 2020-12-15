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
<!-- Your Content Coding will be here -->
<div class="content_cart" style="margin-bottom: 14%;">
    <div class="content_header" >
        <h1>Cart</h1>
    </div>

    <div class="content_table">
        <table class="table">
            <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Product</th> 
                <th>Price</th>
                <th>Date</th>
                </thead>
            </tr>
            <?php   for($i = 0; $i < $length; $i++){
                $all_good_account = $all_good_account + $cart[$i]['product_price'];
            ?>
            <tr>
                <td><?php echo($cart[$i]['booking_id']); ?></td>
                <td><?php echo($cart[$i]['customer_id']); ?></td>
                <td><?php echo($cart[$i]['product_name']); ?></td>
                <td><?php echo($cart[$i]['product_price']); ?></td>
                <td><?php echo($cart[$i]['booking_date']); ?></td>
            </tr>
            <?php }?>
        </table>
    </div>



    <div class="content_button">
    
        <form action="<?php echo $paypal_url; ?>" method="post">
        
            <!-- <p><input type="image" name="submit" border="0" id="submit"
            src="http://www.dermitech.com/image/PayPal-PayNow-Button.png" alt="PayPal - The safer, easier way to pay online" width="300" height="50" align="right"></p> -->
            <!-- PAYPAL BUSINES TEST ACCOUNT EMAIL ID SO THAT YOU CAN COLLECT THE PAYMENTS -->
            <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">      
            <!-- BUY NOW BUTTON -->
            <input type="hidden" name="cmd" value="_xclick">  
            <!-- DETAILS ABOUT THE ITEM THAT BUYERS WILL PURCHASE -->
            <div class="w3-quarter w3-container">
            <input type="hidden" name="item_name" value="cart">
            <input type="hidden" name="item_number" value="1">
            <input type="hidden" name="amount" value="<?php echo($all_good_account);?>">
            <input type="hidden" name="customer_id" value="123">
            <input type="hidden" name="currency_code" value="MYR">      
            <!-- URLs -->
            <input type='hidden' name='cancel_return' value='http://localhost/sdd/view/customer_cart_view.php'>
            <input type='hidden' name='return' value='http://localhost/sdd/view/payment_successful_view.php'>
            <input type="submit" class="btn btn-outline-info" value="Paypal"></input>
        </form>
        
    </div>
</div> 

<!-- Footer Text -->
<?php include 'footer.php' ?>