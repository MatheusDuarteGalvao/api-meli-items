<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MeliService
{
    protected $baseUrl = 'https://api.mercadolibre.com/';

    public function getItems()
    {
        $response = Http::withUrlParameters([
            'baseurl'  => $this->baseUrl,
            'siteId'   => 'sites/MLB',
            'endPoint' => 'search'
        ])->get("{+baseurl}/{siteId}/{endPoint}", [
            'q' => 'iphone 14',
            'limit' => 10
        ]);

        return $response->json();
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
