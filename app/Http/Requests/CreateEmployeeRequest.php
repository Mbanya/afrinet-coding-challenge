<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //
            'first_name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'email'=>'email',
            'phone'=>'max:12',
            'company' =>'required|exists:App\Models\Company,id'
        ];
    }
}
