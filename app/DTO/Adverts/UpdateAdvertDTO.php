<?php

namespace App\DTO\Adverts;

use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;

class UpdateAdvertDTO
{
    public function __construct(
        public string $id,
        public string $subject,
        public AdvertStatus $status,
        public string $body
    ) {}

    public static function makeFromRequest(StoreUpdateAdvertRequest $request, string $id = null): self
    {
        return new self(
            $request->id ?? $id,
            $request->subject,
            AdvertStatus::A,
            $request->body
        );
    }

}
