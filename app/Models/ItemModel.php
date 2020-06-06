<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model{
    protected $table      = 'item';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name', 
        'description', 
        'serial_number', 
        'price', 
        'weight', 
        'id_image',
        'id_provider',
        'is_active',
        'created_at',
        'updated_at',
        'last_update_user',
    ];

    protected $useTimestamps = false;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getAllItems()
    {
        return $this->db->table('item')
        ->select('item.*, category.name AS `category`, category.id AS `category_id`')
        ->join('item_category', 'item.id = item_category.id_item')
        ->join('category', 'category.id = item_category.id_category')
        ->get()
        ->getResultArray();
    }
}