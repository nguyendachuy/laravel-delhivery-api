<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class WarehouseResource extends Resource
{
    /**
     * Client Warehouse Creation API
     * 
     * Our system consider every physical pickup location from where order needs 
     * to be picked up as a warehouse. Only for registered pickup locations/warehouses, 
     * order creation is allowed and hence before creating an order, 
     * the client warehouse needs to be created in our system. 
     * 
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        $endpoint = 'api/backend/clientwarehouse/create/';

        return $this->postRequest($endpoint, $params, ['Accept' => 'application/json']);
    }

    /**
     * Client Warehouse Edit API
     * 
     * @param array $params
     * @return mixed
     */
    public function edit(array $params)
    {
        $endpoint = 'api/backend/clientwarehouse/edit/';

        return $this->postRequest($endpoint, $params);
    }
}
