<?php

namespace Nickcheek\PrivacyWrapper\Traits;

use Exception;
use GuzzleHttp\Client;

trait ApiCall
{

    public function apiPost($apiKey, $url, array $params = null)
    {

        $client = new Client(['base_uri' => 'https://api.privacy.com/v1/']);
        $params = json_encode($params);
        dump($params);
        try {
            $response = $client->post($url, [
                'headers' => [
                    'content-type' => 'application/json',
                    'Authorization' => "api-key $apiKey",
                ],
                'body' => $params
            ]);
            return  $response->getBody()->getContents();
        } catch (Exception $e) {
            return $e;
        }
    }

    public function apiPut($apiKey, $url, $params = null)
    {

        $client = new Client(['base_uri' => 'https://api.privacy.com/v1/']);
        try {
            $response = $client->put($url, [
                'headers' => [
                    'content-type' => 'application/json',
                    'Authorization' => "api-key $apiKey",
                ],
                'json' => $params
            ]);
            return  $response->getBody()->getContents();
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }

    public function apiGet($apiKey, $url, $params = null) 
    {
        $client = new Client(['base_uri' => 'https://api.privacy.com/v1/']);
        try {
            if ($params != null) {
                $response = $client->get($url, [
                    'headers' => [
                        'Authorization' => "api-key $apiKey",
                    ],
                    'form_params' => [
                        $params
                    ]
                ]);
            } else {
                $response = $client->get($url, [
                    'headers' => [
                        'Authorization' => "api-key $apiKey",
                    ],
                    'form_params' => [
                        $params
                    ]
                ]);
            }

            return  $response->getBody()->getContents();
        } catch (Exception $e) {
            return $e;
        }
    }
}
