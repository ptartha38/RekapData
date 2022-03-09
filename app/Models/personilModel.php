<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class personilModel extends Model
{
    protected $table = "personil";
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

    public function edit()
    {
        $id_update = $this->request->getPost('id_update');
        $this->builder = $this->db->table($this->table);
        $query = $this->builder->getWhere(['id' => $id_update]);
        return $query->getRow();
    }
    
    public function update_biodata_user($data, $id_update)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id', $id_update);
        return $this->builder->update($data);
    }

    public function hapus_biodata_user($id_anggota)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id', $id_anggota);
        return $this->builder->delete();
    }
}
