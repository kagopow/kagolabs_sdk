<?php

require 'vendor/autoload.php';

//if you want to change the namespace/path from 'KAGOLABS' - lines[1-5] - to your desired name,i.e. (use KAGOLABS\Api\Amount; to use MyDomain\Api\Amount;), then you must change the folders name that holds the API classes as well as change the property 'KAGOLABS' in (autoload->psr-0) of (php-sdk/composer.json) file to your desired name and run "composer dump-autoload" command from sdk root

use KAGOLABS\Api\Amount;
use KAGOLABS\Api\Payer;
use KAGOLABS\Api\Payment;
use KAGOLABS\Api\RedirectUrls;
use KAGOLABS\Api\Transaction;

//Payer Object
$payer = new Payer();
$payer->setPaymentMethod('KAGOLABS'); //preferably, your system name, example - KAGOLABS

//Amount Object
$amountIns = new Amount();
$amountIns->setTotal(5.99)->setCurrency('USD'); //must give a valid currency code and must exist in merchant wallet list

//Transaction Object
$trans = new Transaction();
$trans->setAmount($amountIns);

//RedirectUrls Object
$urls = new RedirectUrls();
$urls->setSuccessUrl('http://your-merchant-domain.com/example-success.php') //success url - the merchant domain page, to redirect after successful payment, see sample example-success.php file in sdk root, example - https://kagolabs.com/KAGOLABS_sdk/example-success.php

->setCancelUrl('http:/your-merchant-domain.com/'); //cancel url - the merchant domain page, to redirect after cancellation of payment, example -  https://kagolabs.com/KAGOLABS_sdk/


//Payment Object
$payment = new Payment();
$payment->setCredentials([ //Client ID & Secret = Merchants->setting(gear icon)
    'client_id'     => 'place your client id here', //must provide correct client id of an express merchant
    'client_secret' => 'place your client secret here', //must provide correct client secret of an express merchant
])
->setRedirectUrls($urls)
->setPayer($payer)
->setTransaction($trans);

try {
    $payment->create(); //create payment
    header("Location: " . $payment->getApprovedUrl()); //checkout url
}
catch (\Exception $ex)
{
    print $ex;
    exit;
}
