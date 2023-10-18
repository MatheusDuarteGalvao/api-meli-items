<?php


namespace App\Services;

use App\DTO\Adverts\UpdateAdvertDTO;
use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;
use Carbon\Carbon;

class TrackAdvertVistsService
{
    public function __construct(
        protected AdvertService $advertService,
        protected MeliService $meliService
    ) {}

    public function importAdvertsMeli()
    {
        $meliIems = $this->meliService->getItems()['results'] ?? [];

        if(empty($meliIems)) return;

        $adverts = $this->advertService->getPendent();

        foreach ($adverts as $advert) {
            $visits = $this->meliService->getVisitsItems($advert->item_id)[$advert->item_id] ?? 240;

            if($visits > 0) {
                $request          = new StoreUpdateAdvertRequest();
                $request->status  = AdvertStatus::PROCESSADO;
                $request->updated = Carbon::now()->format('Y-m-d H:i:s');
                $request->visits  = $visits;

                $this->advertService->update(UpdateAdvertDTO::makeFromRequest($request, $advert->id));
            }
        }
    }

}
