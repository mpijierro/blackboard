<?php

namespace Blackboard\Src\Post\Handler;

use Blackboard\Src\Post\Command\PostCommand;
use Blackboard\Src\Post\Library\Validation;
use Blackboard\Src\Post\Repository\PostRepository;

class CreatePost
{

    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var Validation
     */
    private $validation;


    public function __construct(PostRepository $postRepository, Validation $validation)
    {
        $this->postRepository = $postRepository;
        $this->validation = $validation;
    }


    /**
     * @return Validation
     */
    public function getValidation()
    {
        return $this->validation;
    }


    public function execute(PostCommand $command)
    {

        $command->userId = $this->retrieveUserLoggedId();

        $this->validation->validateCommand($command);

        $this->postRepository->create($command);

    }


    private function retrieveUserLoggedId()
    {
        return 1;
    }
}