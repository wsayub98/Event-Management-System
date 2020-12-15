<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

require_once '../model/ems_model.php';

class payment
{

	public function view()
	{

		// GO TO MODEL CLASS IN MODEL CALL PP FUNCTION
		$details = new model();
		$resultset = $details->cart_list($_SESSION['user_id']);
		// RETURN THE RESULT TO VIEW
		return $resultset;
    }
	
	public function history_view()
	{

		// GO TO MODEL CLASS IN MODEL CALL PP FUNCTION
		$details = new model();
		$resultset = $details->history_list($_SESSION['user_id']);
		// RETURN THE RESULT TO VIEW
		return $resultset;
	}
	
    public function pay_success()
	{

		// // GO TO MODEL CLASS IN MODEL CALL PP FUNCTION
		$details = new model();
		$cart =  $details->cart_list($_SESSION['user_id']);
		// print_r($cart);
		$customer_id = $cart[0]['customer_id'];
		$account = 0;
		$length = count($cart);
		for($i = 0; $i < $length; $i++){
			$account = $account + $cart[$i]['product_price'];
		}
		// $time = time();
		
		// print_r($customer_id);
		// print_r($sql);
		// print_r("1111");
		$resultset = $details->cart_insert_success($account,$customer_id);
		$resultset = $details->cart_pay_success();
		// RETURN THE RESULT TO VIEW
		return $resultset;
	}

}

// $details = new payment();
// $cart_list = $details->pay_success();

?>

