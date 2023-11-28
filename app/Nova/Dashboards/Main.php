<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\Internships;
use App\Nova\Metrics\Jobs;
use App\Nova\Metrics\Users;
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
            new Users,
            new Jobs,
            new Internships,
        ];
    }
}
