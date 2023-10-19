<?php

namespace App\DTO\Adverts;

use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;

class CreateAdvertDTO
{
    public function __construct(
        public string $title,
        public AdvertStatus $status,
        public string $item_id,
        public string $updated
    ) {
    }

    public static function makeFromRequest(StoreUpdateAdvertRequest $request): self
    {
        return new self(
            $request->title,
            AdvertStatus::PENDING,
            $request->item_id,
            $request->updated
        );
    }

}
