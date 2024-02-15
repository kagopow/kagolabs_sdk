<?php
namespace KAGOLABS\Api;

use KAGOLABS\Common\KAGOLABSModel;

/**
 * Class Payer
 * @property string paymentMethod
 *
 */
class Payer extends KAGOLABSModel
{

    /**
     * Valid Values: ["KAGOLABS"]
     * method will be like KAGOLABS, paypal, stripe etc
     * @param  string  $method
     * @return $this
     */
    public function setPaymentMethod($method)
    {
        $this->paymentMethod = $method;
        return $this;
    }

    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

}
