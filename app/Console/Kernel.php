<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Items;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            $items = Items::where('status', '!=', 'completed')->get();
        
            $items->each(function ($item) {
                $itemCreatedAt = Carbon::parse($item->created_at);
                $oneHourAgo = Carbon::now()->subHour();
        
                if ($itemCreatedAt->lte($oneHourAgo)) {
                    $item->status = 'completed';
                    $item->save();
                }
            });
        })->hourly();
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
