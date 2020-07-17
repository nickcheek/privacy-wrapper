<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class Funding
{
    use ApiCall;

    public string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function addBank(int $routingNumber, int $accountNumber, ?string $accountName = null) : object
    {
        $params =  [
            'routing_number' => $routingNumber,
            'account_number' => $accountNumber,
            'account_name' => $accountName
        ];

        return json_decode($this->apiPost($this->apiKey, 'fundingsource/bank', $params));
    }

    public function listFundingSources() : object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource'));
    }

    public function listFundingBanks() : object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource/bank'));
    }

    public function listFundingCards() : object
    {
        return json_decode($this->apiGet($this->apiKey, 'fundingsource/card'));
    }
}
