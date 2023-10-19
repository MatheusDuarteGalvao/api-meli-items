<?php

namespace Tests\Feature;

use App\Enums\AdvertStatus;
use App\Jobs\TrackAdvertVisits;
use App\Models\Advert;
use App\Services\AdvertService;
use App\Services\Contracts\MeliServiceContract;
use App\Services\MeliService;
use App\Services\TrackAdvertVisitsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackAdvertVisitsServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testTrackAdvertsVisitsMeli()
    {
        $advert = Advert::factory()->create();

        $visits = rand(1, 1052);

        $data = [
            $advert->item_id => $visits
        ];

        $this->mockService($data, $advert->item_id);

        $trackAdvertService = resolve(TrackAdvertVisitsService::class);

        $trackAdvertService->trackAdvertsVisitsMeli();

        $this->assertDatabaseHas('adverts', [
            'id' => $advert->id,
            'visits' => $visits,
            'status' => 'PROCESSED'
        ]);
    }

    private function mockService($data, $itemId)
    {
        $this->mock(
            MeliServiceContract::class,
            function ($mock) use ($data, $itemId) {
                $mock->shouldReceive('getVisitsItems')
                    ->andReturn($data)
                    ->with($itemId);
            }
        );
    }
}
