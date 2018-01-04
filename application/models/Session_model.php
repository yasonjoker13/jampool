<?php 

class Session_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login($username,$password)
	{
		$this->db->where('username', $username)
				 ->from('usuarios');
		$consulta = $this->db->get();

		if($consulta->num_rows() > 0){

			$this->db->where('username', $username)
					 ->where('password', $password)
					 ->from('usuarios');
			$consulta = $this->db->get();

			if($consulta->num_rows() > 0){

				$consulta = $consulta->row();

				if($consulta->status > 0){
					$data = array(
						'jampool_user' 		=> $consulta->username,
						'jampool_email' 	=> $consulta->email,
						'jampool_keywords' 	=> md5('jampool_'.$consulta->username.'_'.$consulta->password),
						'jampool_rol'		=> $consulta->rol
					);
					$this->session->set_userdata($data);
				}else{
					$this->session->set_flashdata('mensaje','No tiene acceso al sistema! Consulte con el administrador');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('mensaje','La contraseña ingresada es incorrecta');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('mensaje','El usuario ingresado es incorrecto');
			redirect('login');
		}
	}

	public function register($data)
	{
		$this->db->where('username',$data['username'])
				 ->from('usuarios');
		$consulta = $this->db->get();

		if($consulta->num_rows() > 0){
			$this->session->set_flashdata('mensaje','El usuario <b>'.$data['username'].'</b> ya existe');
			redirect('register');
		}else{
			$this->db->where('email',$data['email'])
				 	 ->from('usuarios');
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0){
				$this->session->set_flashdata('mensaje','El correo electrónico <b>'.$data['email'].'</b> ya existe');
				redirect('register');
			}else{
				if($data['password'] != $data['confirm']){
					$this->session->set_flashdata('mensaje','Las contraseñas no coinciden');
					redirect('register');
				}else{
					if($data['terms'] === ''){
						$this->session->set_flashdata('mensaje','No acepto las condiciones');
						redirect('register');
					}else{
						$datos = [
							'username' 	=> $data['username'],
							'password' 	=> $data['password'],
							'email'		=> $data['email'],
							'keywords'	=> md5('jampool_'.$data['username'].'_'.$data['password']),
							'fecha'		=> date('d-m-Y'),
							'hora'		=> date('H:i:s'),
							'status'	=> '0'
						];
						$this->db->insert('usuarios', $datos);
					}
				}
			}
		}
	}

	public function access_user()
	{
		$user = $this->session->userdata('jampool_user');
		$keywords = $this->session->userdata('jampool_keywords');
		$this->db->where('username', $user)
				 ->where('keywords', $keywords)
				 ->from('usuarios');
		$consulta = $this->db->get();
		if(empty($user) or $consulta->num_rows() === 0)
		{
			redirect('login');
		}
	}

	public function priv_user()
	{
		$user 	= $this->session->userdata('jampool_user');
		$email 	= $this->session->userdata('jampool_email');
		$this->db->where('username', $user);
		$this->db->where('email', $email);
		$this->db->from('usuarios');
		$query = $this->db->get();
		return $query->row();
	}

}