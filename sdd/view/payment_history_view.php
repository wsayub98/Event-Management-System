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
    #password : nVrv!ME6
    $payment = new payment();
    // print("111112");
    $history = $payment->history_view();
    // print_r($history);

    // print("11111");
    // print_r($cart);
    // $cart=array(
    //     '0'=>array('id'=>'001','good_name'=>'good1','good_count'=>1,'good_account'=>15),
    //     '1'=>array('id'=>'002','good_name'=>'good2','good_count'=>1,'good_account'=>15),
    // );
    $length = count($history);
    // $all_good_account = 0;
?>
<style type="text/css">      
    /* body{color:#000;background-color:#fff;} */
    .content_payment{width:100%;height:900px;margin:0 auto;border:2px solid #000;padding: 0 10px;}
    .content_payment .content_header{text-align: center;}
    .content_payment .content_middle{width:100%;height:50px;font-size:16px;line-height:50px;font-weight: bold; padding-left: 20px;}
    .content_payment .content_middle .content_middle_left{width:50%;float:left;}
    .content_payment .content_middle .content_middle_right{width:50%;float:right;}
    .content_payment .content_bottom{width:100%;height:60px;font-size:14px;line-height:30px;font-weight: bold; padding-left: 20px;}
    .content_payment .content_bottom .content_bottom_up{width:50%;height: 30px;}
    .content_payment .content_bottom .content_bottom_down{width:50%;height: 30px;}
    .content_payment .content_table{}
    .content_payment .content_button{float:right}
    .content_payment .content_button button{width:100px;height:30px;font-size:16px;line-height: 30px;padding: 0;margin:0;}
    table, th, td {  border: 1px solid black;  border-collapse: collapse;}
    th, td {  padding: 10px;}
    th {  text-align: left;}
</style>  
<!-- Your Content Coding will be here -->
<div class="content_payment" style="height:76vh;">
    <div class="content_header">
        <h1>Payment History</h1>
    </div>


    <div class="content_table">
        <table class="table">
            <thead class="table-info">
                <tr>
                <th>Invoice ID</th>
                <th>Order Number</th> 
                <th>Payment Time</th>
                <th>Payment Amount</th>
                <th>Customer ID</th>
                </tr>
            </thead>
        <tbody> 
            <?php   for($i = 0; $i < $length; $i++){
            ?>
                <tr>
                    <td><?php echo $history[$i]['invoice_id'];?></td>
                    <td><?php echo $history[$i]['order_number'];?></td>
                    <td><?php echo $history[$i]['payment_time'];?></td>
                    <td><?php echo $history[$i]['total_payment'];?></td>
                    <td><?php echo $history[$i]['customer_id'];?></td>
                </tr>
            <?php }?>
        </tbody>
        </table>
    </div>

<!-- Footer Text -->
<?php include 'footer.php' ?>