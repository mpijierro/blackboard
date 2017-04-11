<?php

namespace Blackboard\Src\Post\Command;

use Blackboard\Src\Post\Request\PostRequest;

class PostCommand
{

    public $userId = null;

    public $title = '';

    public $content = '';


    public function configFromRequest(PostRequest $request)
    {
        $this->title = $request->get('title');
        $this->content = $request->get('content');
    }

}