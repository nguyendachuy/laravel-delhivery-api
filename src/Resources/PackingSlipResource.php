<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class PackingSlipResource extends Resource
{
    /**
     * Packing Slip Creation API
     * 
     * Packing slip API allows you to design a packing slip for a waybill number 
     * is again an advance API to integrate, as same shipping label can be 
     * fetched directly from the CL panel.
     * 
     * @param string $waybill
     * @return mixed
     */
    public function print(string $waybill)
    {
        $endpoint = 'api/p/packing_slip';

        return $this->getRequest($endpoint, ['wbns' => $waybill]);
    }
}
