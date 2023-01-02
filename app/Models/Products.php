<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'products';
	

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
		'company_id','name','category','image','mfg_date','exp_date','qty','selling_price','purchase_price','dead_stock','is_active','user_id','unit'
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
				name LIKE ? 
		)';
		$search_params = [
			"%$text%"
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
			"name",
			"category",
			"image",
			"mfg_date",
			"exp_date",
			"qty",
			"selling_price",
			"purchase_price",
			"dead_stock",
			"is_active",
			"user_id",
			"unit" 
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
			"name",
			"category",
			"image",
			"mfg_date",
			"exp_date",
			"qty",
			"selling_price",
			"purchase_price",
			"dead_stock",
			"is_active",
			"user_id",
			"unit" 
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
			"name",
			"category",
			"image",
			"mfg_date",
			"exp_date",
			"qty",
			"selling_price",
			"purchase_price",
			"dead_stock",
			"is_active",
			"user_id",
			"unit" 
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
			"name",
			"category",
			"image",
			"mfg_date",
			"exp_date",
			"qty",
			"selling_price",
			"purchase_price",
			"dead_stock",
			"is_active",
			"user_id",
			"unit" 
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
			"name",
			"category",
			"image",
			"mfg_date",
			"exp_date",
			"qty",
			"selling_price",
			"purchase_price",
			"dead_stock",
			"is_active",
			"user_id",
			"unit" 
		];
	}
}
