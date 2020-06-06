<?php namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

use CodeIgniter\RESTful\ResourceController;
use App\Controllers\Tables;

class Sucursal extends ResourceController
{
	protected $modelName = 'App\Models\SucursalModel';
	protected $format    = 'json';
	protected $DataTables;
	
	public function __construct() {
		$this->DataTables = new Tables();
	}

	public function index()
	{
		$query = $this->model->findAll();
		$query = $this->DataTables->data($query)->makeHeaders()->get();
		return $this->respond($query);
	}

	//--------------------------------------------------------------------

}
