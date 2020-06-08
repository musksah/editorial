<?php

namespace App\Models;

use CodeIgniter\Model;

class SucursalModel extends Model{
    protected $table      = 'sucursal';
    protected $primaryKey = 'id_sucursal';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'telefono', 
        'direccion', 
        'codigo_sucursal', 
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('sucursal')
        ->select('sucursal.*')
        ->get()
        ->getResultArray();
    }

    public function destroy($id)
    {
        $revista_numbers = $this->db->table('numero_revista')->where('id_revista', $id)->get()->getResultArray();
        // echo '<pre>';
        // print_r($revista_numbers);
        // die; 
        foreach ($revista_numbers as $value) {
            $articulo_delete = $this->db->table('articulo')->where('id_numero_revista', $value['id_numero_revista'])->delete();
        }
        $revista_delete = $this->db->table('numero_revista')->where('id_revista', $id)->delete();
        return $this->db->table('revista')->where('id_revista', $id)->delete();
    }

    public function create($data){
        return $this->builder()->insert($data);
    }
}