<?php 

class Home_model extends CI_Model
{
	public function rol(){ return $this->session->userdata('jampool_rol'); }
	public function user(){	return $this->session->userdata('jampool_user'); }
	
	public function ventas_total()
	{
		$this->db->where_not_in('status','2');
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$this->db->select_sum('costo_total'); 
		$query = $this->db->get('ticket');
		return $query->row();
	}

	public function getTotal($tabla, $status)
	{
		$this->db->where_in('status', $status);
		if($this->rol() == 2 && $tabla == 'ticket'){
			$this->db->where('vendedor', $this->user());
		}
		$query = $this->db->get($tabla);
		return $query->num_rows();
	}

	public function fecha_inicial()
	{
		$this->db->select_min('fecha');
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$this->db->from('ticket');
		$query = $this->db->get();
		return $query->row();
	}

	public function fecha_final()
	{
		$this->db->select_max('fecha');
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$query = $this->db->get('ticket');
		return $query->row();
	}

	public function animales()
	{
		$query = $this->db->get('sorteos');
		return $query->result();
	}

	public function getTicketGanados()
	{
		$this->db->where('jugadas.status', '1');
		$this->db->where_in('ticket.status', ['1', '3']);
		if($this->rol() == 2){
			$this->db->where('ticket.vendedor', $this->user());
		}
		$this->db->select('*');
		$this->db->from('ticket');
		$this->db->join('jugadas', 'jugadas.numero_ticket = ticket.numero');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTicketNulos()
	{
		$this->db->where('status', '2');
		$query = $this->db->get('ticket');
		return $query->result();
	}

	public function notifyAnimal()
	{
		$fecha = date('d-m-Y');
		$this->db->where('fecha', $fecha);
		$query = $this->db->get('sorteos');
		return $query->result();
	}

}
