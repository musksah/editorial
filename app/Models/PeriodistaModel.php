<?php

namespace App\Models;

use CodeIgniter\Model;

class PeriodistaModel extends Model{
    protected $table      = 'periodista';
    protected $primaryKey = 'id_periodista';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'identificacion', 
        'nombre', 
        'apellido', 
        'telefono',
        'direccion',
        'correo',
        'birthdate',
        'especialidad',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('periodista')
        ->select('periodista.*')
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