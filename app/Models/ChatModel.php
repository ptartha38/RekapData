<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class ChatModel extends Model
{
	protected $table = "chat_room";
	protected $request;
	protected $db;


	function __construct(RequestInterface $request)
	{
		parent::__construct();
		$this->db = db_connect();
		$this->request = $request;
	}

	public function insert_chat($data)
	{
		$this->builder = $this->db->table($this->table);
		return $this->builder->insert($data);
	}

	public function ambil_data_pesan()
	{
		$this->builder = $this->db->table($this->table)->get();
		return $this->builder->getResultArray();
	}

	public function hapus_riwayat_chat()
	{
		$this->builder = $this->db->table($this->table)->truncate();
		return $this->builder;
	}
}
