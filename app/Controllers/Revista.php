<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Controllers\Tables;
use Dompdf\Dompdf;

class Revista extends ResourceController
{
    protected $modelName = 'App\Models\RevistaModel';
    protected $format    = 'json';
    protected $DataTables;
    protected $request;
    protected $dompdf;
    protected $selectVB;

    public function __construct()
    {
        $this->DataTables = new Tables();
        $this->request = \Config\Services::request();
        $this->selectVB = new SelectVueBootstrap();
        $this->dompdf = new Dompdf();
    }

    public function index()
    {
        $query = $this->model->findAll();
        $query = $this->DataTables->data($query)->makeHeaders()->get();
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        return $this->respond($query);
    }

    public function store()
    {
        // $data_insert = $this->request->getVar('data_insert');
        $data_insert = $this->request->getPost();
        $insert = $this->model->create($data_insert);
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        return $this->respond($insert, 200);
    }

    public function report()
    {
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        $html = $this->reportContent();
        // $msg = $this->load->view('reports/empleado_reporte', '', true);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'Landscape');
        $this->dompdf->render();
        $this->dompdf->stream();
    }


    public function reportContent()
    {
        $query = $this->model->empleadosSucursal();
        $data['empleados_list'] = $this->orderEmpSucursal($query);
        return view('reports/empleado_reporte', $data);
    }

    private function orderEmpSucursal($data)
    {
        $new_arr = [];
        foreach ($data as $key_list => $value_list) {
            $new_arr['data'][$data[$key_list]['sucursal']][] = $value_list;
        }
        foreach ($data[0] as $key_item => $value_item) {
            $new_arr['headers'][] = $key_item;
        }
        return $new_arr;
    }

    public function makeSelectNRevista()
    {
        $query = $this->model->getNumeroRevista();
        $query = $this->selectVB->data($query)->make('id_numero_revista', 'titulo')->get();
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        return $this->respond($query);
    }

    public function destroy()
    {
        $data_delete = $this->request->getPost();
        $id_revista = $data_delete['id_revista'];
        $result = $this->model->destroy($id_revista);
        // echo '<pre> delete';
        // print_r($data_delete);
        // die;
        $this->response->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Headers', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, DELETE');
        return $this->respond($result);
    }

    public function getPdf()
    {
        $data_insert = $this->request->getGet();
    }

    //--------------------------------------------------------------------

}
