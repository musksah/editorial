<?php

namespace App\Controllers;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

use CodeIgniter\RESTful\ResourceController;


class Item extends ResourceController
{
	protected $modelName = 'App\Models\ItemModel';
	protected $format    = 'json';
	protected $grid_list = [];
	protected $data_grid_list = [];
	protected $pages = [];
	protected $items = 0;

	public function index()
	{
		$query = $this->model->getAllItems();
		$items = $this->gridListItems($query)->filter(['category_id','id','categories'])->makePages()->makeDecks()->get();
		return $this->respond($items);
	}

	public function gridListItems($data)
	{
		$this->data_grid_list = $data;
		$this->items = count($this->data_grid_list);
		return $this;
	}

	public function makePages()
	{
		if ($this->items > 0) {
			// echo ' divide on pages ';
			$this->pages = $this->divideOnPages($this->data_grid_list, 30);
		} else {
			$this->pages = [];
		}
		return $this;
	}

	public function makeDecks()
	{
		if (count($this->pages) > 0) {
			// echo ' divide on decks ';
			$this->grid_list['grid_list'] = $this->divideOnDecks($this->pages, 3);
		} else {
			$this->grid_list['grid_list'] = [];
		}
		return $this;
	}

	public function divideOnPages($array, $pages_number)
	{
		$cont = 0;
		$page = 0;
		$new_arr = [];
		foreach ($array as $value) {
			if ($cont == $pages_number) {
				$cont = 0;
				$page++;
			}
			$new_arr[$page][] = $value;
			$cont++;
		}
		return $new_arr;
	}

	public function divideOnDecks($array_pages, $items_number)
	{
		$new_arr = [];
		foreach ($array_pages as $key_pages => $item_pages) {
			$cont = 0;
			$page = 0;
			foreach ($item_pages as $item) {
				if ($cont == $items_number) {
					$cont = 0;
					$page++;
				}
				$new_arr[$key_pages][$page][] = $item;
				$cont++;
			}
		}
		return $new_arr;
	}

	public function get()
	{
		$this->grid_list['pages_number'] = count($this->pages);
		$this->grid_list['total_items'] = $this->items;
		return $this->grid_list;
	}

	private function filter($params)
	{
		$group_field_list = [];
		$field = $params[0];
		$group_field = $params[1];
		$name_field = $params[2];
		foreach ($this->data_grid_list as $key_item_pages => $value_item_pages) {
			$v_field_changed = $value_item_pages[$field];
			$local_group_field = $value_item_pages[$group_field];
			if (in_array($local_group_field, $group_field_list)) {
				$indice = array_search($local_group_field,$group_field_list);
				$this->data_grid_list[$indice][$name_field][$key_item_pages] = $v_field_changed;
				unset($this->data_grid_list[$key_item_pages]);
				//Se busca el item a cambiar y se le agrega el nuevo elemento 
			} else {
				$v_field_changed = $value_item_pages[$field];
				// Elimino el campo que se quiere modificar en el array
				unset($this->data_grid_list[$key_item_pages][$field]);
				// Agregro un nuevo elemento al item al modificar por el nuevo $field
				$this->data_grid_list[$key_item_pages][$name_field][$key_item_pages] = $v_field_changed;
				$group_field_list[$key_item_pages] = $value_item_pages[$group_field];
			}
		}
		return $this;
	}
}
