<?php 

class Ventas_model extends CI_Model
{
	public function rol(){ return $this->session->userdata('jampool_rol'); }
	public function user(){	return $this->session->userdata('jampool_user'); }

	public function getConfig()
	{
		$query = $this->db->get('configuracion');
		return $query->row();
	}

	public function getAnimal()
	{
		$query = $this->db->get('animales');
		return $query->result();
	}
	
	public function insert($data)
	{
		$this->db->insert('ticket', $data);
	}

	public function insertJugada($data)
	{
		$this->db->insert('jugadas', $data);
	}

	public function getNumTicket()
	{
		$query = $this->db->get('ticket');
		return $query->num_rows();
	}

	public function getTickets()
	{
		$this->db->order_by('numero', 'DESC');
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$query = $this->db->get('ticket');
		return $query->result();
	}

	public function getDetailsTicket($numero)
	{
		$this->db->where('numero',$numero);
		$query = $this->db->get('ticket');
		return $query->row();
	}

	public function getJugadasTicket($numero)
	{
		$this->db->where('numero_ticket', $numero);
		$this->db->from('jugadas');
		$query = $this->db->get();
		return $query->result();
	}

	public function cambiarStatus($numero, $data)
	{
		$this->db->where('numero',$numero);
		$this->db->update('ticket', $data);
	}

	public function ticketGanados()
	{
		$this->db->where('status', '1');
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$query = $this->db->get('ticket');
		return $query->result();
	}

	public function chartVenta($fecha, $status)
	{
		$this->db->where_in('status', $status);
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$this->db->like('fecha', $fecha);
		$query = $this->db->get('ticket');
		return $query->num_rows();
	}

}