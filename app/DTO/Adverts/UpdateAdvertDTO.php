<?php

namespace App\DTO\Adverts;

use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;

class UpdateAdvertDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public AdvertStatus $status,
        public string $updated,
        public string $visits
    ) {}

    public static function makeFromRequest(StoreUpdateAdvertRequest $request, string $id = null): self
    {
        return new self(
            $request->id ?? $id,
            $request->title,
            $request->status,
            $request->updated,
            $request->visits
        );
    }

}
