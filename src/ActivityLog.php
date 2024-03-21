<?php

namespace Txsoura\ActivityLog;

use Illuminate\Support\Arr;
use Txsoura\ActivityLog\Models\ActivityLog as ActivityLogModel;

class ActivityLog
{
 // Create activity log
 public static function create($log_name, $description, $subject, $subject_id, $request, $model = null, $modelChanges = null)
 {
    $causer_type = config('activitylog.causer_enabled') ? config('activitylog.causer_identifier') : null;
    $causer_id = config('activitylog.causer_enabled') ? auth()->user() ? auth()->user()->id : null : null;

     ActivityLogModel::create([
         "log_name" => $log_name,
         "description" => $description,
         "subject_type" => $subject,
         "subject_id" => $subject_id,
         "causer_type" => $causer_type,
         "causer_id" => $causer_id,
         "request" => array(
             'ip' => $request->ip(),
             'method' => $request->url(),
             'url' => $request->method(),
             'inputs' => $request->all(),
             'headers' => $request->header(),
         ),
         "properties" => array('changes' => self::properties($model, $modelChanges)) //changes:[{key:email,value:abc,old:null,status:new},{key:cellphone,value:1234,old:123,status:update}]
     ]);
 }

 //Format activity properties
 public static function properties($model, $modelChanges): array
 {
     $changes = [];

     if ($modelChanges) {
         $modelChanges = Arr::except($modelChanges,config('activitylog.ignore_attributes.update'));

         $keys = array_keys($modelChanges);

         for ($i = 0; $i < count($modelChanges); $i++) {
             $change = array(
                 'key' => $keys[$i],
                 'value' => $modelChanges[$keys[$i]],
                 'old' => $model[$keys[$i]],
                 'status' => 'update'
             );

             array_push($changes, $change);
         }

         return $changes;
     }

     if ($model) {
         $model = Arr::except($model, config('activitylog.ignore_attributes.store'));

         $keys = array_keys($model);

         for ($i = 0; $i < count($model); $i++) {
             $change = array(
                 'key' => $keys[$i],
                 'value' => $model[$keys[$i]],
                 'old' => null,
                 'status' => 'new'
             );

             array_push($changes, $change);
         }

         return $changes;
     }

     return $changes;
 }
}