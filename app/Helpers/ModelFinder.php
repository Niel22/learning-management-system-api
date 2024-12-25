<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class ModelFinder
{
    public static function findBySlugOrId($value, Model $model, $relationship = [], $parentCol = null, $parentVal = null, $slug = 'slug')
    {
        if($parentCol != null){

            if(is_numeric($value))
            {
                return $model->with($relationship)->where($parentCol, $parentVal)->find($value);
            }
            return $model->with($relationship)->where($parentCol, $parentVal)->where($slug, $value)->first();
        }
        
        if(is_numeric($value))
        {
            return $model->with($relationship)->find($value);
        }
        return $model->with($relationship)->where($slug, $value)->first();
    }
}