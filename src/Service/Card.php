<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class Card
{
    use ApiCall;

    public string $apiKey;
    public string $method;

    public function __construct(string $apiKey, $method)
    {
        $this->apiKey = $apiKey;
        $this->method = $method;
    }

    public function createCard(string $token = '', string $type = 'SINGLE_USE', int $spend_limit = 10000, string $limit_duration = 'FOREVER', string $state = 'OPEN'): object
    {
        $params = [
            'memo' => 'nicks test card',
            'type' => $type,
            'funding_token' => $token,
            'spend_limit' => $spend_limit,
            'spend_limit_duration' => $limit_duration,
            'state' => $state
        ];

        return json_decode($this->apiPost($this->apiKey, 'card', $params, $this->method));
    }

    public function updateCard(string $card_token, ?string $memo = null, string $state = 'OPEN', string $funding_token = '', int $spend_limit = 10000, string $spend_limit_duration = 'FOREVER'): object
    {
        $params = [
            'card_token' => $card_token,
            'funding_token' => $funding_token,
            'state' => $state,
            'spend_limit_duration' => $spend_limit_duration,
            'spend_limit' => $spend_limit,
            'memo' => $memo
        ];

        return json_decode($this->apiPut($this->apiKey, 'card', $params, $this->method));
    }

    public function listCards(): ?object
    {
        return json_decode($this->apiGet($this->apiKey, 'card', null, $this->method));
    }
}
