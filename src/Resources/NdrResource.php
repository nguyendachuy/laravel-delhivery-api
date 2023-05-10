<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class NdrResource extends Resource
{
    /**
     * Asynchronous NDR Package Action API
     * 
     * NDR API- It allows you to take action on NDR packages. 
     * As of now, three actions "Deferred Delivery Date," "Edit Details," and "Reattempt - 
     * As per NDR instructions," can be taken via this API.
     *  this API is asynchronous and allowed partial update so it will give you a UPL 
     * id in response always.
     * @param array $params 
     * @return mixed
     */
    public function update(array $params)
    {
        $endpoint = 'api/p/update';

        return $this->postRequest($endpoint, $params);
    }

    /**
     * Get NDR status API- UPL id status can be checked from this API which you get from the NDR API
     * 
     * @param string $upl 
     * @return mixed
     */ 
    public function get(string $upl)
    {
        $endpoint = 'api/cmu/get_bulk_upl';

        return $this->getRequest($endpoint, ['UPL' => $upl, 'verbose' => true]);
    }
}
