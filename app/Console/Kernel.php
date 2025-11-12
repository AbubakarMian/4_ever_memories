<?php

namespace App\Console;

use App\Models\UserWebsite;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            // Fetch memorials with trial flag and check expiry in PHP to avoid DB JSON function dependency
            UserWebsite::whereNotNull('web_variable')
                ->chunkById(200, function ($memorials) {
                    foreach ($memorials as $m) {
                        try {
                            $vars = is_string($m->web_variable) ? json_decode($m->web_variable, true) : $m->web_variable;
                        } catch (\Throwable $e) {
                            $vars = null;
                        }
                        if (is_array($vars) && !empty($vars['is_trial']) && !empty($vars['trial_ends_at'])) {
                            if (now()->greaterThanOrEqualTo(\Carbon\Carbon::parse($vars['trial_ends_at']))) {
                                $m->delete(); // soft delete
                            }
                        }
                    }
                });
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
