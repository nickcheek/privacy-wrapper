<?php

namespace Nickcheek\PrivacyWrapper;

use Nickcheek\PrivacyWrapper\Service\{Card,Funding,User};

class PrivacyWrapper
{

    public string $apiKey;


    public function __construct(string $api)
    {
        $this->apiKey = $api;
    }

    public function Card(): object
    {
        return new Card($this->apiKey);
    }

    public function Funding(): object
    {
        return new Funding($this->apiKey);
    }

    public function User(): object
    {
        return new User($this->apiKey);
    }
}
