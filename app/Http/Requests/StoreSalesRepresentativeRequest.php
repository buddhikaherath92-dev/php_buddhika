<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalesRepresentativeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email:rfc,dns',
            'telephone' => 'required|string|max:15|min:3',
            'joined_at' => 'required|date',
            'sales_route_id' => 'required|integer|exists:App\Models\SalesRoute,id',
            'sales_manager_id' => 'required|integer|exists:users,id'
        ];
    }
}
