<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->Session_model->access_user();
		$this->load->model('Home_model');
	}

	public function index()
	{
		//Configuracion de CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Morris Chart Css' 		=> 'plugins/morrisjs/morris',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			=> 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			=> 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 		=> 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	=> 'plugins/node-waves/waves',
			'Jquery CountTo Plugin Js' 	=> 'plugins/jquery-countto/jquery.countTo',
			'Morris Plugin Js 1'		=> 'plugins/raphael/raphael.min',
			'Morris Plugin Js 2'		=> 'plugins/morrisjs/morris',
			'ChartJs' 					=> 'plugins/chartjs/Chart.bundle',
			'Flot Charts Plugin Js 1' 	=> 'plugins/flot-charts/jquery.flot',
			'Flot Charts Plugin Js 2' 	=> 'plugins/flot-charts/jquery.flot.resize',
			'Flot Charts Plugin Js 3' 	=> 'plugins/flot-charts/jquery.flot.pie',
			'Flot Charts Plugin Js 4' 	=> 'plugins/flot-charts/jquery.flot.categories',
			'Flot Charts Plugin Js 5' 	=> 'plugins/flot-charts/jquery.flot.time',
			'Tables Js 1' 				=> 'plugins/jquery-datatable/jquery.dataTables',
			'Tables Js 2' 				=> 'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
			'Tables Js 3' 				=> 'plugins/jquery-datatable/extensions/export/dataTables.buttons.min',
			'Tables Js 4' 				=> 'plugins/jquery-datatable/extensions/export/buttons.flash.min',
			'Tables Js 5' 				=> 'plugins/jquery-datatable/extensions/export/jszip.min',
			'Tables Js 6' 				=> 'plugins/jquery-datatable/extensions/export/pdfmake.min',
			'Tables Js 7' 				=> 'plugins/jquery-datatable/extensions/export/vfs_fonts',
			'Tables Js 8' 				=> 'plugins/jquery-datatable/extensions/export/buttons.html5.min',
			'Tables Js 9' 				=> 'plugins/jquery-datatable/extensions/export/buttons.print.min',
			'Tables Js 10' 				=> 'js/pages/tables/jquery-datatable',
			'Sparkline Chart Plugin Js' => 'plugins/jquery-sparkline/jquery.sparkline',
			'Custom Js 1' 				=> 'js/admin',
			'Custom Js 2' 				=> 'js/pages/index',
			'Custom Js 3'				=> 'js/pages/ui/dialogs',
			'Calculator'				=> 'js/calculator',
			'Demo Js' 					=> 'js/demo',
		];
		$this->resources->initialize($config);
		//Consultas con el Model
		$data['cant_ticket'] 	 = $this->Home_model->getTotal('ticket', ['0', '1', '3']);
		$data['cant_ganados']	 = $this->Home_model->getTotal('ticket', ['1', '3']);
		$data['cant_anulados']	 = $this->Home_model->getTotal('ticket', '2');
		$data['total_usuarios']	 = $this->Home_model->getTotal('usuarios', ['1', '2']);
		$data['fecha_inicial'] 	 = $this->Home_model->fecha_inicial();
		$data['fecha_final'] 	 = $this->Home_model->fecha_final();
		$data['ventas_total'] 	 = $this->Home_model->ventas_total();
		$data['ticket_premiado'] = $this->Home_model->animales();
		$data['ticket_anulado']	 = $this->Home_model->getTicketNulos();
		$data['ticket_ganado']	 = $this->Home_model->getTicketGanados();
		$data['notify_animal']	 = $this->Home_model->notifyAnimal();
		//Llamado al view
		$data['title']			 = 'REPORTES';
		$data['filename'] 		 = 'index';
		$this->load->view('template', $data);
		mdate('%d-%m-%Y');
		mdate('%h:%i %A');
	}
}
