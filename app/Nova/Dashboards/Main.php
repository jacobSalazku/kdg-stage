<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NewInternships;
use App\Nova\Metrics\NewJobs;
use App\Nova\Metrics\NewUsers;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new NewUsers,
            new NewJobs,
            new NewInternships,
        ];
    }
}
