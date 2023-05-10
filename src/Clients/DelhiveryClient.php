<?php

namespace NguyenHuy\Delhivery\Clients;

class DelhiveryClient implements Client
{
    protected $urlLive = 'https://track.delhivery.com/';
    protected $urlStaging = 'https://staging-express.delhivery.com/';

    protected $endpoint;

    protected $headers;

    protected $token;

    protected $responseType;

    protected $isCreateOrder = false;

    public function __construct()
    {
        $this->token = config('delhivery.token');
        $this->responseType = config('delhivery.responseType', 'collection');
    }

    /**
     * set the endpoint
     *
     * @param string $endpoint
     * @return object $this
     */
    public function setEndpoint(string $endpoint): object
    {
        if (config('delhivery.mode') == 'staging') {
            $this->endpoint = $this->urlStaging . $endpoint;
        } else {
            $this->endpoint = $this->urlLive . $endpoint;
        }

        return $this;
    }

    /**
     * set the header
     *
     * @return object
     */
    public function setHeaders(array $data): object
    {
        $this->headers = array_merge(["Content-Type: application/json"], $data);
        array_push($this->headers, "Authorization: Token {$this->token}");
        return $this;
    }

    /**
     * Is create order?
     *
     * @param mixed $boolean
     * @return object
     */
    public function isCreateOrder($boolean)
    {
        $this->isCreateOrder = $boolean;
        return $this;
    }

    /**
     * Send the data using post request
     *
     * @param array $data
     * @return mixed
     */
    public function post(array $data, $type = "POST")
    {
        $fields = json_encode($data);
        if ($this->isCreateOrder) {
            $fields = 'format=json&data=' . $fields;
        }
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => $fields,
            CURLOPT_HTTPHEADER => $this->headers,
        ]);
        
        $response = curl_exec($curl);

        if (!$this->isValid($response)) {
            $response = json_encode(['curl_error' => curl_error($curl)]);
        }

        curl_close($curl);

        return $this->responseType($response);
    }

    /**
     * Send a data using PATCH Request
     *
     * @param array $data
     * @return mixed
     */
    public function patch(array $data)
    {
        return $this->post($data, 'PATCH');
    }

    /**
     * get the requested data using get request
     *
     * @param array $data
     * @return mixed
     */
    public function get(array $data)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->endpoint . '?' . http_build_query($data),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => $this->headers,
        ]);

        $response = curl_exec($curl);

        if (!$this->isValid($response)) {
            $response = json_encode(['curl_error' => curl_error($curl)]);
        }

        curl_close($curl);

        return $this->responseType($response);
    }

    /**
     * Check the return data is valid
     *
     * @param mixed $string
     * @return bool
     */
    private function isValid($string): bool
    {
        if (!$string) {
            return false;
        }

        return json_decode($string) ? true : false;
    }

    /**
     * Return the response type based on config responseType
     *
     * @param $response
     * @return mixed
     */
    private function responseType($response)
    {
        if ($this->responseType == 'collection') {
            return collect(json_decode($response, true));
        }

        if ($this->responseType == 'object') {
            return json_decode($response);
        }

        return json_decode($response, true);
    }
}
