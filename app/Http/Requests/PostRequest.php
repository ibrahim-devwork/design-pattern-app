<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {   
        return match(Route::currentRouteName()){
            'create-post' => $this->createOrUpdate(),
            'update-post' => $this->createOrUpdate() + ['id' => 'exists:posts,id'],
            'filter-post' => [ 'title' => 'nullable'],
            'show-post', 'delete-post' => ['id' => 'exists:posts,id'],
        };
    }

    public function createOrUpdate() {
        return [
            'title' => ['bail', 'required', 'max:50'],
            'body'  => ['bail', 'required', 'max:250'],
            'image' => ['bail', 'nullable', 'mimes:jpeg,png,jpg'],
        ];
    }
}
