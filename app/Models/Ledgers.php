<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Ledgers extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'ledgers';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = [
		'company_id','sub_account_group_id','ledger_name','marketer_id','address','email','phone','contact_person','opening_balance','is_active','user_id'
	];
	public $timestamps = false;
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				ledger_name LIKE ?  OR 
				address LIKE ?  OR 
				email LIKE ?  OR 
				phone LIKE ?  OR 
				contact_person LIKE ? 
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
			"company_id",
			"sub_account_group_id",
			"ledger_name",
			"marketer_id",
			"address",
			"email",
			"phone",
			"contact_person",
			"opening_balance",
			"is_active",
			"user_id",
			"reg_date" 
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
			"company_id",
			"sub_account_group_id",
			"ledger_name",
			"marketer_id",
			"address",
			"email",
			"phone",
			"contact_person",
			"opening_balance",
			"is_active",
			"user_id",
			"reg_date" 
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
			"company_id",
			"sub_account_group_id",
			"ledger_name",
			"marketer_id",
			"address",
			"email",
			"phone",
			"contact_person",
			"opening_balance",
			"is_active",
			"user_id",
			"reg_date" 
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
			"company_id",
			"sub_account_group_id",
			"ledger_name",
			"marketer_id",
			"address",
			"email",
			"phone",
			"contact_person",
			"opening_balance",
			"is_active",
			"user_id",
			"reg_date" 
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
			"company_id",
			"sub_account_group_id",
			"ledger_name",
			"marketer_id",
			"address",
			"email",
			"phone",
			"contact_person",
			"opening_balance",
			"is_active",
			"user_id" 
		];
	}
}
