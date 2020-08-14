<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantPackageRequest extends FormRequest
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
            'reservation_date' => 'required|date',
            'price' => 'required|integer',
            'about' => 'required',
            'location' => 'required|max:255',
            'reservation' => 'required|max:255',
            'restaurant_type' => 'required|max:255',
            'title' => 'required|max:255'
        ];
    }
}
