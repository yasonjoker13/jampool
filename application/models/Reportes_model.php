<?php 

class Reportes_model extends CI_Model
{
	public function rol(){ return $this->session->userdata('jampool_rol'); }
	public function user(){	return $this->session->userdata('jampool_user'); }

	public function reporteDiario()
	{
		$this->db->where('fecha', mdate('%d-%m-%Y'));
		if($this->rol() == 2){
			$this->db->where('vendedor', $this->user());
		}
		$this->db->from('ticket');
		$query = $this->db->get();
		return $query->result();
	}

	public function getHorasTicket($numero)
	{
		$this->db->where('numero_ticket', $numero);
		$this->db->from('ticket_horas');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTicketTotal($inicio, $final)
	{
		if($this->rol() == 2){
			$query = $this->db->query('SELECT * FROM ticket WHERE vendedor = "'.$this->user().'" AND busqueda BETWEEN "'.$inicio.'" AND "'.$final.'"');
		}else{
			$query = $this->db->query('SELECT * FROM ticket WHERE busqueda BETWEEN "'.$inicio.'" AND "'.$final.'"');
		}
		return $query->result();
	}

	public function getTicket($status, $inicio, $final)
	{
		if($this->rol() == 2){
			$query = $this->db->query('SELECT * FROM ticket WHERE vendedor = "'.$this->user().'" AND status = '.$status.' AND busqueda BETWEEN "'.$inicio.'" AND "'.$final.'"');
		}else{	
			$query = $this->db->query('SELECT * FROM ticket WHERE status = '.$status.' AND busqueda BETWEEN "'.$inicio.'" AND "'.$final.'"');
		}
		return $query->result();
	}

	public function getJugadaGanada($numero)
	{
		$this->db->where('status', '1');
		$this->db->where('numero_ticket', $numero);
		$query = $this->db->get('jugadas');
		return $query->row();
	}

	public function getUser($user)
	{
		$this->db->where('username', $user);
		$query = $this->db->get('usuarios');
		return $query->row();
	}
}