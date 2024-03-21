<?php

namespace Txsoura\ActivityLog\Observers\Traits;

use Illuminate\Database\Eloquent\Model;
use Txsoura\ActivityLog\ActivityLog;

trait CRUDMethodsObserver
{
    /**
     * Handle the Model "created" event.
     *
     * @param Model $model
     * @return void
     */
    public function created(Model $model)
    {
        ActivityLog::create($this->identifier.'_store', $this->identifier.'_store_description', $model->getTable(), $model->id, request(), $model->toArray());
    }

    /**
     * Handle the Model "updated" event.
     *
     * @param Model $model
     * @return void
     */
    public function updated(Model $model)
    {
        ActivityLog::create($this->identifier.'_update', $this->identifier.'_update_description', $model->getTable(), $model->id, request(), $model->getOriginal(), $model->getChanges());
    }

    /**
     * Handle the Model "deleted" event.
     *
     * @param Model $model
     * @return void
     */
    public function deleted(Model $model)
    {
        ActivityLog::create($this->identifier.'_destroy', $this->identifier.'_destroy_description', $model->getTable(), $model->id, request());
    }

}