<?php

namespace KAGOLABS\Api;

use KAGOLABS\Common\KAGOLABSModel;

/**
 * Class RedirectUrls
 * @property string returnUrl
 * @property string cancelUrl
 *
 */

class RedirectUrls extends KAGOLABSModel
{
    public function setSuccessUrl($url)
    {
        $this->successUrl = $url;
        return $this;
    }

    public function getSuccessUrl()
    {
        return $this->successUrl;
    }

    public function setCancelUrl($url)
    {
        $this->cancelUrl = $url;
        return $this;
    }

    public function getCancelUrl()
    {
        return $this->cancelUrl;
    }
}