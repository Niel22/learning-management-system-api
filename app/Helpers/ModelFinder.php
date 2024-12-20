<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class ModelFinder
{
    public static function findBySlugOrId($value, Model $model, $parentCol = null, $parentVal = null, $slug = 'slug')
    {
        if($parentCol != null){

            if(is_numeric($value))
            {
                return $model->where($parentCol, $parentVal)->find($value);
            }
            return $model->where($parentCol, $parentVal)->where($slug, $value)->first();
        }
        
        if(is_numeric($value))
        {
            return $model->find($value);
        }
        return $model->where($slug, $value)->first();
    }
}