<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class registeruserModel extends Model
{
    protected $table = "registered_user";
    protected $request;
    protected $db;


    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
    }

    public function register_new_user($data)
    {
        $this->builder = $this->db->table($this->table);
        return $this->builder->insert($data);
    }
    public function update_biodata_user($NIK, $data)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('NIK', $NIK);
        return $this->builder->update($data);
    }
}
