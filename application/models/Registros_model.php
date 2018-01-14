<?php 

class Registros_model extends CI_Model
{

	public function getAnimal()
	{
		$query = $this->db->get('animales');
		return $query->result();
	}

	public function getDate($fecha, $hora)
	{
		$this->db->where('fecha', $fecha)
				 ->where('hora', $hora)
				 ->from('sorteos');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function check_hora($hora)
	{
		$this->db->where('hora', $hora);
		$this->db->where('fecha', mdate('%d-%m-%Y'));
		$query = $this->db->get('sorteos');
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function insert($data)
	{
		$this->db->insert('sorteos', $data);
	}

	public function getUpdate($numero, $fecha, $hora)
	{	
		$this->db->where('ticket_horas.hora_jugada', $hora);
		$this->db->where('jugadas.numero', $numero);
		$this->db->where('ticket.status', '0');
		$this->db->where('ticket.fecha', $fecha);
		$this->db->select('id_ticket, id_jugada, id_hora');
		$this->db->from('ticket');
		$this->db->join('jugadas', 'jugadas.numero_ticket = ticket.numero');
		$this->db->join('ticket_horas', 'ticket.numero = ticket_horas.numero_ticket');
		$query = $this->db->get();
		return $query->result();
	}

	public function updateTicket($id, $data)
	{
		$this->db->where('id_ticket', $id);
		$this->db->update('ticket', $data);
	}

	public function updateJugada($id, $data)
	{
		$this->db->where('id_jugada', $id);
		$this->db->update('jugadas', $data);
	}

	public function updateHora($id, $data)
	{
		$this->db->where('id_hora', $id);
		$this->db->update('ticket_horas', $data);
	}

	public function ganadores($fecha, $hora, $numero_animalito, $datos)
	{
		$this->db->where('fecha', $fecha);
		$this->db->where('hora_jugada', $hora);
		$this->db->where('status', '0');
		$this->db->like('animales', $numero_animalito);
		$this->db->update('ticket', $datos);
	}
}