<?php 

class Notify_model extends CI_Model
{
	public function rol(){ return $this->session->userdata('jampool_rol'); }
	public function user(){	return $this->session->userdata('jampool_user'); }

	public function notifyUsers()
	{
		$query = $this->db->query('SELECT username, COUNT(username) AS cantidad FROM usuarios JOIN ticket ON ticket.vendedor = usuarios.username WHERE ticket.status != 2 AND ticket.fecha = "'.date('d-m-Y').'" GROUP BY username');
		return $query;
	}

	public function notifyNewUser()
	{
		$this->db->where('fecha', date('d-m-Y'));
		$this->db->where('status', 0);
		$this->db->from('usuarios');
		$query = $this->db->get();
		return $query;
	}

	public function notifyAnimal()
	{
		$this->db->where('fecha', date('d-m-Y'));
		$this->db->from('sorteos');
		$query = $this->db->get();
		return $query;
	}

	public function notifyTicket()
	{
		$this->db->where('fecha', date('d-m-Y'));
		$this->db->where('status', 1);
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$this->db->from('ticket');
		$query = $this->db->get();
		return $query;
	}

	public function numNotify()
	{
		if($this->rol() == 2){
			$num = $this->notifyAnimal()->num_rows()+$this->notifyTicket()->num_rows();
		}else{
			$num = $this->notifyNewUser()->num_rows()+$this->notifyAnimal()->num_rows()+$this->notifyTicket()->num_rows();
		}
		return $num;
	}
}