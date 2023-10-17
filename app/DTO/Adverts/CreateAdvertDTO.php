<?php

namespace App\DTO\Adverts;

use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;

class CreateAdvertDTO
{
    public function __construct(
        public string $title,
        public AdvertStatus $status,
        public string $itemId,
    ) {
    }

    public static function makeFromRequest(StoreUpdateAdvertRequest $request): self
    {
        return new self(
            $request->title,
            AdvertStatus::PENDENTE,
            $request->itemId
        );
    }

}
