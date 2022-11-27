<?php
 require('stripe-php-master/init.php');

 $publishablekey ="pk_test_51M7tDHA44CLHYScTv57IXJ3m7PwlXzH42ueADIzNXATeKzqkoj6BvExOJR68fTaa8TRgVEQaIHU1cAqod41M95M500uGiSKi9o";
 $secretkey ="sk_test_51M7tDHA44CLHYScTjIRrvlzm4VVPBunAUPjutYCfmBSXQcIScCLYLmP1gV7Fe7ExiB9VSNAkPqjIqTa32baOI2qs00v0k69LNr";

 \Stripe\Stripe::setApiKEy($secretkey);
?>