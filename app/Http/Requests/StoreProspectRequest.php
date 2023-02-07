<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProspectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $url_rule = 'active_url';
        if ( in_array(config('app.env'), ['local', 'testing', 'development']) ) {
            $url_rule = 'url';
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'has_bumps' => ['boolean'],
            'is_from_politician' => ['boolean'],
            'is_from_media' => ['boolean'],
            'is_from_business' => ['boolean'],
            'google_maps_link' => ['required', $url_rule, 'max:255'],
            'facebook_link' => ['required', $url_rule, 'max:255'],
            'cover-photo' => ['required', 'image', 'max:2048'],
        ];
    }
}
