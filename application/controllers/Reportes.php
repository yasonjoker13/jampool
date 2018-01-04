<?php 
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Reportes extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->Session_model->access_user();
		$this->load->model('Reportes_model');
	}

	public function files_css_js()
	{
		//CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 			=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 				=> 'plugins/node-waves/waves',
			'Animation Css' 				=> 'plugins/animate-css/animate',
			'Bootstrap Material Datetime'	=> 'plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker',
			'Morris Chart Css'				=> 'plugins/morrisjs/morris',
			'Sweetalert Css' 				=> 'plugins/sweetalert/sweetalert',
			'Wait Me Css'					=> 'plugins/waitme/waitMe',
			'Bootstrap Select Css'			=> 'plugins/bootstrap-select/css/bootstrap-select',
			'Custom Css' 					=> 'css/style',
			'AdminBSB Themes' 				=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 	=> 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 	=> 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 	=> 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 		 	=> 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 	=> 'plugins/node-waves/waves',
			'Bootstrap Select Css'			=> 'plugins/bootstrap-select/css/bootstrap-select',
			'Bootstrap Notify Plugin Js' 	=> 'plugins/bootstrap-notify/bootstrap-notify',
			'Autosize Plugin Js'			=> 'plugins/autosize/autosize',
			'Moment Plugin Js'				=> 'plugins/momentjs/moment',
			'Jquery CountTo Plugin Js' 	 	=> 'plugins/jquery-countto/jquery.countTo',
			'SweetAlert Plugin Js'		 	=> 'plugins/sweetalert/sweetalert.min',
			'Tables Js 1' 				 	=> 'plugins/jquery-datatable/jquery.dataTables',
			'Tables Js 2' 				 	=> 'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
			'Tables Js 3' 				 	=> 'plugins/jquery-datatable/extensions/export/dataTables.buttons.min',
			'Tables Js 4' 				 	=> 'plugins/jquery-datatable/extensions/export/buttons.flash.min',
			'Tables Js 5' 				 	=> 'plugins/jquery-datatable/extensions/export/jszip.min',
			'Tables Js 6' 				 	=> 'plugins/jquery-datatable/extensions/export/pdfmake.min',
			'Tables Js 7' 				 	=> 'plugins/jquery-datatable/extensions/export/vfs_fonts',
			'Tables Js 8' 				 	=> 'plugins/jquery-datatable/extensions/export/buttons.html5.min',
			'Tables Js 9' 				 	=> 'plugins/jquery-datatable/extensions/export/buttons.print.min',
			'Tables Js 10' 				 	=> 'js/pages/tables/jquery-datatable',
			'Bootstrap Material Datetime'	=> 'plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker',
			'Custom Js 1' 				 	=> 'js/admin',
			'Custom Js 2'					=> 'js/pages/forms/basic-form-elements',
			'Custom Js 3' 				 	=> 'js/pages/ui/dialogs',
			'Demo Js' 					 	=> 'js/demo'
		];
		return $config;
	}

	public function resumen_diario()
	{
		$this->resources->initialize($this->files_css_js());
		//load model
		$data['reportes'] = $this->Reportes_model->reporteDiario();
		//Load View
		$data['title'] = 'REPORTES';
		$data['filename'] = 'rdiario';
		$this->load->view('template', $data);
	}

	public function resumen_fecha()
	{
		$this->resources->initialize($this->files_css_js());
		//Load Model
		if(isset($_POST['desde']) && isset($_POST['hasta'])) {
			$desde = $this->security->xss_clean(strip_tags($this->input->post('desde')));
			$hasta = $this->security->xss_clean(strip_tags($this->input->post('hasta')));
		}else{
			$desde = mdate('%d-%m-%Y');
			$hasta = mdate('%d-%m-%Y');
		}
		$ini = explode('-', $desde);
		$fin = explode('-', $hasta);
		$data['ticket'] = $this->Reportes_model->getTicketTotal($ini[2].'-'.$ini[1].'-'.$ini[0], $fin[2].'-'.$fin[1].'-'.$fin[0]);
		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		//Load view
		$data['title'] = 'REPORTES';
		$data['filename'] = 'rfecha';
		$this->load->view('template', $data);
	}

	public function usuarios_diario()
	{
		$this->resources->initialize($this->files_css_js());
		//Load Model
		$data['reportes'] = $this->Reportes_model->reporteDiario();
		//Load view
		$data['title'] = 'REPORTES';
		$data['filename'] = 'rdiario_user';
		$this->load->view('template', $data);
	}

	public function usuarios_fecha()
	{
		$this->resources->initialize($this->files_css_js());
		//load model
		if(isset($_POST['desde']) && isset($_POST['hasta'])) {
			$desde = $this->security->xss_clean(strip_tags($this->input->post('desde')));
			$hasta = $this->security->xss_clean(strip_tags($this->input->post('hasta')));
		}else{
			$desde = mdate('%d-%m-%Y');
			$hasta = mdate('%d-%m-%Y');
		}
		$ini = explode('-', $desde);
		$fin = explode('-', $hasta);
		$data['ticket'] = $this->Reportes_model->getTicketTotal($ini[2].'-'.$ini[1].'-'.$ini[0], $fin[2].'-'.$fin[1].'-'.$fin[0]);
		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		//Load view
		$data['title'] = 'REPORTES';
		$data['filename'] = 'rfecha_user';
		$this->load->view('template', $data);
	}

	public function ticket_nulos()
	{
		$this->resources->initialize($this->files_css_js());
		//Load Model
		if(isset($_POST['desde']) && isset($_POST['hasta'])) {
			$desde = $this->security->xss_clean(strip_tags($this->input->post('desde')));
			$hasta = $this->security->xss_clean(strip_tags($this->input->post('hasta')));
		}else{
			$desde = mdate('%d-%m-%Y');
			$hasta = mdate('%d-%m-%Y');
		}
		$ini = explode('-', $desde);
		$fin = explode('-', $hasta);
		$data['ticket'] = $this->Reportes_model->getTicket('2', $ini[2].'-'.$ini[1].'-'.$ini[0], $fin[2].'-'.$fin[1].'-'.$fin[0]);
		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		//Load view
		$data['title'] = 'REPORTES DE TICKET';
		$data['filename'] = 'nulo';
		$this->load->view('template', $data);
	}

	public function ticket_ganados()
	{
		$this->resources->initialize($this->files_css_js());
		//Load Model
		if(isset($_POST['desde']) && isset($_POST['hasta'])) {
			$desde = $this->security->xss_clean(strip_tags($this->input->post('desde')));
			$hasta = $this->security->xss_clean(strip_tags($this->input->post('hasta')));
		}else{
			$desde = mdate('%d-%m-%Y');
			$hasta = mdate('%d-%m-%Y');
		}
		$ini = explode('-', $desde);
		$fin = explode('-', $hasta);
		$data['ticket'] = $this->Reportes_model->getTicket('1', $ini[2].'-'.$ini[1].'-'.$ini[0], $fin[2].'-'.$fin[1].'-'.$fin[0]);
		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		//Load view
		$data['title'] = 'REPORTES DE TICKET';
		$data['filename'] = 'ganar';
		$this->load->view('template', $data);
	}

	public function ticket_pagados()
	{
		$this->resources->initialize($this->files_css_js());
		//Load Model
		if(isset($_POST['desde']) && isset($_POST['hasta'])) {
			$desde = $this->security->xss_clean(strip_tags($this->input->post('desde')));
			$hasta = $this->security->xss_clean(strip_tags($this->input->post('hasta')));
		}else{
			$desde = mdate('%d-%m-%Y');
			$hasta = mdate('%d-%m-%Y');
		}
		$ini = explode('-', $desde);
		$fin = explode('-', $hasta);
		$data['ticket'] = $this->Reportes_model->getTicket('3', $ini[2].'-'.$ini[1].'-'.$ini[0], $fin[2].'-'.$fin[1].'-'.$fin[0]);
		$data['desde'] = $desde;
		$data['hasta'] = $hasta;
		//Load view
		$data['title'] = 'REPORTES DE TICKET';
		$data['filename'] = 'pagar';
		$this->load->view('template', $data);
	}
}