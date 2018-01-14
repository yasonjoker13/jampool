<?php 
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Configuracion extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->Session_model->access_user();
		$consulta = $this->Session_model->priv_user();
		if($consulta->rol == 2){
			redirect();
		}
		$this->load->model('Configuracion_model');
		$this->load->library('form_validation');
	}

	public function defecto()
	{
		//Config del CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Morris Chart Css'		=> 'plugins/morrisjs/morris',
			'Sweetalert Css' 		=> 'plugins/sweetalert/sweetalert',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 	=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 	=> 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 	=> 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 			=> 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 	=> 'plugins/node-waves/waves',
			'Bootstrap Notify Plugin Js' 	=> 'plugins/bootstrap-notify/bootstrap-notify',
			'Jquery CountTo Plugin Js'	 	=> 'plugins/jquery-countto/jquery.countTo',
			'SweetAlert Plugin Js' 		 	=> 'plugins/sweetalert/sweetalert.min',
			'Table Plugin Js 1'	 		 	=> 'plugins/jquery-datatable/jquery.dataTables',
			'Table Plugin Js 2'			 	=> 'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
			'Table Plugin Js 3'			 	=> 'js/pages/tables/jquery-datatable',
			'Custom Js 1' 				 	=> 'js/admin',
			'Custom Js 2' 				 	=> 'js/pages/ui/dialogs',
			'Script'						=> 'js/script',
			'Calculator'					=> 'js/calculator',
			'Demo Js' 					 	=> 'js/demo'
		];
		$this->resources->initialize($config);
		//Load model
		$data['num']		= $this->Configuracion_model->getConfig()->num_rows();
		$data['config'] 	= $this->Configuracion_model->getConfig()->result();
		//Load view
		$data['title']		= 'CONFIGURACIÓN';
		$data['filename']	= 'defecto';
		$this->load->view('template', $data);
	}

	public function agregar()
	{
		//Config del CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Morris Chart Css'		=> 'plugins/morrisjs/morris',
			'Sweetalert Css' 		=> 'plugins/sweetalert/sweetalert',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 	=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 	=> 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 	=> 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 			=> 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 	=> 'plugins/node-waves/waves',
			'Bootstrap Notify Plugin Js' 	=> 'plugins/bootstrap-notify/bootstrap-notify',
			'Jquery CountTo Plugin Js'	 	=> 'plugins/jquery-countto/jquery.countTo',
			'SweetAlert Plugin Js' 		 	=> 'plugins/sweetalert/sweetalert.min',
			'Custom Js 1' 				 	=> 'js/admin',
			'Custom Js 2' 				 	=> 'js/pages/forms/basic-form-elements',
			'Script'						=> 'js/script',
			'Calculator'				 	=> 'js/calculator',
			'Demo Js' 					 	=> 'js/demo'
		];
		$this->resources->initialize($config);
		//Load view
		$data['title']		= 'CONFIGURACIÓN';
		$data['filename']	= 'agre_conf';
		$this->load->view('template', $data);
	}

	public function insert_config()
	{
		$limite		= $this->security->xss_clean(strip_tags($this->input->post('limite')));
		$comision	= $this->security->xss_clean(strip_tags($this->input->post('comision')));
		$minutos	= $this->security->xss_clean(strip_tags($this->input->post('minutos')));
		$data = [
			'limite'	=> $limite,
			'comision'	=> $comision,
			'minutos'	=> $minutos,
			'status'	=> '0'
		];
		$this->Configuracion_model->insertConfig($data);
		redirect('configuracion/defecto');
	}

	public function status_defecto($id, $status)
	{
		$data = [
			'status' => $status
		];
		$this->Configuracion_model->statusDefecto($id, $data);
		redirect('configuracion/defecto');
	}

	public function users()
	{
		//Config del CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Morris Chart Css'		=> 'plugins/morrisjs/morris',
			'Sweetalert Css' 		=> 'plugins/sweetalert/sweetalert',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 	=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 	=> 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 	=> 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js'		=> 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 	=> 'plugins/node-waves/waves',
			'Bootstrap Notify Plugin Js' 	=> 'plugins/bootstrap-notify/bootstrap-notify',
			'Jquery CountTo Plugin Js'	 	=> 'plugins/jquery-countto/jquery.countTo',
			'SweetAlert Plugin Js' 		 	=> 'plugins/sweetalert/sweetalert.min',
			'Table Plugin Js 1'	 		 	=> 'plugins/jquery-datatable/jquery.dataTables',
			'Table Plugin Js 2'			 	=> 'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
			'Table Plugin Js 3'			 	=> 'js/pages/tables/jquery-datatable',
			'Custom Js 1' 				 	=> 'js/admin',
			'Custom Js 2' 				 	=> 'js/pages/ui/dialogs',
			'Script'						=> 'js/script',
			'Calculator'				 	=> 'js/calculator',
			'Demo Js' 					 	=> 'js/demo'
		];
		$this->resources->initialize($config);
		//Load model
		$data['usuarios']	= $this->Configuracion_model->getUsers();
		//Load View
		$data['title'] 		= 'CONFIGURACIÓN';
		$data['filename'] 	= 'config_user';
		$this->load->view('template', $data);
	}

	public function status($id, $status)
	{
		$data = [
			'status' => $status
		];
		$this->Configuracion_model->updateStatus($id, $data);
		redirect('configuracion/users');
	}

	public function agg_user()
	{
		$this->form_validation->set_error_delimiters('<div class="alert bg-red alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$this->form_validation->set_rules('identificacion', 'Cédula', 'min_length[7]|callback_check_ident');
		$this->form_validation->set_rules('email', 'Email', 'callback_check_email');
		$this->form_validation->set_rules('username', 'Nombre de Usuario', 'callback_check_unser');
		$this->form_validation->set_rules('password', 'Contraseña', 'min_length[5]');
		$this->form_validation->set_rules('repassword', 'Repetir Contraseña', 'min_length[5]|matches[password]');

		if($this->form_validation->run() === FALSE){
			//Config del CSS y JS
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
				'Slimscroll Plugin Js'		 				=> 'plugins/jquery-slimscroll/jquery.slimscroll',
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
			//load View
			$data['title'] = 'AGREGAR';
			$data['filename'] = 'agre_user';
			$this->load->view('template', $data);
		}else{
			$identificacion = $this->security->xss_clean(strip_tags($this->input->post('identificacion')));
			$nombre			= $this->security->xss_clean(strip_tags($this->input->post('nombre')));
			$apellido		= $this->security->xss_clean(strip_tags($this->input->post('apellido')));
			$f_nacimiento	= $this->security->xss_clean(strip_tags($this->input->post('nacimiento')));
			$email			= $this->security->xss_clean(strip_tags($this->input->post('email')));
			$telefono		= $this->security->xss_clean(strip_tags($this->input->post('telefono')));
			$username		= $this->security->xss_clean(strip_tags($this->input->post('username')));
			$rol			= $this->security->xss_clean(strip_tags($this->input->post('rol')));
			$password		= md5($this->security->xss_clean(strip_tags($this->input->post('password'))));
			$ticketera		= $this->security->xss_clean(strip_tags($this->input->post('ticketera')));
			$data = [
				'identificacion'	=> $identificacion,
				'nombre'			=> $nombre,
				'apellido'			=> $apellido,
				'fecha_nacimiento'	=> $f_nacimiento,
				'telefono'			=> $telefono,
				'username'			=> $username,
				'password'			=> $password,
				'email'				=> $email,
				'ticketera'			=> $ticketera,
				'keywords'			=> md5('jampool_'.$username.'_'.$password),
				'fecha'				=> mdate('%d-%m-%Y'),
				'hora'				=> mdate('%h:%i:%s'),
				'rol'				=> $rol,
				'status'			=> '0'
			];
			$this->Configuracion_model->insertUser($data);
			redirect('configuracion/users');
		}
	}

	public function check_ident($identificacion)
	{
		if($this->Configuracion_model->check_ident($identificacion)){
			$this->form_validation->set_message('check_ident', 'Ya se ha registrado un usuario con esta Cédula de identidad: <b>'.$identificacion.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_email($email)
	{
		if($this->Configuracion_model->check_email($email)){
			$this->form_validation->set_message('check_email', 'Ya se ha registrado un usuario con este Correo: <b>'.$email.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function check_unser($username)
	{
		if($this->Configuracion_model->check_unser($username)){
			$this->form_validation->set_message('check_unser', 'Ya se ha registrado un usuario con este Nombre de Usuario: <b>'.$username.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}