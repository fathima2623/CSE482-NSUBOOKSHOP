<!DOCTYPE html>
<html>
    <head>
        <title>NSU Bookshop</title>
        <link rel="stylesheet" href="rifat2.css" />
        <script src="store.js" async></script>
    </head>
	<body>
</body>
</html>	
<?php
require('config.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>"1000",
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
