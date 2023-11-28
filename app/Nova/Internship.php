<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Http\Requests\NovaRequest;

class Internship extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Internship>
     */
    public static $model = \App\Models\Internship::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
            Text::make('User Id')->hideFromIndex(),
            Text::make('User')->displayUsing(fn () => "{$this->user->name}")->hideWhenUpdating()->hideWhenCreating(),
            Boolean::make('Published')->sortable(),
            Text::make('Company'),
            Boolean::make('Offer'),
            Text::make('Contact'),
            Email::make('Email')->hideFromIndex(),
            Text::make('Phone Number')->hideFromIndex(),
            URL::make('Website')->displayUsing(fn () => "{$this->company}'s website")->hideFromIndex(),
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
}
