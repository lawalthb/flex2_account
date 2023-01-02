<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LedgersEditRequest extends FormRequest
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
            
				"company_id" => "filled",
				"sub_account_group_id" => "filled",
				"ledger_name" => "filled|string",
				"marketer_id" => "filled|numeric",
				"address" => "nullable",
				"email" => "nullable|email",
				"phone" => "nullable|string",
				"contact_person" => "nullable|string",
				"opening_balance" => "filled|numeric",
				"is_active" => "filled|string",
				"user_id" => "filled",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
