<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class InvoiceResource extends Resource
{
    /**
     * Invoice - Shipping Charge API
     * 
     * Invoice API facilitates calculation of the shipping charges for the shipments. 
     * This is to be noted that it roughly calculates the charges and give approximated values only.
     * 
     * @param array $params
     * @return mixed
     */
    public function getLocations(array $params)
    {
        $endpoint = 'api/kinko/v1/invoice/charges/.json';

        return $this->getRequest($endpoint, $params);
    }
}
