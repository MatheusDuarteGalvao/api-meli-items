<?php

namespace App\Services;

use App\DTO\Adverts\UpdateAdvertDTO;
use App\Enums\AdvertStatus;
use App\Http\Requests\StoreUpdateAdvertRequest;
use Carbon\Carbon;

class TrackAdvertVisitsService
{
    public function __construct(
        private readonly AdvertService $advertService,
        private readonly MeliService $meliService
    ) {
    }

    public function trackAdvertsVisitsMeli()
    {
        $adverts = $this->advertService->getPendent();

        if (count($adverts) == 0) {
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
