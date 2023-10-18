<?php


namespace App\Services;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Repositories\AdvertRepositoryInterface;
use stdClass;

class AdvertService
{
    public function __construct(
        protected AdvertRepositoryInterface $repository
    ) {}

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function count(): int
    {
        return $this->repository->count();
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateAdvertDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateAdvertDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
