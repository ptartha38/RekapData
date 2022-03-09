<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class keuanganModel extends Model
{
    protected $table = "laporan_keuangan";
    protected $request;
    protected $db;


    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
    }

    public function insertNomordata($data)
    {
        $this->builder = $this->db->table($this->table);
        return $this->builder->insert($data);
    }

    public function hapusNomordata($data)
    {
        $this->builder = $this->db->table($this->table);
        $this->builder->where('id_hapus', $data);
        return $this->builder->delete();
    }
}
