<?php

namespace Nickcheek\PrivacyWrapper\Service;

use Nickcheek\PrivacyWrapper\Traits\ApiCall;

class User
{
    use ApiCall;

    public string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function enroll(string $first_name, string $last_name, string $dob, string $street1, ?string $street2 = null, int $zipcode, int $ssn_last_four, ?string $phone_number = null, ?string $email = null)
    {
        $params =  [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dob' => $dob,
            'street1' => $street1,
            'street2' => $street2,
            'zipcode' => $zipcode,
            'ssn_last_four' => $ssn_last_four,
            'phone_number' => $phone_number,
            'email' => $email
        ];

        return json_decode($this->apiPost($this->apiKey, 'enroll', $params));
    }
}
