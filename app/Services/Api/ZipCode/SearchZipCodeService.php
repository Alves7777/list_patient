<?php

namespace App\Services\Api\ZipCode;

use GuzzleHttp\Client;

class SearchZipCodeService
{
    public function getZipCode($zipCode)
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json']
        ]);
        $response = $client->request('GET', "https://viacep.com.br/ws/{$zipCode}/json/");

        return json_decode($response->getBody(), true);
    }
}
