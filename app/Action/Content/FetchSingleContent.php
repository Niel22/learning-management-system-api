<?php

namespace App\Action\Content;

use App\Models\Content;

class FetchSingleContent{

    public function execute($id)
    {
        $content = Content::with('lesson')->find($id);

        if(!empty($content))
        {
            return $content;
        }

        return false;
    }
}