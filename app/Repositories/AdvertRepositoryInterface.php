<?php

namespace App\Repositories;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Models\Advert;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface AdvertRepositoryInterface
{
    public function getAll(string $filter = null): Collection;

    public function getPendent(): Collection;

    public function getbyItemId(string $itemId): ?Advert;

    public function count(): int;

    public function findOne(string $id): ?stdClass;

    public function delete(string $id): void;

    public function new(CreateAdvertDTO $dto): stdClass;

    public function update(UpdateAdvertDTO $dto): ?stdClass;
}
