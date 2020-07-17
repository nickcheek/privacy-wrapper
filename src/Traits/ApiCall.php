<?php

namespace Nickcheek\PrivacyWrapper\Traits;

use Exception;
use GuzzleHttp\Client;

trait ApiCall
{

    public function apiPost($apiKey, $url, array $params = null, $method = 'api')
    {

        $client = new Client(['base_uri' => 'https://' . $method . '.privacy.com/v1/']);
        $params = json_encode($params);
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
            echo $e->getMessage();
            exit();
        }
    }

    public function apiPut($apiKey, $url, $params = null, $method = 'api')
    {

        $client = new Client(['base_uri' => 'https://' . $method . '.privacy.com/v1/']);
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
            echo $e->getMessage();
            exit();
        }
    }

    public function apiGet($apiKey, $url, $params = null, $method)
    {
        $client = new Client(['base_uri' => 'https://' . $method . '.privacy.com/v1/']);
        try {
            $response = $client->get($url, [
                'headers' => [
                    'Authorization' => "api-key $apiKey",
                ],
                'form_params' => [
                    $params
                ]
            ]);
            return  $response->getBody()->getContents();
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}
