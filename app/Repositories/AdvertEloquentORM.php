<?php

namespace App\Repositories;

use App\DTO\Adverts\CreateAdvertDTO;
use App\DTO\Adverts\UpdateAdvertDTO;
use App\Models\Advert;
use App\Repositories\AdvertRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;

class AdvertEloquentORM implements AdvertRepositoryInterface
{
    public function __construct(
        protected Advert $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface
    {
        $result = $this->model
                    ->where(function($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query->orWhere('body', 'like', "%$filter%");
                        }
                    })
                    ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): Collection
    {
        return $this->model->all();
    }

    public function getPendent(): Collection
    {
        return $this->model->where('status', 'PENDENTE')->get();
    }

    public function getByItemId(string $itemId): Advert|null
    {
        return $this->model->where('item_id', $itemId)->first();
    }

    public function count(): int
    {
        return $this->model->count();
    }

    public function findOne(string $id): stdClass|null
    {
        $advert = $this->model->find($id);

        if(!$advert) {
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

    public function update(UpdateAdvertDTO $dto): stdClass|null
    {
        if(!$advert = $this->model->find($dto->id)){
            return null;
        }

        $advert->update(
            (array) $dto
        );

        return (object) $advert->toArray();
    }

}
