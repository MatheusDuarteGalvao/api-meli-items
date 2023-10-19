<?php

namespace Tests\Unit;

use App\Models\Advert;
use App\Services\Contracts\AdvertServiceContract;
use App\Services\Contracts\MeliServiceContract;
use App\Services\ImportAdvertMeliService;
use Tests\TestCase;

class ImportAdvertMeliServiceTest extends TestCase
{
    public function testImportAdvertsMeli()
    {
        $data = [
            [
                'id' => rand(1000, 10000),
                'title' => 'Item 1'
            ]
        ];

        $this->mockService($data);

        $importService = resolve(ImportAdvertMeliService::class);

        $importService->importAdvertsMeli();
    }

    private function mockService($data)
    {
        $this->mock(
            MeliServiceContract::class,
            function ($mock) use ($data) {
                $mock->shouldReceive('getItems')
                    ->andReturn($data);
            }
        );

        $this->mock(
            AdvertServiceContract::class,
            function ($mock) {
                $mock->shouldReceive('count')
                    ->andReturn(10);
                $mock->shouldReceive('getByItemId')
                    ->once();
                $mock->shouldReceive('new')
                    ->once();
            }
        );
    }
}
