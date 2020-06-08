<?php

namespace App\Models;

use CodeIgniter\Model;

class RevistaModel extends Model
{
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

    public function getNumeroRevista()
    {
        return $this->db->table('numero_revista')
            ->select('numero_revista.*, revista.titulo')
            ->join('revista', 'numero_revista.id_revista = revista.id_revista')
            ->get()
            ->getResultArray();
    }

    public function create($data)
    {
        return $this->builder()->insert($data);
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

    public function empleadosSucursal()
    {
        return $this->db->table('sucursal')
            ->select('empleado.nombre, empleado.apellido, empleado.correo, sucursal.nombre AS `sucursal`')
            ->join('empleado', 'empleado.id_sucursal = sucursal.id_sucursal')
            ->get()
            ->getResultArray();
    }
}
