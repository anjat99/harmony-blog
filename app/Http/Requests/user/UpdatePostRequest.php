<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => 'min:5|regex:/^[A-ZČĆŠĐŽ]{1}(.+\s?.*)*$/',
            "quote" => 'min:5|regex:/^(.+\s?.*)*$/',
            "description" => 'min:1',
            "image" => 'file|image|mimes:jpg,jpeg,JPG,JPEG,bmp,png',
            "category" => 'exists:categories,id',
        ];
    }

    public function messages(){
        return [
            'title.regex' => 'The title of post can containt at least 5 characters including digits',
            'quote.regex' => 'The quote of post can containt at least 5 characters including digits',
            'description.min' => 'The description needs to have at least :min characters!',
            'image.image' => 'Uploaded file must be an image.',
            "category.exists" => "Selected category does not exist in the database."
        ];
    }
}
