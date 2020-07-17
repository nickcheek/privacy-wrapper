<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class Card
{
    use ApiCall;

    public string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function createCard($token = '', $type = 'SINGLE_USE',  $spend_limit = 10000, $limit_duration = 'FOREVER', $state = 'OPEN'): object
    {
        $params = [
            'memo' => 'nicks test card',
            'type' => $type,
            'funding_token' => $token,
            'spend_limit' => $spend_limit,
            'spend_limit_duration' => $limit_duration,
            'state' => $state
        ];

        return json_decode($this->apiPost($this->apiKey, 'card', $params));
    }

    public function updateCard($card_token, $memo = null, $state = 'OPEN', $funding_token = '',  $spend_limit = 10000, $spend_limit_duration = 'FOREVER'): object
    {
        $params = [
            'card_token' => $card_token,
            'funding_token' => $funding_token,
            'state' => $state,
            'spend_limit_duration' => $spend_limit_duration,
            'spend_limit' => $spend_limit,
            'memo' => $memo
        ];

        return json_decode($this->apiPut($this->apiKey, 'card', $params));
    }

    public function listCards(): object
    {
        return json_decode($this->apiGet($this->apiKey, 'card'));
    }
}
