<!-- Menu Bar & Header Text -->
<?php include 'header.php'?>
<link rel="stylesheet" href="./static/bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">  
<?php include '../controller/manage_payment_controller.php'?>
<?php 
  $payment = new payment();
  // print("111112");
  $history1 = $payment->pay_success();
  $history = $payment->history_view();
// $cart_list = $details->cart_list();
// while($rows = mysqli_fetch_assoc($cart_list)){
//  print_r($rows);

  $length = count($history);
?>
<!-- Your Content Coding will be here -->
<div class="content">

<style type="text/css">      
    /* body{color:#000;background-color:#fff;} */
    .content_successful{width:90%;height:400px;margin:0 auto;border:2px solid #000;padding: 0 10px;}
    .content_successful .content{text-align: center;}
    .content_successful .content_buttoncart
    .content_successful .content_buttoncart button{width:100px;height:30px;font-size:16px;line-height: 30px;padding-left: 20;margin:0;}
        .content_cart .content_buttonhistory
    .content_successful .content_buttonhistory button{width:100px;height:30px;font-size:16px;line-height: 30px;padding-right: 20;margin:0;}
</style>



<div class="content_successful">

    <div class="content">
        <h1>Payment Successful</h1>
        <p>Your payment has been process successful.</p>
        <p>For your reference, your invoice no is 
        <td> <?php echo $history[$length-1]['invoice_id']; ?></td>
        </p>
    </div>

    <div style="width:60%;height:100px;margin:0 auto;border:0px solid #000;padding: 0 10px;">

      <button type="content_buttoncart" class="btn btn-outline-info" style="float:left" onclick="window.location.href = 'customer_cart_view.php';">Back To Cart
      </button>


    <button type="content_buttoncart" class="btn btn-outline-info" style="float:right;" onclick="window.location.href = 'payment_history_view.php';">View History
    </button>
  </div>
</div>




<!-- Footer Text -->
<?php include 'footer.php' ?>