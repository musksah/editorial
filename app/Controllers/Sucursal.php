<?php 

namespace App\Controllers;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers', '*');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');


use CodeIgniter\RESTful\ResourceController;
use App\Controllers\Tables;

class Sucursal extends ResourceController
{
	protected $modelName = 'App\Models\SucursalModel';
	protected $format    = 'json';
	protected $DataTables;
	protected $request;
	
	public function __construct() {
		$this->DataTables = new Tables();
		$this->request = \Config\Services::request();
	}

	public function index()
	{
		$query = $this->model->findAll();
		$query = $this->DataTables->data($query)->makeHeaders()->get();
		return $this->respond($query);
	}

	public function store(){
		// $data_insert = $this->request->getVar('data_insert');
		$data_insert = $this->request->getPost();
		$insert = $this->model->create($data_insert);
		return $this->respond($insert, 200);
	}

	//--------------------------------------------------------------------

}
