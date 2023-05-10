<?php
namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class PickupResource extends Resource
{
    /**
     * Pickup Request Creation API
     * 
     * In order to inform the delhivery for the order to be picked up from the warehouse,
     *  pickup request creation API facilitates creation of a pickup request in delhivery
     *  system to further collect the shipments. 
     * 
     * @param array $params
     * @return mixed
     */
    public function request(array $params)
    {
        $endpoint = 'fm/request/new/';

        return $this->postRequest($endpoint, $params);
    }
}
