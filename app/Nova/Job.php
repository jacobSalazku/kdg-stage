<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Job extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Job>
     */
    public static $model = \App\Models\Job::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make(),
            Text::make('Title')->hideFromIndex(),
            Text::make('Company'),
            Text::make('Contact'),
            Boolean::make('Published')->sortable(),
            Email::make('Email')->showOnDetail(),
            Text::make('Phone Number')->hideFromIndex(),
            Text::make('Website')->hideFromIndex(),
            Textarea::make('Description')->hideFromIndex(),
            DateTime::make('Created At')->hideFromIndex(),
            HasOne::make('User')->hideWhenUpdating(),
        ];
    }

    public static $canImportResource = false;

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }
}
