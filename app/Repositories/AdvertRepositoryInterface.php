<?php

namespace App\Repositories;

use App\DTO\Adverts\{
    CreateAdvertDTO,
    UpdateAdvertDTO
};
use Illuminate\Database\Eloquent\Collection;
use stdClass;

interface AdvertRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): Collection;
    public function getPendent(): Collection;
    public function count(): int;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateAdvertDTO $dto): stdClass;
    public function update(UpdateAdvertDTO $dto): stdClass|null;
}
