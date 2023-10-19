<?php

namespace App\Http\Resources;

use App\Enums\AdvertStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'itemId' => $this->item_id,
            'title' => $this->title,
            'status' => AdvertStatus::fromValue($this->status),
            'visits' => $this->visits,
            'updated' => $this->updated ? Carbon::make($this->updated)->format('Y-m-d H:i:s') : null,
        ];
    }
}
