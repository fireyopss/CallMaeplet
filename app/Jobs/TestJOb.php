<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class TestJOb implements ShouldQueue
{
    use Queueable;


    public $jobId;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        
        $this->jobId = uniqid();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Test Job executed!');
    }
}
