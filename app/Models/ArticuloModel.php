<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticuloModel extends Model{
    protected $table      = 'articulo';
    protected $primaryKey = 'id_articulo';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'fecha', 
        'título', 
        'contenido', 
        'id_numero_revista',
        'id_periodista',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('articulo')
        ->select('articulo.*')
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