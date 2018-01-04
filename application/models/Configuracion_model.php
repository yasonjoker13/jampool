<?php 

class Configuracion_model extends CI_Model
{
	public function getConfig()
	{
		$query = $this->db->get('configuracion');
		return $query;
	}

	public function insertConfig($data)
	{
		$this->db->insert('configuracion', $data);
	}

	public function statusDefecto($id, $data)
	{
		$this->db->where('id_configuracion', $id);
		$this->db->update('configuracion', $data);
	}
	
	public function getUsers()
	{
		$query = $this->db->get('usuarios');
		return $query->result();
	}

	public function insertUser($data)
	{
		$this->db->insert('usuarios', $data);
	}

	public function updateStatus($id, $data)
	{
		$this->db->where('id_usuario', $id);
		$this->db->update('usuarios', $data);
	}
}