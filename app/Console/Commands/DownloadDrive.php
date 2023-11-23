<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoogleDriveService;

class DownloadDrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-drive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download journal files from Drive';

    /**
     * Execute the console command.
     */
    public function handle(GoogleDriveService $service)
    {
        //
        $service->download();
    }
}
