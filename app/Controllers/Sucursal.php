<?php 

namespace App\Controllers;


use CodeIgniter\RESTful\ResourceController;
use App\Controllers\TablesBoostrapVue;
use App\Controllers\SelectVueBootstrap;

class Sucursal extends ResourceController
{
	protected $modelName = 'App\Models\SucursalModel';
	protected $format    = 'json';
	protected $DataTables;
	protected $selectVB;
	protected $request;
	
	public function __construct() {
		$this->DataTables = new TablesBoostrapVue();
		$this->selectVB = new SelectVueBootstrap();
		$this->request = \Config\Services::request();
	}

	public function index()
	{
		$query = $this->model->findAll();
		$query = $this->DataTables->data($query)->makeHeaders(['actions'])->get();
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		return $this->respond($query);
	}

	public function store(){
		$data_insert = $this->request->getPost();
		$insert = $this->model->create($data_insert);
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		return $this->respond($insert, 200);
	}

	public function makeSelect(){
		$query = $this->model->findAll();
		$query = $this->selectVB->data($query)->make('id_sucursal','nombre')->get();
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
		return $this->respond($query);
	}

	public function destroy()
    {
        $data_delete = $this->request->getPost();
        $id_sucursal = $data_delete['id_sucursal'];
        $result = $this->model->destroy($id_sucursal);
        // echo '<pre> delete';
        // print_r($data_delete);
		// die;
		$this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        return $this->respond($result);
    }

	//--------------------------------------------------------------------

}
