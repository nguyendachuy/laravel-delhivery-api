<?php
namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class PincodeResource extends Resource
{
    /**
     * Get All Pickup Locations
     * 
     * The Serviceability API in response gives you a list of all pincode serviced by Delhivery, 
     * with flags donating if the pincode is serviceable for both prepaid and COD package or not. 
     * Also, an “NSZ” response for an AWB would mean that the pin code is not serviceable. 
     * 
     * @param array $params
     * @return mixed
     */
    public function getLocations(array $params)
    {
        $endpoint = 'c/api/pin-codes/json';

        return $this->getRequest($endpoint, $params);
    }
}
