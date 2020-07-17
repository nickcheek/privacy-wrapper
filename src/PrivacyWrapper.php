<?php

namespace Nickcheek\PrivacyWrapper;

use Nickcheek\PrivacyWrapper\Service\{Card,Funding,User,Simulate};

class PrivacyWrapper
{

    public string $apiKey;

    public function __construct(string $api)
    {
        $this->apiKey = $api;
    }

    public function Card($method='api'): object
    {
        return new Card($this->apiKey,$method);
    }

    public function Funding($method='api'): object
    {
        return new Funding($this->apiKey,$method);
    }

    public function User($method='api'): object
    {
        return new User($this->apiKey,$method);
    }

    public function Simulate($method='api'): object
    {
        return new Simulate($this->apiKey,$method);
    }
}
