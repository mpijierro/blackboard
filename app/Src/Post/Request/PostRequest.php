<?php

namespace Blackboard\Src\Post\Request;

use Blackboard\Src\Post\Library\Validation;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = app(Validation::class);

        return $validation->getRules();
    }
}