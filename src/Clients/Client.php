<?php
namespace NguyenHuy\Delhivery\Clients;

interface Client
{
    public function setEndpoint(string $endpoint);

    public function setHeaders(array $data);

    public function get(array $data);
    
    public function post(array $data);

    public function isCreateOrder($boolean);

    public function patch(array $data);
}
