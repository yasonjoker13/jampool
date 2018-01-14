<?php 

class Registros extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->Session_model->access_user();
		$consulta = $this->Session_model->priv_user();
		if($consulta->rol == 2){
			redirect();
		}
		$this->load->model('Registros_model');
		$this->load->library('form_validation');
	}

	public function sorteo()
	{
		$this->form_validation->set_error_delimiters('<div class="alert bg-red alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		$this->form_validation->set_rules('hora', 'Hora', 'callback_check_hora');

		if($this->form_validation->run() === FALSE){
			//Config del CSS y JS
			$config['css_files'] = [
				'Bootstrap Core Css' 						=> 'plugins/bootstrap/css/bootstrap',
				'Waves Effect Css' 							=> 'plugins/node-waves/waves',
				'Animation Css' 							=> 'plugins/animate-css/animate',
				'Colorpicker Css'							=> 'plugins/bootstrap-colorpicker/css/bootstrap-colorpicker',
				'Dropzone Css'								=> 'plugins/dropzone/dropzone',
				'Multi Select Css'							=> 'plugins/multi-select/css/multi-select',
				'Bootstrap Material Datetime Picker Css'	=> 'plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker',
				'Wait Me Css'								=> 'plugins/waitme/waitMe',
				'Bootstrap Spinner Css'						=> 'plugins/jquery-spinner/css/bootstrap-spinner',
				'Bootstrap Tagsinput Css'					=> 'plugins/bootstrap-tagsinput/bootstrap-tagsinput',
				'Bootstrap Select Css'						=>	'plugins/bootstrap-select/css/bootstrap-select',
				'noUISlider Css'							=> 'plugins/nouislider/nouislider.min',
				'Custom Css' 								=> 'css/style',
				'AdminBSB Themes' 							=> 'css/themes/all-themes'
			];
			$config['js_files'] = [
				'Jquery Core Js' 								=> 'plugins/jquery/jquery.min',
				'Bootstrap Core Js'								=> 'plugins/bootstrap/js/bootstrap',
				'Select Plugin Js' 								=> 'plugins/bootstrap-select/js/bootstrap-select',
				'Slimscroll Plugin Js'							=> 'plugins/jquery-slimscroll/jquery.slimscroll',
				'Waves Effect Plugin Js' 						=> 'plugins/node-waves/waves',
				'Autosize Plugin Js'							=> 'plugins/autosize/autosize',
				'Moment Plugin Js'								=> 'plugins/momentjs/moment',
				'Bootstrap Material Datetime Picker Plugin Js' 	=> 'plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker',
				'Custom Js 1' 									=> 'js/admin',
				'Custom Js 2' 									=> 'js/pages/forms/basic-form-elements',
				'Calculator'				 					=> 'js/calculator',
				'Demo Js' 										=> 'js/demo'
			];
			$this->resources->initialize($config);
			//llamados al Model
	        $data['time'] 		= mdate('%H');
			$data['animales'] 	= $this->Registros_model->getAnimal();
			$data['horas'] 		= ['09'=>'09:00 AM', '10'=>'10:00 AM', '11'=>'11:00 AM', '12'=>'12:00 PM', '13'=>'01:00 PM', '15'=>'03:00 PM', '16'=>'04:00 PM', '17'=>'05:00 PM', '18'=>'06:00 PM', '19'=>'07:00 PM'];		//Llamado al View
			//Load View
			$data['title'] 		= 'DECLARAR GANADOR';
			$data['filename'] 	= 'sorteo';
			$this->load->view('template', $data);
		}else{
			$animal = $this->security->xss_clean($this->input->post('animalito'));
			$numero = explode(':', $animal);
			$fecha 	= mdate('%d-%m-%Y');
			$hora 	= $this->security->xss_clean($this->input->post('hora'));
			$data = [
				'numero' 			=> $numero[0],
				'animalito' 		=> $numero[1],
				'fecha' 			=> $fecha,
				'hora' 				=> $hora
			];
			$this->Registros_model->insert($data);
			$result = $this->Registros_model->getUpdate($numero[0], $fecha, $hora);
			foreach ($result as $key) {	
				$ticket = $key->id_ticket;
				$jugada = $key->id_jugada;
				$hora 	= $key->id_hora;
				$update = [
					'status' 		=> '1',
				];
				$this->Registros_model->updateTicket($ticket, $update);
				$this->Registros_model->updateJugada($jugada, $update);
				$this->Registros_model->updateHora($hora, $update);
			}
			redirect();
		}
	}

	public function check_hora($hora)
	{
		if($this->Registros_model->check_hora($hora)){
			$this->form_validation->set_message('check_hora', 'Ya se ha registrado un Sorteo a las <b>'.$hora.'</b>');
			return FALSE;
		}else{
			return TRUE;
		}
	}

}