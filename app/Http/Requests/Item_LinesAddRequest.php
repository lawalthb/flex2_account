<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Item_LinesAddRequest extends FormRequest
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
            
				"product_id" => "required",
				"doc_id" => "required",
				"qty" => "required|numeric",
				"s_price" => "required|numeric",
				"amount" => "required|numeric",
				"p_price" => "required|numeric",
				"unit" => "nullable|string",
				"comment" => "nullable|string",
				"doc_no" => "nullable|numeric",
				"company_id" => "required",
				"user_id" => "required",
            
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
