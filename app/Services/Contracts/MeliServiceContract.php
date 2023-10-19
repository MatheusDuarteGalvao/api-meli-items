<?php

namespace App\Services\Contracts;

interface MeliServiceContract
{
    public function getItems($query = 'iphone 14', $limit = 10);
    public function getVisitsItems(string $itemId);
}
