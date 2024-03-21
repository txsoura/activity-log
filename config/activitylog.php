<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Activity Log Causer
    |--------------------------------------------------------------------------
    |
    | When causer is enabled, all activities  will be saved with
    | an action causer morphy.
    |
    */

    'causer_enabled' => (bool)env('ACTIVITY_LOG_CAUSER_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Activity Log Causer Identifier
    |--------------------------------------------------------------------------
    |
    | This Identifier is used to save activity causer type and
    | is required when causer is enabled.
    |
    */

    'causer_identifier' => env('ACTIVITY_LOG_CAUSER_IDENTIFIER', 'users'),

    /*
    |--------------------------------------------------------------------------
    | Activity Log Causer Provider
    |--------------------------------------------------------------------------
    |
    | This Provider is used to get activity causer id
    | and is required when causer is enabled.
    |
    | Supported: "auth"
    */

    'causer_provider' => env('ACTIVITY_LOG_CAUSER_PROVIDER', 'auth'),

    /*
    |--------------------------------------------------------------------------
    | Activity Log Ignore Attributes
    |--------------------------------------------------------------------------
    |
    | The Ignore Attributes indicates which model attributes name, should
    | never be saved in activity changes properties (Eg: "password").
    |
    */

    'ignore_attributes' => [
        'store'=> (array)explode(',', env('ACTIVITY_LOG_STORE_IGNORE_ATTRIBUTES', 'created_at,updated_at,password')),

        'update'=> (array)explode(',', env('ACTIVITY_LOG_UPDATE_IGNORE_ATTRIBUTES', 'updated_at,password')),
    ],

];