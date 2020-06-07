<?php

namespace App\Controllers;

class Tables extends BaseController
{
    protected $data = [];
    protected $headers = [];
    protected $table_object;

    public function data($data)
    {
        $this->data = $data;
        $this->table_object['data'] = $this->data;
        return $this;
    }

    public function makeHeaders($columns = [])
    {
        if (count($this->data[0]) > 0) {
            foreach ($this->data[0] as $key => $value) {
                $this->headers[] = ['headerName ' => $key, 'field' => $key];
            }
            foreach ($columns as $value_columns) {
                $this->headers[] = ['headerName ' => $value_columns, 'field' => $value_columns];
            }
            $this->table_object['headers'] = $this->headers;
            return $this;
        } else {
            return $this;
        }
    }

    public function get()
    {
        return $this->table_object;
    }
}
