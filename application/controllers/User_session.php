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
}