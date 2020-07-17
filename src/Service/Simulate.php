<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class Simulate
{
    use ApiCall;

    public string $apiKey;
    public string $method;

    public function __construct(string $apiKey, $method)
    {
        $this->apiKey = $apiKey;
        $this->method = $method;
    }

    public function authorize(string $descriptor, int $pan, int $amount)
    {
        $params =  [
            'descriptor' => $descriptor,
            'pan' => $pan,
            'amount' => $amount
        ];

        return json_decode($this->apiPost($this->apiKey, 'simulate/authorize', $params, $this->method));
    }

    public function void(string $token, int $amount)
    {
        $params =  [
            'token' => $token,
            'amount' => $amount
        ];

        return json_decode($this->apiPost($this->apiKey, 'simulate/void', $params, $this->method));
    }

    public function clearing(string $token, int $amount)
    {
        $params =  [
            'token' => $token,
            'amount' => $amount
        ];

        return json_decode($this->apiPost($this->apiKey, 'simulate/clearing', $params, $this->method));
    }

    public function return(string $descriptor, int $pan, int $amount)
    {
        $params =  [
            'descriptor' => $descriptor,
            'pan' => $pan,
            'amount' => $amount
        ];

        return json_decode($this->apiPost($this->apiKey, 'simulate/return', $params, $this->method));
    }
}
