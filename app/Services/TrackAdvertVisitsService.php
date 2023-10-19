<?php

namespace App\Services;

use App\DTO\Adverts\UpdateAdvertDTO;
use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;
use App\Services\Contracts\AdvertServiceContract;
use App\Services\Contracts\MeliServiceContract;
use Carbon\Carbon;

class TrackAdvertVisitsService
{
    public function __construct(
        private readonly AdvertServiceContract $advertService,
        private readonly MeliServiceContract $meliService
    ) {
    }

    public function trackAdvertsVisitsMeli()
    {
        $adverts = $this->advertService->getPendent();

        if ($adverts->isEmpty()) {
            return;
        }

        foreach ($adverts as $advert) {
            $visits = $this->meliService->getVisitsItems($advert->item_id)[$advert->item_id] ?? 0;

            if ($visits > 0) {
                $request = new StoreUpdateAdvertRequest();
                $request->status = AdvertStatus::PROCESSED;
                $request->updated = Carbon::now()->format('Y-m-d H:i:s');
                $request->visits = $visits;

                $this->advertService->update(UpdateAdvertDTO::makeFromRequest($request, $advert->id));
            }
        }
    }
}
