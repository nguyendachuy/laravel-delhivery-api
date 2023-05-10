<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class WaybillResource extends Resource
{
    /**
     * create waybill
     * 
     * Waybill is the unique number which is assigned to every shipment that moves in delhivery network. 
     * Bulk waybill API generates the waybill list in advance which can be stored and used in order 
     * creation API, Any number of waybill can be downloaded from this API by specifying a count.
     * 
     * @param array $params
     * @return mixed
     */
    public function bulk(array $params)
    {
        $endpoint = 'waybill/api/bulk/json';

        return $this->getRequest($endpoint, $params);
    }
    /**
     * fetch waybill
     * 
     * Fetch waybill API facilitates to fetch one waybill at a time, every time the API is hit.
     * 
     * @return mixed
     */
    public function fetch(array $params = [])
    {
        $endpoint = 'waybill/api/fetch/json';

        return $this->getRequest($endpoint, $params);
    }
}
