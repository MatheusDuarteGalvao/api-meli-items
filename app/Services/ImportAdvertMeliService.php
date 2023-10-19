<?php

namespace App\Services;

use App\DTO\Adverts\CreateAdvertDTO;
use App\Http\Requests\StoreUpdateAdvertRequest;
use Carbon\Carbon;

class ImportAdvertMeliService
{
    public function __construct(
        private readonly AdvertService $advertService,
        private readonly MeliService $meliService
    ) {
    }

    public function importAdvertsMeli()
    {
        $meliIems = $this->meliService->getItems();
        $countAdverts = $this->advertService->count();

        if (empty($meliIems) && $countAdverts < 10) {
            return;
        }

        foreach ($meliIems as $meliIem) {
            $advert = $this->advertService->getByItemId($meliIem['id']);

            if ($advert != null) {
                continue;
            }

            $request = new StoreUpdateAdvertRequest();
            $request->title = $meliIem['title'];
            $request->item_id = $meliIem['id'];
            $request->updated = Carbon::now()->format('Y-m-d H:i:s');

            $this->advertService->new(CreateAdvertDTO::makeFromRequest($request));
        }
    }
}
