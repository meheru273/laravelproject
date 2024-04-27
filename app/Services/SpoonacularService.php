<?php

namespace App\Services;

use GuzzleHttp\Client;

class SpoonacularService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('SPOONACULAR_API_KEY');
        $this->baseUrl = env('SPOONACULAR_BASE_URL');
    }

    public function searchRecipes($query)
    {
        $response = $this->client->request('GET', $this->baseUrl . '/recipes/complexSearch', [
            'query' => [
                'apiKey' => $this->apiKey,
                'query' => $query
            ]
        ]);

        return json_decode($response->getBody(), true);
    }
}
