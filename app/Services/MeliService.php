<?php

namespace App\Services;

use App\Repositories\MeliRepository;
use App\Services\Contracts\MeliServiceContract;

class MeliService implements MeliServiceContract
{
    public function __construct(
        private readonly MeliRepository $meliRepository
    ) {
    }

    public function getItems($query = 'iphone 14', $limit = 10)
    {
        return $this->meliRepository->getItems($query, $limit);
    }

    public function getVisitsItems(string $itemId)
    {
        return $this->meliRepository->getVisitsItems($itemId);
    }
}
