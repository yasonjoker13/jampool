<?php 
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class User_session extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function files_css_js()
	{
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Custom Css' 			=> 'css/style'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js' 		=> 'plugins/bootstrap/js/bootstrap',
			'Waves Effect Plugin Js'	=> 'plugins/node-waves/waves',
			'Validation Plugin Js' 		=> 'plugins/jquery-validation/jquery.validate',
			'Custom Js 1' 				=> 'js/admin',
			'Custom Js 2' 				=> 'js/pages/examples/sign-in'
		];
		return $config;
	}

	public function index()
	{
		//Configuracion para el CSS y JS
		$this->resources->initialize($this->files_css_js());
		//Data al view
		$data['filename'] = 'sign_in';
		$this->load->view('session', $data);
	}

	public function login()
	{
		$this->load->model('Session_model');
		$username = $this->security->xss_clean(strip_tags($this->input->post('username')));
		$password = md5($this->security->xss_clean(strip_tags($this->input->post('password'))));
		$this->Session_model->login($username, $password);
		redirect();
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function forgot_password()
	{
		$this->resources->initialize($this->files_css_js());
		//Data al view
		$data['filename'] = 'forgot_password';
		$this->load->view('session',$data);
	}

	public function sign_up()
	{
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Custom Css' 			=> 'css/style'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js' 		=> 'plugins/bootstrap/js/bootstrap',
			'Waves Effect Plugin Js'	=> 'plugins/node-waves/waves',
			'Validation Plugin Js' 		=> 'plugins/jquery-validation/jquery.validate',
			'Custom Js 1' 				=> 'js/admin',
			'Custom Js 2' 				=> 'js/pages/examples/sign-up'
		];
		$this->resources->initialize($config);
		//Data al view
		$data['filename'] = 'sing_up';
		$this->load->view('session',$data);
	}

	public function register()
	{
		$username 	= $this->security->xss_clean(strip_tags($this->input->post('username')));
		$email 		= $this->security->xss_clean(strip_tags($this->input->post('email')));
		$password 	= md5($this->security->xss_clean(strip_tags($this->input->post('password'))));
		$confirm	= md5($this->security->xss_clean(strip_tags($this->input->post('confirm'))));
		$terms		= $this->security->xss_clean(strip_tags($this->input->post('terms')));

		$data = [
			'username' 	=> $username,
			'email'	 	=> $email,
			'password'	=> $password,
			'confirm'	=> $confirm,
			'terms'		=> $terms
		];

		$this->Session_model->register($data);
		redirect('login');
	}

	public function perfil()
	{
		$this->load->library('form_validation');
		//load model
		$usuario = $this->Session_model->getUser($this->session->userdata('jampool_user'));
		$this->form_validation->set_error_delimiters('<div class="alert bg-red alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$this->form_validation->set_rules('identificacion', 'Cédula', 'min_length[7]|callback_check_edit_ident['.$usuario->id_usuario.']');
		$this->form_validation->set_rules('email', 'Email', 'callback_check_edit_email['.$usuario->id_usuario.']');
		$this->form_validation->set_rules('username', 'Nombre de Usuario', 'callback_check_edit_user['.$usuario->id_usuario.']');
		$this->form_validation->set_rules('password', 'Contraseña', 'min_length[5]');
		$this->form_validation->set_rules('repassword', 'Repetir Contraseña', 'min_length[5]|matches[password]');

		if($this->form_validation->run() === FALSE){
			//Load CSS y JS
			$config['css_files'] = [
				'Bootstrap Core Css' 						=> 'plugins/bootstrap/css/bootstrap',
				'Waves Effect Css' 							=> 'plugins/node-waves/waves',
				'Animation Css' 							=> 'plugins/animate-css/animate',
				'Bootstrap Material Datetime Picker Css'	=> 'plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker',
				'Wait Me Css'								=> 'plugins/waitme/waitMe',
				'Bootstrap Select Css'						=> 'plugins/bootstrap-select/css/bootstrap-select',
				'Custom Css' 								=> 'css/style',
				'AdminBSB Themes' 							=> 'css/themes/all-themes'
			];
			$config['js_files'] = [
				'Jquery Core Js' 			 					=> 'plugins/jquery/jquery.min',
				'Bootstrap Core Js'			 					=> 'plugins/bootstrap/js/bootstrap',
				'Select Plugin Js' 			 					=> 'plugins/bootstrap-select/js/bootstrap-select',
				'Slimscroll Plugin Js'		 					=> 'plugins/jquery-slimscroll/jquery.slimscroll',
				'Waves Effect Plugin Js' 	 					=> 'plugins/node-waves/waves',
				'Autosize Plugin Js'							=> 'plugins/autosize/autosize',
				'Moment Plugin Js'								=> 'plugins/momentjs/moment',
				'Bootstrap Material Datetime Picker Plugin Js'	=> 'plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker',			
				'Custom Js 1' 				 					=> 'js/admin',
				'Custom Js 2' 				 					=> 'js/pages/forms/basic-form-elements',
				'Script'										=> 'js/script',
				'Calculator'				 					=> 'js/calculator',
				'Demo Js' 					 					=> 'js/demo'
			];
			$this->resources->initialize($config);
			//Load Model
			$data['usuario'] = $this->Session_model->getUser($this->session->userdata('jampool_user'));
			//Load View
			$data['title']		= 'PERFIL DE '.strtoupper($this->session->userdata('jampool_user'));
			$data['filename'] 	= 'perfil';
			$this->load->view('template',$data);
		}else{
			$identificacion = $this->security->xss_clean(strip_tags($this->input->post('identificacion')));
			$nombre			= $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$apellido		= $this->security->xss_clean(strip_tags($this->input->post('apellido')));
			$f_nacimiento	= $this->security->xss_clean(strip_tags($this->input->post('nacimiento')));
			$email			= $this->security->xss_clean(strip_tags($this->input->post('email')));
			$telefono		= $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$username		= $this->security->xss_clean(strip_tags($this->input->post('username')));
			$password		= md5($this->security->xss_clean(strip_tags($this->input->post('password'))));
			$data = [
				'identificacion'	=> $identificacion,
				'nombre'			=> $nombre,
				'apellido'			=> $apellido,
				'fecha_nacimiento'	=> $f_nacimiento,
				'telefono'			=> $telefono,
				'username'			=> $username,
				'password'			=> $password,
				'email'				=> $email,
				'keywords'			=> md5('jampool_'.$username.'_'.$password)
			];
			$this->Session_model->updateUser($usuario->id_usuario, $data);
			redirect('perfil');
		}
	}

	public function check_edit_ident($identificacion, $id_usuario)
	{
		if($this->Session_model->check_edit_ident($identificacion, $id_usuario)){
			$this->form_validation->set_message('check_edit_ident', 'Ya se ha registrado otro usuario con esta Cédula de identidad: <b>'.$identificacion.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_edit_email($email, $id_usuario)
	{
		if($this->Session_model->check_edit_email($email, $id_usuario)){
			$this->form_validation->set_message('check_edit_email', 'Ya se ha registrado otro usuario con este Correo: <b>'.$email.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_edit_user($username, $id_usuario)
	{
		if($this->Session_model->check_edit_user($username, $id_usuario)){
			$this->form_validation->set_message('check_edit_user', 'Ya se ha registrado otro usuario con este Nombre de Usuario: <b>'.$username.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}