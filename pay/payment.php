<?php

if($_POST){

	require_once('vendor/stripe/stripe-php/init.php');

	$amount =  $_POST["amount"];
	$amountCharge = $amount*100;
	$name =   $_POST["fname"]." ".$_POST["lname"];
	$state =    $_POST["state"];
	$zip =    $_POST["zip"];
	$email =    $_POST["email"];
	$token =    $_POST["token"];
	$country   =  $_POST["country"];
	$city =    $_POST["city"];
	$brand =    $_POST["brand"];
	$package_info =    $_POST["package_info"];
	
	
//	fname,lname,address,city,country,state,zip,email,token
	
	$stripe = new \Stripe\StripeClient(
	  'sk_test_2uywUwXP5FGjvRawbCnWpDZY'
	);
	$response =  $stripe->charges->create([
	  'amount' => $amountCharge,
	  'currency' => 'usd',
	  'source' => $token,
	  'description' => 'Payment of brand : '.$brand,
	    "metadata" => ["name" => $name , "email" => $email , "country" => $country,
		"state" => $state, "zip" => $zip , "city" => $city, "brand" => $brand, "package_info" => $package_info,   ]

	]);
	if($response){
		
		$to      = 'Billing@abc.com';
		$subject = 'Payment recieved from '.$name;
		$message = "Hello Admin , <br/> You have recieved the payment of $amount having below details
		   <br/>
		   Name : $name <br>
		   Email : $email <br>
		   country : $country <br>
		   city : $city <br>
		   state : $state <br>
		   zip : $zip <br>
		   brand : $brand <br>
		   package_info : $package_info <br>
		   
		";
		$headers = 'From: billing@abc.com'       . "\r\n" .
					 'Reply-To: billing@abc.com' . "\r\n" .
					'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					 
					 'X-Mailer: PHP/' . phpversion();

	   $resp =  mail($to, $subject, $message, $headers);
		$messageCustomer = "Your payment has been completed of amount ".$amount;
	     mail($email, "Payment complete", $messageCustomer, $headers);
		
		
	echo json_encode(array("success"=> true , "data" => $response->id));
		
	}else{
	echo json_encode(array("success"=> false , "data" => $response));
		
	}
	
}







?>