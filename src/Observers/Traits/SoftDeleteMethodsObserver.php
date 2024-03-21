<?php

namespace Txsoura\ActivityLog\Observers\Traits;

use Illuminate\Database\Eloquent\Model;
use Txsoura\ActivityLog\ActivityLog;

trait SoftDeleteMethodsObserver
{
    /**
     * Handle the Model "restored" event.
     *
     * @param Model $model
     * @return void
     */
    public function restored(Model $model)
    {
        ActivityLog::create($this->identifier.'_restore', $this->identifier.'_restore_description', $model->getTable(), $model->id, request());
    }

    /**
     * Handle the Model "force deleted" event.
     *
     * @param Model $model
     * @return void
     */
    public function forceDeleted(Model $model)
    {
        ActivityLog::create($this->identifier.'_force_destroy', $this->identifier.'_force_destroy_description', $model->getTable(), $model->id, request());
    }
}