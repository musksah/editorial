<?php
namespace App\Traits;

trait ShoppingCart{
    protected $grid_list = [];
    protected $data_grid_list = [];
    protected $pages = [];

    public function gridListItems($data){
        $this->data_grid_list = $data;
        return $this;
    }

    public function get(){
        // $pages
        foreach ($this->data_grid_list as $key => $value) {
            # code...
        }
    }
}