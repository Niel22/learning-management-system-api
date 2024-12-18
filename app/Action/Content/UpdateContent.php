<?php

namespace App\Action\Content;

use App\Models\Content;
use Illuminate\Support\Str;
use App\Helpers\UploadHelper;

class UpdateContent
{

    protected $action;

    public function __construct(UploadHelper $action)
    {
        $this->action = $action;
    }

    public function execute($id, $request)
    {
        $content = Content::find($id);

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