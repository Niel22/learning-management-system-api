<?php

namespace App\Models\Course;

use App\Models\Course\Content;
use App\Models\Progress\LessonProgress;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'module_id',
        'duration',
        'content_type',
        'file'
    ];

    public function module(){
        return $this->belongsTo(Module::class);
    }

}
