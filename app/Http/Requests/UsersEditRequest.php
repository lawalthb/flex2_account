<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
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
		
		$rec_id = request()->route('rec_id');

        return [
            
				"firstname" => "filled|string",
				"lastname" => "nullable|string",
				"username" => "filled|string|unique:users,username,$rec_id,id",
				"role_id" => "nullable|numeric",
				"phone" => "nullable|string",
				"photo" => "nullable",
				"user_type" => "nullable|string",
				"is_active" => "nullable|string",
				"company_id" => "nullable",
				"email_verified_at" => "nullable|date",
            
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
