<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'comment' => 'required',
            'user_id' => 'required',
            'shop_id' => 'required',
            'reserve_id' => 'required|unique:reviews',
            'star_id' => 'required',
        ];
    }

    protected function getRedirectUrl()
    {
        return 'verror';
    }
}
