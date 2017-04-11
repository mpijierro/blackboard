<?php

namespace Blackboard\Http\Controllers;

use Blackboard\Src\Post\Command\PostCommand;
use Blackboard\Src\Post\Handler\CreatePost;
use Blackboard\Src\Post\Request\PostRequest;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{

    public function viewCreateForm()
    {

        return view('post.form');

    }


    public function createPost(PostRequest $request)
    {

        try {

            $command = app(PostCommand::class);
            $command->configFromRequest($request);

            $handler = app(CreatePost::class);
            $handler->execute($command);

            return view('post.form')->with(['success' => 'Congratulations! created post']);

        } catch (ValidationException $e) {
            return back()->withErrors($handler->getValidation()->errors());
        } catch (\Exception $e) {
            return back();
        }


    }

}
