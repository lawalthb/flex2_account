<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesAddRequest;
use App\Http\Requests\CompaniesEditRequest;
use App\Models\Companies;
use Illuminate\Http\Request;
use Exception;
class CompaniesController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$view = "pages.companies.list";
		$query = Companies::query();
		$limit = $request->limit ?? 10;
		if($request->search){
			$search = trim($request->search);
			Companies::search($query, $search); // search table records
		}
		$orderby = $request->orderby ?? "companies.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a table field
		}
		$records = $query->paginate($limit, Companies::listFields());
		return $this->renderView($view, compact("records"));
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Companies::query();
		$record = $query->findOrFail($rec_id, Companies::viewFields());
		return $this->renderView("pages.companies.view", ["data" => $record]);
	}
	

	/**
     * Display Master Detail Pages
	 * @param string $rec_id //master record id
     * @return \Illuminate\View\View
     */
	function masterDetail($rec_id = null){
		return View("pages.companies.detail-pages", ["masterRecordId" => $rec_id]);
	}
	

	/**
     * Display form page
     * @return \Illuminate\View\View
     */
	function add(){
		return $this->renderView("pages.companies.add");
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function store(CompaniesAddRequest $request){
		$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("logo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['logo'], "logo");
			$modeldata['logo'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("favicon", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['favicon'], "favicon");
			$modeldata['favicon'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("signature", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['signature'], "signature");
			$modeldata['signature'] = $fileInfo['filepath'];
		}
		
		//Validate Users form data
		$usersPostData = $request->users;
		$usersValidator = validator()->make($usersPostData, ["lastname" => "nullable|string",
				"firstname" => "required|string",
				"email" => "required|email|unique:users,email",
				"username" => "required|string|unique:users,username",
				"phone" => "nullable|string",
				"photo" => "nullable"]);
		if ($usersValidator->fails()) {
			return $usersValidator->errors();
		}
		$usersModeldata = $this->normalizeFormData($usersValidator->valid());

		if( array_key_exists("photo", $usersModeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($usersModeldata['photo'], "photo");
			 $usersModeldata['photo'] = $fileInfo['filepath'];
		}
		
		//save Companies record
		$record = Companies::create($modeldata);
		$rec_id = $record->id;
		
        // set users.company_id to companies.id
		$usersModeldata['company_id'] = $rec_id;
		//save Users record
		$usersRecord = \App\Models\Users::create($usersModeldata);
		return $this->redirect("companies", __('recordAddedSuccessfully'));
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(CompaniesEditRequest $request, $rec_id = null){
		$query = Companies::query();
		$record = $query->findOrFail($rec_id, Companies::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $this->normalizeFormData($request->validated());
		
		if( array_key_exists("logo", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['logo'], "logo");
			$modeldata['logo'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("favicon", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['favicon'], "favicon");
			$modeldata['favicon'] = $fileInfo['filepath'];
		}
		
		if( array_key_exists("signature", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['signature'], "signature");
			$modeldata['signature'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
			return $this->redirect("companies", __('recordUpdatedSuccessfully'));
		}
		return $this->renderView("pages.companies.edit", ["data" => $record, "rec_id" => $rec_id]);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = Companies::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		$redirectUrl = $request->redirect ?? url()->previous();
		return $this->redirect($redirectUrl, __('recordDeletedSuccessfully'));
	}
}
