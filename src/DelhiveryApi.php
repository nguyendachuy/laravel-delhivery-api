<?php

namespace NguyenHuy\Delhivery;

use NguyenHuy\Delhivery\Clients\DelhiveryClient;
use NguyenHuy\Delhivery\Resources\InvoiceResource;
use NguyenHuy\Delhivery\Resources\NDRResource;
use NguyenHuy\Delhivery\Resources\OrderResource;
use NguyenHuy\Delhivery\Resources\PackingSlipResource;
use NguyenHuy\Delhivery\Resources\PickupResource;
use NguyenHuy\Delhivery\Resources\PincodeResource;
use NguyenHuy\Delhivery\Resources\WarehouseResource;
use NguyenHuy\Delhivery\Resources\WaybillResource;

class DelhiveryApi
{
    /**
     * https://delhivery-express-api-doc.readme.io/
     * 
     */
    public $client;

    public function __construct(DelhiveryClient $client)
    {
        $this->client = $client;
    }

    /**
     * Pincode related wrapper class
     *
     * @return mixed
     */
    public function pincode()
    {
        return new PincodeResource($this->client);
    }
    /**
     * Waybill related wrapper class
     *
     * @return mixed
     */
    public function waybill()
    {
        return new WaybillResource($this->client);
    }
    /**
     * Order related wrapper class
     *
     * @return mixed
     */
    public function order()
    {
        return new OrderResource($this->client);
    }

    /**
     * Warehouse related wrapper class
     *
     * @return mixed
     */
    public function warehouse()
    {
        return new WarehouseResource($this->client);
    }
    /**
     * Warehouse related wrapper class
     *
     * @return mixed
     */
    public function packingSlip()
    {
        return new PackingSlipResource($this->client);
    }

    /**
     * Pickup request related wrapper class
     *
     * @return mixed
     */
    public function pickup()
    {
        return new PickupResource($this->client);
    }

    /**
     * Invoice related wrapper class
     *
     * @return mixed
     */
    public function invoice()
    {
        return new InvoiceResource($this->client);
    }

    /**
     * Invoice related wrapper class
     *
     * @return mixed
     */
    public function ndr()
    {
        return new NdrResource($this->client);
    }
}
