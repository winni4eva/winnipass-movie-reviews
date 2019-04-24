<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'ticket_price' => 'required',
            'release_date' => 'required|date',
            'country_id' => 'required',
            'slug' => 'required',
            'file' => 'mimes:jpeg,bmp,png',
        ];
    }
}
