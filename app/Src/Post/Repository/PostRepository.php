<?php

namespace Blackboard\Src\Post\Repository;

use Blackboard\Src\Post\Command\PostCommand;
use Blackboard\Src\Post\Model\Post;

class PostRepository
{

    private $post;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function create(PostCommand $command)
    {

        return $this->post->create((array)$command);

    }

}