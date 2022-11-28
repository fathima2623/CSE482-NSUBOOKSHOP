<?php
require('config.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>1000,
		"currency"=>"usd",
		"description"=>"Book Name",
		"source"=>$token,
		#"success_url"=>'dashboard.html',
	));
	echo "<h1>Thanks for your order, your payment is successful</h1>";
	#echo "<pre>";
	#print_r($data);


}
?>