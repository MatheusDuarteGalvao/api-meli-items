<?php

namespace App\Jobs;

use App\Services\AdvertService;
use App\Services\ImportAdvertMeliService;
use App\Services\MeliService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportAdvertsFromMeli implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected AdvertService $advertService,
        protected MeliService $meliService
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        (new ImportAdvertMeliService($this->advertService, $this->meliService))->importAdvertsMeli();
    }
}
