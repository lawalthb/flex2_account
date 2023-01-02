<?php 
namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components data Model
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Model
 */
class ComponentsData{
	

	/**
     * doc_type_option_list Model Action
     * @return array
     */
	function doc_type_option_list(){
		$sqltext = "SELECT id as value, name as label FROM source_documents";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * user_id_option_list Model Action
     * @return array
     */
	function user_id_option_list(){
		$sqltext = "SELECT id as value, firstname as label FROM users";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * company_id_option_list Model Action
     * @return array
     */
	function company_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM companies";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * customer_legder_id_option_list Model Action
     * @return array
     */
	function customer_legder_id_option_list(){
		$sqltext = "SELECT id as value, ledger_name as label FROM ledgers";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * sales_ledger_id_option_list Model Action
     * @return array
     */
	function sales_ledger_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM sub_account_group";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * product_id_option_list Model Action
     * @return array
     */
	function product_id_option_list(){
		$sqltext = "SELECT id as value, name as label FROM products";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * doc_id_option_list Model Action
     * @return array
     */
	function doc_id_option_list(){
		$sqltext = "SELECT id as value, id as label FROM invoice_documents";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * affect_account_option_list Model Action
     * @return array
     */
	function affect_account_option_list(){
		$sqltext = "SELECT id as value, name as label FROM account_groups";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * category_option_list Model Action
     * @return array
     */
	function category_option_list(){
		$sqltext = "SELECT id as value, name as label FROM product_categories";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * unit_option_list Model Action
     * @return array
     */
	function unit_option_list(){
		$sqltext = "SELECT id as value, name as label FROM units";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * document_type_option_list Model Action
     * @return array
     */
	function document_type_option_list(){
		$sqltext = "SELECT id as value, name as label FROM main_documents";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_email_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('email', $value)->value('email');   
		if($exist){
			return true;
		}
		return false;
	}
	

	/**
     * Check if value already exist in Users table
	 * @param string $value
     * @return bool
     */
	function users_username_value_exist(Request $request){
		$value = trim($request->value);
		$exist = DB::table('users')->where('username', $value)->value('username');   
		if($exist){
			return true;
		}
		return false;
	}
}
