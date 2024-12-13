<?php

namespace App\Action\Course;

use App\Models\Course;
use Illuminate\Support\Str;
use App\Helpers\UploadHelper;

class UpdateCourse
{
    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($id, $request)
    {

        $course = Course::find($id);

        $request['slug'] = Str::slug($request['title']);

        if (!empty($course)) {
            if (isset($request['thumbnail'])) {
                $request['thumbnail'] = $this->ifImage($request, $course);
            }

            return $course->update($request);
        }

        return false;
    }

    protected function ifImage($request, $course)
    {
        $this->action->remove($course->thumbnail);

        return $this->action->upload($request['slug'], $request['thumbnail'], 'course_thumbnails/');
    }
}
