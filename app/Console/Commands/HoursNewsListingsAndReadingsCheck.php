<?php

namespace App\Console\Commands;

use App\Http\Controllers\Pages\Visitor\AllNewsListingsCheckPageController;
use App\Http\Controllers\Pages\Visitor\AllNewsReadingsCheckPageController;
use Illuminate\Console\Command;

class HoursNewsListingsAndReadingsCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'listingsandreadings:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'All News Listings And Readings, Check And Work';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        AllNewsReadingsCheckPageController::index();
        AllNewsListingsCheckPageController::index();
        $this->info('başarılı');
    }
}
