<?php


namespace App\Services;

use App\DTO\Adverts\CreateAdvertDTO;
use App\Http\Requests\StoreUpdateAdvertRequest;
use Carbon\Carbon;

class ImportAdvertMeliService
{
    public function __construct(
        protected AdvertService $advertService,
        protected MeliService $meliService
    ) {}

    public function importAdvertsMeli()
    {
        $meliIems = $this->meliService->getItems()['results'] ?? [];

        if(empty($meliIems)) return;

        foreach ($meliIems as $meliIem) {
            $request          = new StoreUpdateAdvertRequest();
            $request->title   = $meliIem['title'];
            $request->item_id = $meliIem['id'];
            $request->updated = Carbon::now()->format('Y-m-d H:i:s');

            $this->advertService->new(CreateAdvertDTO::makeFromRequest($request));
        }
    }

}
