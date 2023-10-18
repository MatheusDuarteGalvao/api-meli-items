<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class MeliRepository
{
    protected $baseUrl = 'https://api.mercadolibre.com/';

    public function getItems(string $query = 'iphone 14', int $limit = 10)
    {
        $response = Http::withUrlParameters([
            'baseurl'  => $this->baseUrl,
            'siteId'   => 'sites/MLB',
            'endPoint' => 'search'
        ])->get("{+baseurl}/{siteId}/{endPoint}", [
            'q'     => $query,
            'limit' => $limit
        ]);

        return $response->json()['results'] ?? [];
    }

    public function getVisitsItems(string $itemId)
    {
        $response = Http::withUrlParameters([
            'baseurl'  => $this->baseUrl,
            'endPoint' => 'visits/items'
        ])->get("{+baseurl}/{endPoint}", [
            'ids' => $itemId
        ]);

        return $response->json();
    }
}
