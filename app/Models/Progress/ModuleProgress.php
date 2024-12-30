<?php

namespace App\Models\Progress;

use App\Models\User;
use App\Models\Course\Course;
use App\Models\Course\Module;
use Illuminate\Database\Eloquent\Model;

class ModuleProgress extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'module_id',
        'progress',
        'is_completed'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }
}
