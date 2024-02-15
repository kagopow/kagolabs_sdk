<?php namespace KAGOLABS\Api;

use KAGOLABS\Common\KAGOLABSModel;

/**
 * Class Transaction
 * @property \KAGOLABS\Api\Amount amount
 *
 */

class Transaction extends KAGOLABSModel
{

    /**
     * @param \KAGOLABS\Api\Amount $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }
}