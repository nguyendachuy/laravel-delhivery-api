<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Resources\Resource;

class OrderResource extends Resource
{
    /**
     * Package Order Creation/Manifestation API
     * 
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $endpoint = 'api/cmu/create.json';

        return $this->postCreateOrderRequest($endpoint, $data);
    }
    /**
     * Edit Order API
     * 
     * @param array $params
     * @return mixed
     */
    public function edit(array $params)
    {
        $endpoint = 'api/p/edit';

        return $this->postRequest($endpoint, $params);
    }
    /**
     * Order Tracking API
     * 
     * @param string $waybill
     * @return mixed
     */
    public function cancel(string $waybill)
    {
        $endpoint = 'api/v1/packages/json';

        return $this->postRequest($endpoint, ['waybill' => $waybill, 'cancellation' => 'true']);
    }
    /**
     * Order Tracking API
     * 
     * @param string $waybill
     * @return mixed
     */
    public function track(string $waybill)
    {
        $endpoint = 'api/v1/packages/json';

        return $this->getRequest($endpoint, ['waybill' => $waybill]);
    }
}
