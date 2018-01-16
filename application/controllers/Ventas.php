<?php
require __DIR__ . '/../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Ventas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->Session_model->access_user();
		$this->load->model('Ventas_model');		
	}

	public function files_css_js()
	{
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
			'Jquery Core Js' 			 => 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 => 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 => 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 		 => 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 => 'plugins/node-waves/waves',
			'Bootstrap Notify Plugin Js' => 'plugins/bootstrap-notify/bootstrap-notify',
			'Jquery CountTo Plugin Js' 	 => 'plugins/jquery-countto/jquery.countTo',
			'SweetAlert Plugin Js'		 => 'plugins/sweetalert/sweetalert.min',
			'Tables Js 1' 				 => 'plugins/jquery-datatable/jquery.dataTables',
			'Tables Js 2' 				 => 'plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap',
			'Tables Js 3' 				 => 'plugins/jquery-datatable/extensions/export/dataTables.buttons.min',
			'Tables Js 4' 				 => 'plugins/jquery-datatable/extensions/export/buttons.flash.min',
			'Tables Js 5' 				 => 'plugins/jquery-datatable/extensions/export/jszip.min',
			'Tables Js 6' 				 => 'plugins/jquery-datatable/extensions/export/pdfmake.min',
			'Tables Js 7' 				 => 'plugins/jquery-datatable/extensions/export/vfs_fonts',
			'Tables Js 8' 				 => 'plugins/jquery-datatable/extensions/export/buttons.html5.min',
			'Tables Js 9' 				 => 'plugins/jquery-datatable/extensions/export/buttons.print.min',
			'Tables Js 10' 				 => 'js/pages/tables/jquery-datatable',
			'Custom Js 1' 				 => 'js/admin',
			'Custom Js 2' 				 => 'js/pages/ui/dialogs',
			'Calculator'				 => 'js/calculator',
			'Demo Js' 					 => 'js/demo'
		];
		return $config;
	}

	//Vista del la nuevo juego
	public function index()
	{
		//Config del CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Sweetalert Css' 		=> 'plugins/sweetalert/sweetalert',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 => 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 => 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 => 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js'		 => 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Bootstrap Notify Plugin Js' => 'plugins/bootstrap-notify/bootstrap-notify',
			'Waves Effect Plugin Js' 	 => 'plugins/node-waves/waves',
			'Editable Table Plugin Js'	 => 'plugins/editable-table/mindmup-editabletable',
			'SweetAlert Plugin Js' 		 => 'plugins/sweetalert/sweetalert.min',
			'Custom Js 1' 				 => 'js/admin',
			'Custom Js 2' 				 => 'js/pages/ui/dialogs',
			'Custom Js 4'				 => 'js/pages/ui/notifications',
			'Custom Js 3'				 => 'js/pages/tables/editable-table',
			'Script'					 => 'js/script',
			'Calculator'				 => 'js/calculator',
			'Demo Js' 					 => 'js/demo'
		];
		$this->resources->initialize($config);
		//Load model
		$data['horas'] = ['09'=>'09:00 AM', '10'=>'10:00 AM', '11'=>'11:00 AM', '12'=>'12:00 PM', '13'=>'01:00 PM', '15'=>'03:00 PM', '16'=>'04:00 PM', '17'=>'05:00 PM', '18'=>'06:00 PM', '19'=>'07:00 PM'];
		$data['animales'] = $this->Ventas_model->getAnimal();
		$dato = $this->Ventas_model->getNumTicket()+1;
		$can = strlen($dato);
		$num = '';
		for ($i=$can; $i < 10; $i++) { 
			$num .= '0';
		}
		$num .= $dato;
		$data['ticket'] = $num;
		//Load View
		$data['title'] 		= 'NUEVO JUEGO';
		$data['filename'] 	= 'play';
		$this->load->view('template', $data);
	}

	//Registro de nueva loretia
	public function insert()
	{
		$numero 		= $this->security->xss_clean(strip_tags($this->input->post('ticket')));
		$horas 			= $this->security->xss_clean($this->input->post('hora'));
		$animales 		= $this->security->xss_clean($this->input->post('animales'));
		$costo_total	= $this->security->xss_clean(strip_tags($this->input->post('costo_total')));
		$data = [
			'numero' 		=> $numero,
			'fecha'			=> mdate('%d-%m-%Y'),
			'busqueda'		=> mdate('%Y-%m-%d'),
			'hora' 			=> mdate('%h:%i %A'),
			'costo_total' 	=> $costo_total,
			'vendedor'		=> $this->session->userdata('jampool_user'),
			'status' 		=> '0'
		];
		$this->Ventas_model->insert($data);
		foreach ($horas as $hora) {
			$datosh = [
				'numero_ticket' => $numero,
				'hora_jugada'	=> $hora,
				'status'		=> '0'
			];
			$this->Ventas_model->insertHora($datosh);
		}
		foreach ($animales as $animal) {
			$jugada = explode(':', $animal);
			$datos = [
				'numero_ticket' => $numero,
				'numero'		=> $jugada[0],
				'animal'		=> $jugada[1],
				'costo'			=> $jugada[2],
				'status'		=> '0'
			];
			$this->Ventas_model->insertJugada($datos);
		}
		redirect('ventas/detalles-ticket/'.$numero);
	}

	public function imprimir()
	{
		/* Call this file 'hello-world.php' */
		$connector = new FilePrintConnector("php://stdout");
		$printer = new Printer($connector);
		$printer -> text("Hello World!\n");
		$printer -> cut();
		$printer -> close();
	}

	public function ticket()
	{
		//Config del CSS y JS
		$this->resources->initialize($this->files_css_js());
		//Load model
		$data['tickets'] 	= $this->Ventas_model->getTickets();
		//Load View
		$data['title'] 		= 'CONSULTAS DE TICKETS';
		$data['filename'] 	= 'ticket';
		$this->load->view('template', $data);
	}

	public function ticket_detalles($numero)
	{
		//Config del CSS y Js
		$this->resources->initialize($this->files_css_js());
		//Load Model
		$data['config']		= $this->Ventas_model->getConfig();
		$data['ticket'] 	= $this->Ventas_model->getDetailsTicket($numero);
		$data['horas']		= $this->Ventas_model->getHorasTicket($numero);
		$data['jugadas']	= $this->Ventas_model->getJugadasTicket($numero);
		//Datos del view
		$data['title'] 		=  'CONSULTA';
		$data['filename'] 	= 'ticket_det';
		$this->load->view('template', $data);
	}

	public function anular($numero)
	{
		$data = [
			'status' => '2'
		];
		$this->Ventas_model->cambiarStatus($numero, $data);
		redirect('ventas/detalles-ticket/'.$numero);
	}

	public function pagar($numero)
	{
		$data = [
			'status' => '3'
		];
		$this->Ventas_model->cambiarStatus($numero, $data);
		redirect('ventas/detalles-ticket/'.$numero);
	}

	public function ganador()
	{
		//Config del CSS y JS
		$this->resources->initialize($this->files_css_js());
		//Consulta con el model
		$data['tickets'] = $this->Ventas_model->ticketGanados();
		//Datos de view
		$data['title'] = 'GANADORES';
		$data['filename'] = 'gana';
		$this->load->view('template', $data);
	}

	public function ventas($year)
	{
		//Config del CSS y JS
		$config['css_files'] = [
			'Bootstrap Core Css' 	=> 'plugins/bootstrap/css/bootstrap',
			'Waves Effect Css' 		=> 'plugins/node-waves/waves',
			'Animation Css' 		=> 'plugins/animate-css/animate',
			'Custom Css' 			=> 'css/style',
			'AdminBSB Themes' 		=> 'css/themes/all-themes'
		];
		$config['js_files'] = [
			'Jquery Core Js' 			 => 'plugins/jquery/jquery.min',
			'Bootstrap Core Js'			 => 'plugins/bootstrap/js/bootstrap',
			'Select Plugin Js' 			 => 'plugins/bootstrap-select/js/bootstrap-select',
			'Slimscroll Plugin Js' 		 => 'plugins/jquery-slimscroll/jquery.slimscroll',
			'Waves Effect Plugin Js' 	 => 'plugins/node-waves/waves',
			'Chart Plugins Js' 			 => 'plugins/chartjs/Chart.bundle',
			'Custom Js 1' 				 => 'js/admin',
			'Calculator'				 => 'js/calculator',
			'Demo Js' 					 => 'js/demo'
		];
		$this->resources->initialize($config);
		//Load model
		$status = ['0','1'];
		$data['ventas'] = [
			'ene' => $this->Ventas_model->chartVenta('01-'.$year, $status),
			'feb' => $this->Ventas_model->chartVenta('02-'.$year, $status),
			'mar' => $this->Ventas_model->chartVenta('03-'.$year, $status),
			'abr' => $this->Ventas_model->chartVenta('04-'.$year, $status),
			'may' => $this->Ventas_model->chartVenta('05-'.$year, $status),
			'jun' => $this->Ventas_model->chartVenta('06-'.$year, $status),
			'jul' => $this->Ventas_model->chartVenta('07-'.$year, $status),
			'ago' => $this->Ventas_model->chartVenta('08-'.$year, $status),
			'sep' => $this->Ventas_model->chartVenta('09-'.$year, $status),
			'oct' => $this->Ventas_model->chartVenta('10-'.$year, $status),
			'nov' => $this->Ventas_model->chartVenta('11-'.$year, $status),
			'dic' => $this->Ventas_model->chartVenta('12-'.$year, $status)
		];
		$data['ganado'] = [
			'ene' => $this->Ventas_model->chartVenta('01-'.$year, '1'),
			'feb' => $this->Ventas_model->chartVenta('02-'.$year, '1'),
			'mar' => $this->Ventas_model->chartVenta('03-'.$year, '1'),
			'abr' => $this->Ventas_model->chartVenta('04-'.$year, '1'),
			'may' => $this->Ventas_model->chartVenta('05-'.$year, '1'),
			'jun' => $this->Ventas_model->chartVenta('06-'.$year, '1'),
			'jul' => $this->Ventas_model->chartVenta('07-'.$year, '1'),
			'ago' => $this->Ventas_model->chartVenta('08-'.$year, '1'),
			'sep' => $this->Ventas_model->chartVenta('09-'.$year, '1'),
			'oct' => $this->Ventas_model->chartVenta('10-'.$year, '1'),
			'nov' => $this->Ventas_model->chartVenta('11-'.$year, '1'),
			'dic' => $this->Ventas_model->chartVenta('12-'.$year, '1')
		];
		//Load view
		$data['title'] = 'VENTAS DEL AÑO '.$year;
		$data['filename'] = 'rventa';
		$data['footer_js'] = 'footer_rventa';
		$this->load->view('template', $data);
	}
}
