<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

use CodeIgniter\RESTful\ResourceController;

class Category extends ResourceController
{
    protected $modelName = 'App\Models\CategoryModel';
    protected $format    = 'json';
    protected $grid_list = [];
    protected $data_grid_list = [];
	protected $pages = [];
	protected $items = 0;
	protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request(); 
    }

    public function index()
    {
		$data_query = $this->model->findAll();
		$i = $this->request->getVar('Hola');
        return $this->respond($data_query);
    }

}
