<?php

namespace NguyenHuy\Delhivery\Resources;

interface ResourceInterface
{
    public function getRequest(string $endpoint, array $params, array $headers);

    public function postRequest(string $endpoint, array $params, array $headers);

    public function postCreateOrderRequest(string $endpoint, array $params, array $headers);

    public function patchRequest(string $endpoint, array $params, array $headers);
}
