<?php

namespace NguyenHuy\Delhivery\Resources;

use NguyenHuy\Delhivery\Clients\Client;
use NguyenHuy\Delhivery\Resources\ResourceInterface;

abstract class Resource implements ResourceInterface
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getRequest(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->client->setEndpoint($endpoint)
            ->setHeaders($headers)
            ->get($params);
    }

    public function postRequest(string $endpoint, array $params, $headers = [])
    {
        return $this->client->setEndpoint($endpoint)
            ->setHeaders($headers)
            ->post($params);
    }

    public function postCreateOrderRequest(string $endpoint, array $params, $headers = [])
    {
        return $this->client->isCreateOrder(true)
            ->setEndpoint($endpoint)
            ->setHeaders($headers)
            ->post($params);
    }

    public function patchRequest(string $endpoint, array $params, $headers = [])
    {
        return $this->client->setEndpoint($endpoint)
            ->setHeaders($headers)
            ->patch($params);
    }
}
