<?php

namespace App\Http\Requests;

class LikeDislikeStoreRequest extends Request
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
            'user_id'  => 'required|max:255',
            'video_id' => 'required',
            'type'     => 'required',
        ];
    }
}
