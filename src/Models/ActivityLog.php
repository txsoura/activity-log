<?php

namespace Txsoura\ActivityLog\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Txsoura\ActivityLog\Models\ActivityLog
 *
 */
class ActivityLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'log_name', 'description', 'subject_type', 'subject_id', 'causer_type', 'causer_id', 'request', 'properties'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'request' => 'json',
        'properties' => 'json'
    ];
}