<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Users extends Authenticatable  
{
	use Notifiable;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'users';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	protected $fillable = ['email','password','photo','username','firstname','lastname','role_id','phone','user_type','is_active','company_id'];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				firstname LIKE ?  OR 
				lastname LIKE ?  OR 
				email LIKE ?  OR 
				phone LIKE ?  OR 
				username LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"photo",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"photo",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"role_id",
			"phone",
			"photo",
			"user_type",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"email",
			"role_id",
			"phone",
			"user_type",
			"date_join",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"id",
			"firstname",
			"lastname",
			"role_id",
			"phone",
			"photo",
			"user_type",
			"is_active",
			"company_id",
			"username" 
		];
	}
	

	/**
     * Get current user name
     * @return string
     */
	public function UserName(){
		return $this->username;
	}
	

	/**
     * Get current user id
     * @return string
     */
	public function UserId(){
		return $this->id;
	}
	public function UserEmail(){
		return $this->email;
	}
	public function UserPhoto(){
		return $this->photo;
	}
	

	/**
     * Send Password reset link to user email 
	 * @param string $token
     * @return string
     */
	public function sendPasswordResetNotification($token)
	{
		$this->notify(new \App\Notifications\ResetPassword($token));
	}
}
