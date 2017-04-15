<?php

namespace Blackboard\Http\Controllers;

use Blackboard\Exceptions\CustomValidationException;
use Blackboard\Src\Post\Actions\PostCommand;
use Blackboard\Src\Post\Actions\CreatePost;
use Blackboard\Src\Post\Request\PostRequest;
use Illuminate\Support\MessageBag;
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

        } catch (CustomValidationException $e) {

            $errors = [];

            //excuse me Demeter
            $notification = $handler->getValidation()->getNotification();

            if ($notification->hasErrors()) {
                $errors = $this->buildCustomError($notification->messages());
            }

            return back()->withErrors($errors);

        } catch (\Exception $e) {

            throw $e;

            $errors = $this->buildCustomError($e->getMessage());

            return back()->withErrors($errors);
        }

    }


    private function buildCustomError(string $message)
    {
        $errors = app(MessageBag::class);
        $errors->add('custom-error', $message);

        return $errors;
    }

}
