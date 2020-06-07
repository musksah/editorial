<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers', '*');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');


use CodeIgniter\RESTful\ResourceController;
use App\Controllers\Tables;
use Dompdf\Dompdf;

class Empleados extends ResourceController
{
    protected $modelName = 'App\Models\SucursalModel';
    protected $format    = 'json';
    protected $DataTables;
    protected $request;
    protected $dompdf;

    public function __construct()
    {
        $this->DataTables = new Tables();
        $this->request = \Config\Services::request();
        $this->dompdf = new Dompdf();
    }

    public function index()
    {
        $query = $this->model->findAll();
        $query = $this->DataTables->data($query)->makeHeaders()->get();
        return $this->respond($query);
    }

    public function store()
    {
        // $data_insert = $this->request->getVar('data_insert');
        $data_insert = $this->request->getPost();
        $insert = $this->model->create($data_insert);
        return $this->respond($insert, 200);
    }

    public function report()
    {
        $this->dompdf->loadHtml('<h1>HELLO Repport</h1>');
        $this->dompdf->setPaper('A4', 'Landscape');
        $this->dompdf->render();
        $this->dompdf->stream();
    }

    //--------------------------------------------------------------------

}
