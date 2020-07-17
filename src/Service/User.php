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

    public function enroll($first_name, $last_name, $dob, $street1, $street2 = null, $zipcode, $ssn_last_four, $phone_number = null, $email = null)
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
