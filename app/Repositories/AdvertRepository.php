<?php

namespace App\Repositories;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Models\Advert;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class AdvertRepository
{
    public function __construct(
        private readonly Advert $model
    ) {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getPendent(): Collection
    {
        return $this->model->where('status', 'PENDING')->get();
    }

    public function getByItemId(string $itemId): ?Advert
    {
        return $this->model->where('item_id', $itemId)->first();
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function findOne(string $id): ?stdClass
    {
        $advert = $this->model->find($id);

        if (! $advert) {
            return null;
        }

        return (object) $advert->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateAdvertDTO $dto): stdClass
    {
        $advert = $this->model->create(
            (array) $dto
        );

        return (object) $advert->toArray();
    }

    public function update(UpdateAdvertDTO $dto): ?stdClass
    {
        if (! $advert = $this->model->find($dto->id)) {
            return null;
        }

        $advert->update(
            (array) $dto
        );

        return (object) $advert->toArray();
    }
}
