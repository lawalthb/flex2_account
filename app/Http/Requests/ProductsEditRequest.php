<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsEditRequest extends FormRequest
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
				"name" => "filled|string",
				"category" => "filled",
				"image" => "nullable",
				"mfg_date" => "nullable|date",
				"exp_date" => "nullable|date",
				"qty" => "filled|numeric",
				"selling_price" => "filled|numeric",
				"purchase_price" => "filled|numeric",
				"dead_stock" => "filled|numeric",
				"is_active" => "filled|string",
				"user_id" => "filled",
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
