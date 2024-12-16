<?php

namespace App\Action\Content;

use App\Models\Content;

class DeleteContent{

    public function execute($id)
    {
        $content = Content::find($id);

        if(!empty($content))
        {
            return $content->delete();
        }

        return false;
    }
}