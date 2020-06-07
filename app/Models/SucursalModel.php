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

    public function create($data){
        return $this->builder()->insert($data);
    }
}