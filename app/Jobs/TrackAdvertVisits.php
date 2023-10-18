<?php

namespace App\Jobs;

use App\Services\AdvertService;
use App\Services\MeliService;
use App\Services\TrackAdvertVisitsService;
use Egulias\EmailValidator\Result\Reason\Reason;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrackAdvertVisits implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly AdvertService $advertService,
        private readonly MeliService $meliService
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        (new TrackAdvertVisitsService($this->advertService, $this->meliService))->trackAdvertsVisitsMeli();
    }
}
