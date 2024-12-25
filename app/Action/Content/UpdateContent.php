<?php

namespace App\Action\Content;

use Illuminate\Support\Str;
use App\Helpers\UploadHelper;
use App\Models\Course\Content;

class UpdateContent
{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($lessonId, $id, $request)
    {
        $content = Content::where('lesson_id', $lessonId)
                            ->where('id', $id)
                            ->first();

        if(!empty($content))
        {
            $request['slug'] = Str::slug($request['title']);

            if(isset($request['file'])){
                $this->action->remove($content->file);

                $request['file'] = $this->action->upload($request['slug'], $request['file'], 'course_content/');
            }
            return $content->update($request);
        }

        return false;
    }
}