<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        $isLocal = $this->app->environment('local');

        Telescope::filter(function (IncomingEntry $entry) use ($isLocal) {
            return $entry->type == 'log' ||
                   $isLocal ||  // Nếu đang chạy trong môi trường local, mọi entry sẽ được hiển thị.
                   $entry->isReportableException() || // Chỉ báo cáo các exception quan trọng.
                   $entry->isFailedRequest() || //Chỉ theo dõi các request thất bại (lỗi 500, 403,...).
                   $entry->isFailedJob() || // Chỉ ghi lại các job thất bại.
                   $entry->isScheduledTask() || // Chỉ ghi lại task bị lỗi trong scheduler.
                   $entry->hasMonitoredTag(); // Chỉ hiển thị log có gắn tag đặc biệt.
        });
//        Telescope::filter(function (IncomingEntry $entry) use ($isLocal) {
//            return true;
//        });

    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     */
    protected function hideSensitiveRequestDetails(): void
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }
}
