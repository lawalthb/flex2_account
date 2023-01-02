<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsAddRequest extends FormRequest
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
            
				"company_id" => "required",
				"name" => "required|string",
				"category" => "required",
				"image" => "nullable",
				"mfg_date" => "nullable|date",
				"exp_date" => "nullable|date",
				"qty" => "required|numeric",
				"selling_price" => "required|numeric",
				"purchase_price" => "required|numeric",
				"dead_stock" => "required|numeric",
				"is_active" => "required|string",
				"user_id" => "required",
				"unit" => "nullable",
            
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
