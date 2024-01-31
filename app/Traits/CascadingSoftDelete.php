<?php

namespace App\Traits;

trait CascadingSoftDelete
{
    public static function bootCascadingSoftDelete()
    {
        static::deleting(function ($model) {
            $model->deleteRelations();
        });
    }

    protected function deleteRelations()
    {
        if ($this instanceof \App\Models\User || $this instanceof \App\Models\Car) {
            \App\Models\UserCar::where('user_id', $this->id)->orWhere('car_id', $this->id)->delete();
        }
    }
}
