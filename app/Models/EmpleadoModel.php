<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoModel extends Model{
    protected $table      = 'empleado';
    protected $primaryKey = 'id_empleado';

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
        'id_sucursal',
        'id_user',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('empleado')
        ->select('empleado.*')
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