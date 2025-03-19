<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Book;

class AddBook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $bookData;
    /**
     * Create a new job instance.
     */
    public function __construct($bookData)
    {
        $this->bookData = $bookData;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('Job AddBook đang chạy');
        Book::create($this->bookData);
    }
}
