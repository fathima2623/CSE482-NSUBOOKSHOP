<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>NSU Bookshop</title>
        <link rel="stylesheet" href="rifat2.css" />
        <script src="store.js" async></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    </head>
	<body>
</body>
</html>	
<?php



require('config.php');

if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);
    $pr = $_POST["total"];
	$token=$_POST['stripeToken'];
   
	$data=\Stripe\Charge::create(array(
		"amount"=>$pr*100,
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
