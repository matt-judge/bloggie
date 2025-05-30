<?php

namespace App\Http\Requests\Admin\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialStoreRequest extends FormRequest
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
            'user_name' => ['required', 'min:3', 'max:255'],
            'message'   => ['required'],
            'rating'    => ['required', 'integer'],
        ];
    }
}
