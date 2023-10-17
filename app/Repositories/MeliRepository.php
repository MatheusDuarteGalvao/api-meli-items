<?php

namespace App\Repositories;

use App\Services\MeliService;

class MeliRepository
{
    protected $meliService;

    public function __construct(MeliService $meliService)
    {
        $this->meliService = $meliService;
    }

    public function getItems()
    {
        return $this->meliService->getItems();
    }

    public function getVisitsItems(string $itemId)
    {
        return $this->meliService->getVisitsItems($itemId);
    }
}
