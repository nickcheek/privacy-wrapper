<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class Funding
{
    use ApiCall;

    public string $apiKey;
    public string $method;

    public function __construct(string $apiKey, $method)
    {
        $this->apiKey = $apiKey;
        $this->method = $method;
    }

    public function addBank(int $routingNumber, int $accountNumber, ?string $accountName = null): object
    {
        $params =  [
            'routing_number' => $routingNumber,
            'account_number' => $accountNumber,
            'account_name' => $accountName
        ];

        return json_decode($this->apiPost($this->apiKey, 'fundingsource/bank', $params, $this->method));
    }

    public function listFundingSources(): object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource', null,  $this->method));
    }

    public function listFundingBanks(): object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource/bank', null,  $this->method));
    }

    public function listFundingCards(): object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource/card', null,  $this->method));
    }
}
