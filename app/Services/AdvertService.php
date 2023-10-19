<?php

namespace App\Services;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Models\Advert;
use App\Repositories\AdvertRepositoryInterface;
use App\Services\Contracts\AdvertServiceContract;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class AdvertService implements AdvertServiceContract
{
    public function __construct(
        private readonly AdvertRepositoryInterface $repository
    ) {
    }

    public function getAll(string $filter = null): Collection
    {
        return $this->repository->getAll($filter);
    }

    public function getPendent(): Collection
    {
        return $this->repository->getPendent();
    }

    public function getByItemId(string $itemId): ?Advert
    {
        return $this->repository->getByItemId($itemId);
    }

    public function count(): int
    {
        return $this->repository->count();
    }

    public function findOne(string $id): ?stdClass
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateAdvertDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateAdvertDTO $dto): ?stdClass
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
