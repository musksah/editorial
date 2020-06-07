<?php

namespace App\Models;

use CodeIgniter\Model;

class RevistaModel extends Model{
    protected $table      = 'revista';
    protected $primaryKey = 'id_revista';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'titulo', 
        'numero_registro', 
        'tipo', 
        'periodicidad',
        'id_sucursal',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('revista')
        ->select('revista.*')
        ->get()
        ->getResultArray();
    }

    public function create($data){
        return $this->builder()->insert($data);
    }

    public function empleadosSucursal(){
        return $this->db->table('sucursal')
        ->select('empleado.nombre, empleado.apellido, empleado.correo, sucursal.nombre AS `sucursal`')
        ->join('empleado','empleado.id_sucursal = sucursal.id_sucursal')
        ->get()
        ->getResultArray();
    }
}