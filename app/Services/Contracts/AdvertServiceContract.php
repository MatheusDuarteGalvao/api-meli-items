<?php

namespace App\Services\Contracts;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Models\Advert;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface AdvertServiceContract
{
    public function getAll(string $filter = null): Collection;
    public function getPendent(): Collection;
    public function getByItemId(string $itemId): Advert|null;
    public function count(): int;
    public function findOne(string $id): stdClass|null;
    public function new(CreateAdvertDTO $dto): stdClass;
    public function update(UpdateAdvertDTO $dto): stdClass|null;
    public function delete(string $id): void;
}
